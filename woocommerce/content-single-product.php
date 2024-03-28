<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
?>

<?php

$terms = get_the_terms($product->get_id(), 'product_cat');
?>

<main>
    <div class="liebwerk-single-product pt-lg-5">
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
            <div class="container-md">
                <div class="row gx-5">
                    <div class="col-lg-7 position-relative">
                        <?php
                        /**
                         * Hook: woocommerce_before_single_product_summary.
                         *
                         * @hooked woocommerce_show_product_sale_flash - 10
                         * @hooked woocommerce_show_product_images - 20
                         */
                        remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

                        do_action('woocommerce_before_single_product_summary');
                        ?>
                    </div>
                    <div class="col-lg-5 liebwerk-single-product__right-col">

                        <!-- Product Category -->
                        <?php if ($product->get_category_ids()): ?>
                            <div class="liebwerk-single-product__categories">
                                <?php
                                $terms = get_the_terms($product->id, 'product_cat');
                                if ($terms) {
                                    foreach ($terms as $term) {
                                        echo '<div class="liebwerk-single-product__category-item">' . $term->name . '</div>';
                                    }
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <!-- Product Title -->
                        <h1 class="liebwerk-single-product__heading">
                            <?php echo $product->get_name(); ?>
                        </h1>

                        <!-- Product SHORT Description -->
                        <?php if ($short_description = $product->get_short_description()): ?>
                            <div class="my-3">
                                <div class="liebwerk-single-product__subheading">Description:</div>
                                <!-- short description -->
                                <?php echo $product->get_short_description(); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Product Attributes -->
                        <?php if ($product->get_attributes()): ?>
                            <div class="my-3">
                                <div class="liebwerk-single-product__subheading">
                                    Attributes:
                                </div>
                                <?php
                                $attributes = $product->get_attributes();
                                foreach ($attributes as $attribute) {
                                    echo $attribute->get_name() . ': ' . $attribute->get_options()[0] . '<br>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        /**
                         * Hook: woocommerce_single_product_summary.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40 -> removed
                         * @hooked woocommerce_template_single_sharing - 50
                         * @hooked WC_Structured_Data::generate_product_data() - 60
                         */

                        //  remove sku and categories
                        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
                        do_action('woocommerce_single_product_summary');
                        ?>
                    </div>
                </div>
            </div>


            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                        <!-- Product LONG Description -->
                        <div class="my-3">
                            <div><strong>Description</strong></div>
                            <?php echo $product->get_description(); ?>
                        </div>
                    </div>
                </div>
                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10 -> removed
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                //  remove tabs
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
                do_action('woocommerce_after_single_product_summary');
                ?>

            </div>
        </div>
    </div>
</main>

<?php do_action('woocommerce_after_single_product'); ?>