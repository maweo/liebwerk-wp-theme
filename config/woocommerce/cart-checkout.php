<?php

function woocommerce_button_proceed_to_checkout()
{
    echo "
        <a href='" . wc_get_checkout_url() . "' class='excelcamp-cart__checkout-button checkout-button button alt wc-forward'>
            " . esc_html__('Proceed to checkout', 'woocommerce') . "
            <img src='" . get_stylesheet_directory_uri() . '/assets/icons/Icon_Lock.svg' . "' alt='Secure Checkout'/>
        </a>
    ";

}