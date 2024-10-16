<?php

require get_template_directory() . '/config/woocommerce/cart-quantity.php';
require get_template_directory() . '/config/woocommerce/cart-checkout.php';

add_theme_support('woocommerce');

// Remove general stuff

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', "woocommerce_template_single_excerpt", 20);

// Disable instant order confirmation in Germanized
add_filter('woocommerce_gzd_instant_order_confirmation', '__return_false');

// Hide Related Products Slider
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// Hide other shipping Methods if free shipping is available
function maweo_hide_shipping_when_free_shipping_available($rates)
{
    $free_shipping_exists = false;

    // Check if "Free Shipping" and "Local Pickup" methods exist
    foreach ($rates as $rate_key => $rate) {
        if ('free_shipping' === $rate->get_method_id()) {
            $free_shipping_exists = true;
        }
    }

    // Unset all other shipping methods except "Free Shipping" and "Local Pickup"
    if ($free_shipping_exists) {
        foreach ($rates as $rate_key => $rate) {
            if ('free_shipping' !== $rate->get_method_id()) {
                unset($rates[$rate_key]);
            }
        }
    }

    return $rates;
}
add_filter('woocommerce_package_rates', 'maweo_hide_shipping_when_free_shipping_available', 100);

add_filter('woocommerce_attribute_label', 'polylang_translate_product_attributes', 10, 3);

function polylang_translate_product_attributes($label, $name, $product)
{
    if (function_exists('pll__')) {
        return pll__($label);
    }
    return $label;
}
