<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

// get title of current page navigation 
$endpoint = WC()->query->get_current_endpoint();
?>


<div class="container py-md-5">
    <div class="row">
        <div class="col-lg-2">
            <?php
            /**
             * My Account navigation.
             *
             * @since 2.6.0
             */
            do_action('woocommerce_account_navigation');
            ?>
        </div>
        <div class="col-lg-7 offset-lg-1 py-3 py-md-0">
            <h1 class="liebwerk-account__current-page-heading d-none d-lg-block">
                <?php
                $endpoint = str_replace('-', ' ', $endpoint);
                $endpoint = ucwords($endpoint);
                echo $endpoint;
                ?>
            </h1>
            <div class="liebwerk-account__content">
                <?php
                /**
                 * My Account content.
                 *
                 * @since 2.6.0
                 */
                do_action('woocommerce_account_content');
                ?>
            </div>
        </div>
    </div>
</div>