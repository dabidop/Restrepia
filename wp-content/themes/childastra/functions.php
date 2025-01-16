<?php
/*
// Añadir la pestaña de Puntos y Recompensas
add_filter('woocommerce_account_menu_items', 'vrw_add_rewards_tab');
function vrw_add_rewards_tab($menu_links) {
    $menu_links['rewards'] = 'Puntos y Recompensas';
    return $menu_links;
}

// Enlazar la pestaña con un contenido
add_action('init', 'vrw_add_rewards_endpoint');
function vrw_add_rewards_endpoint() {
    add_rewrite_endpoint('rewards', EP_ROOT | EP_PAGES);
}

// Mostrar contenido en la pestaña
add_action('woocommerce_account_rewards_endpoint', 'vrw_rewards_content');
function vrw_rewards_content() {
    $current_user = wp_get_current_user();
    $points = get_user_meta($current_user->ID, '_vrw_points', true) ?: 0;
    echo '<h3>Tus puntos actuales</h3>';
    echo '<p>Tienes <strong>' . $points . '</strong> puntos disponibles.</p>';
}

// Permitir redirección
add_filter('query_vars', 'vrw_add_rewards_query_vars', 0);
function vrw_add_rewards_query_vars($vars) {
    $vars[] = 'rewards';
    return $vars;
}
*/

add_filter('woocommerce_nav_menu_item', 'custom_woocommerce_menu_cart_icon', 10, 2);

function custom_woocommerce_menu_cart_icon($menu_item, $args) {
    // Asegúrate de aplicar cambios solo al menú correcto
    if ($args->theme_location === 'primary') {
        // Reemplaza el ícono por uno personalizado (puedes usar HTML o un ícono de Font Awesome)
        $custom_icon = '<span class="custom-cart-icon">🛒</span>'; // Cambia el emoji por otro ícono o SVG

        // Reemplaza el contenido del carrito
        $menu_item = str_replace('class="cart-contents', 'class="cart-contents custom-cart"', $menu_item);
        $menu_item = preg_replace('/<a(.*?)>.*?<\/a>/', '<a$1>' . $custom_icon . '</a>', $menu_item);
    }

    return $menu_item;
}

