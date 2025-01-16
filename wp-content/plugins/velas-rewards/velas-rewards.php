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
        $points = $order->get_total(); // Acumula 1 punto por cada dólar gastado
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
//Mostrar campo para usar puntos en el carrito         |
//------------------------------------------------------

add_action("woocommerce_cart_totals_before_order_total", "vrw_display_points_field");

function vrw_display_points_field() {
    $user_id = get_current_user_id();
    if (!$user_id) return;

    $points = (int) get_user_meta($user_id, "_vrw_points", true);

    if ($points > 0) {
        echo '<tr class="vrw_points_row">
            <th>Usar puntos de recompensa:</th>
            <td>
                <input type="number" id="vrw_points" name="vrw_points" min="0" max="' . $points .'" value="0" style="width: 80px;">
                <button type="button" id="apply_points" class="button">Aplicar</button>
            </td>
        </tr>';
    }
}

//------------------------------------------------------
//Agregar descuento según los puntos de recompensa     |
//------------------------------------------------------

add_action('woocommerce_cart_calculate_fees', 'vrw_apply_points_discount');

function vrw_apply_points_discount($cart) {
    if (!is_cart() && !is_checkout()) return;

    if (isset($_POST['vrw_points']) && is_numeric($_POST['vrw_points'])) {
        $points_to_use = (int) sanitize_text_field($_POST["vrw_points"]);
        $user_id = get_current_user_id();
        $current_points = (int) get_user_meta($user_id, '_vrw_points', true);

        if ($points_to_use > 0 && $points_to_use <= $current_points) {
            $discount = $points_to_use * 0.05; // Los puntos serán el 5% del dinero
            $cart->add_fee('Descuento por puntos', -$discount, true);

            //Reducir los puntos del usuario
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
        echo '<p><strong>Puntos usados:</strong> ' . $points_used . '</p>';
    }
}