<?php

function woocommerce_button_proceed_to_checkout()
{
    echo "
        <a href='" . wc_get_checkout_url() . "' class='liebwerk-cart-cart__checkout-button checkout-button button alt wc-forward'>
            " . esc_html__('Proceed to checkout', 'woocommerce') . "
        </a>
    ";

}