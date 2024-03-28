<?php

require get_template_directory() . '/config/woocommerce/cart-quantity.php';
require get_template_directory() . '/config/woocommerce/cart-checkout.php';

add_theme_support('woocommerce');

// Remove general stuff

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', "woocommerce_template_single_excerpt", 20);