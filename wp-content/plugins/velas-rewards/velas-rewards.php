<?php
/*
Plugin Name: Velas Rewards
Description: Sistema de recompensas para acumular puntos en compras.
Version: 1.0
Author: David
*/

// Evitar acceso directo
if ( !defined('ABSPATH') ) {
    exit;
}

// Hook para registrar puntos al completar una compra
add_action('woocommerce_order_status_completed', 'vrw_add_rewards_points', 10, 1);

function vrw_add_rewards_points($order_id) {
    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id();

    if ($user_id) {
        // Calcular el 5% del total del pedido como puntos
        $points = round($order->get_total() * 0.05); // Redondear al número entero más cercano
        $current_points = (int) get_user_meta($user_id, '_vrw_points', true);
        $new_points = $current_points + $points;

        update_user_meta($user_id, '_vrw_points', $new_points);

        // Enviar notificación al usuario
        wp_mail(
            $order->get_billing_email(),
            '¡Has ganado puntos de recompensa!',
            "Gracias por tu compra en Restrepia. Has ganado $points puntos. Ahora tienes $new_points puntos en total."
        );
    }
}

// Mostrar puntos en "Mi cuenta"
add_action('woocommerce_before_my_account', 'vrw_display_rewards_points');
function vrw_display_rewards_points() {
    $user_id = get_current_user_id();
    if ($user_id) {
        $points = (int) get_user_meta($user_id, '_vrw_points', true);
        echo "<p><strong>Puntos de recompensa:</strong> $points</p>";
    }
}

//------------------------------------------------------
// Mostrar campo para usar puntos en el carrito
//------------------------------------------------------

add_action("woocommerce_review_order_before_order_total", "vrw_display_points_field"); // Hook correcto

function vrw_display_points_field() {
    $user_id = get_current_user_id(); // Obtener ID del usuario actual
    if (!$user_id) return; // Salir si no hay un usuario autenticado

    $points = (int) get_user_meta($user_id, "_vrw_points", true); // Obtener los puntos disponibles

    if ($points > 0) { // Mostrar el campo si hay puntos disponibles
        echo '<tr class="vrw_points_row">
            <th>Usar puntos de recompensa:</th>
            <td>
                <input type="number" id="vrw_points" name="vrw_points" min="0" max="' . esc_attr($points) . '" value="0" style="width: 80px;">
                <button type="button" id="apply_points" class="button">Aplicar</button>
            </td>
        </tr>';

        // Añadir script para capturar el valor del input y actualizar el carrito
        echo '
        <script>
        (function($) {
            $(document).on("click", "#apply_points", function() {
                var points = $("#vrw_points").val();
                if (points !== "" && points >= 0) {
                    $("body").trigger("update_checkout"); // Forzar actualización del carrito
                }
            });
        })(jQuery);
        </script>';
    }
}


//------------------------------------------------------
//Agregar descuento según los puntos de recompensa     |
//------------------------------------------------------

add_action('woocommerce_cart_calculate_fees', 'vrw_apply_points_discount');

function vrw_apply_points_discount($cart) {
    if (is_admin() || !is_cart() && !is_checkout()) return;

    if (isset($_POST['vrw_points']) && is_numeric($_POST['vrw_points'])) {
        $points_to_use = (int) sanitize_text_field($_POST["vrw_points"]);
        $user_id = get_current_user_id();
        $current_points = (int) get_user_meta($user_id, '_vrw_points', true);

        if ($points_to_use > 0 && $points_to_use <= $current_points) {
            $discount = $points_to_use * 0.05; // Los puntos serán el 5% del dinero
            if ($discount > $cart->get_subtotal()) {
                $discount = $cart->get_subtotal(); // Evitar que el descuento sea mayor al total
            }

            $cart->add_fee('Descuento por puntos', -$discount, true);

            // Reducir los puntos del usuario
            update_user_meta($user_id, '_vrw_points', $current_points - $points_to_use);
        }
    }
}

//------------------------------------------------------
//Guardar puntos usados en la orden                    |
//------------------------------------------------------

add_action('woocommerce_checkout_order_processed', 'vrw_save_points_used');

function vrw_save_points_used($order_id) {
    if (isset($_POST['vrw_points']) && is_numeric($_POST["vrw_points"])) {
        update_post_meta($order_id, '_vrw_points_used', (int) sanitize_text_field($_POST["vrw_points"]));
    }
}

//------------------------------------------------------
// Mostrar puntos usados en los detalles del pedido    |
//------------------------------------------------------

add_action('woocommerce_order_details_after_order_table', 'vrw_display_points_used');
function vrw_display_points_used($order) {
    $points_used = get_post_meta($order->get_id(), '_vrw_points_used', true);
    if ($points_used) {
        echo '<p><strong>Puntos usados:</strong> ' . esc_html($points_used) . '</p>';
    }
}
