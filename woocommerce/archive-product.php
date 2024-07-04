<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy ?? null;
$term_id = $queried_object->term_id ?? null;
?>

<main class="pt-4">
    <section class="liebwerk-archive-product" id="archive-product">
        <div class="container mb-5">
            <?php if (apply_filters('woocommerce_show_page_title', true)): ?>
                <h1 class="woocommerce-products-header__title page-title">
                    <?php woocommerce_page_title(); ?>
                </h1>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <?php
                    if (woocommerce_product_loop()) {
                        do_action('woocommerce_before_shop_loop');
                        woocommerce_product_loop_start();
                        ?>

                        <div class="row">
                            <?php
                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
                                    the_post();
                                    ?>

                                    <?php wc_get_template_part('content', 'product'); ?>
                                    <?php
                                }
                            } else {
                                echo __('No products found');
                            }
                            ?>
                        </div>

                        <?php
                        woocommerce_product_loop_end();
                        do_action('woocommerce_after_shop_loop');
                    } else {
                        do_action('woocommerce_no_products_found');
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer('shop');