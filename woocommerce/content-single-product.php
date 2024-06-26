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
$product_sale_arguments_repeater = get_field('product_sale_arguments_repeater');
$product_characteristics_repeater = get_field('product_characteristics_repeater');
$product_tips_and_tricks = get_field('tips_and_tricks_content');
?>

<main>
    <div class="liebwerk-single-product">
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
            <div class="container">
                <div class="row gx-lg-5">

                    <div class="col-lg-6">
                        <?php echo do_shortcode('[product_gallery_slider]'); ?>
                    </div>


                    <div class="col-lg-6 liebwerk-single-product__right-col">
                        <!-- Product Title -->
                        <h1 class="liebwerk-single-product__heading">
                            <?php echo $product->get_name(); ?>
                        </h1>

                        <!-- Product SHORT Description -->
                        <?php if ($short_description = $product->get_short_description()): ?>
                            <div class="liebwerk-single-product__description my-3">
                                <!-- short description -->
                                <?php echo $product->get_short_description(); ?>
                            </div>
                        <?php endif; ?>

                        <!-- PDP Sales Arguments -->
                        <?php if ($product_sale_arguments_repeater): ?>
                            <div>
                                <ul class="liebwerk-single-product__pdp-sales-arguments-list">
                                    <?php foreach ($product_sale_arguments_repeater as $argument): ?>
                                        <li><?php echo $argument['product_sale_argument']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Price -->
                        <div class="liebwerk-single-product__price">
                            <?php echo $product->get_price_html(); ?>
                            <div class="liebwerk-single-product__mwst-info">inkl. MwSt und zzgl. Versand</div>
                        </div>

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

            <div class="container mt-5">
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-description" type="button" role="tab"
                            aria-controls="pills-description" aria-selected="true">Beschreibung</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-characteristics-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-characteristics" type="button" role="tab"
                            aria-controls="pills-characteristics" aria-selected="false">Merkmale</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tips-and-tricks-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-tips-and-tricks" type="button" role="tab"
                            aria-controls="pills-tips-and-tricks" aria-selected="false">Tipps und Tricks</button>
                    </li>
                </ul>
            </div>
            <div class="tab-border"></div>
            <div class="container">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                        aria-labelledby="pills-description-tab">
                        <!-- Long Description -->
                        <?php echo $product->get_description(); ?>
                    </div>
                    <div class="tab-pane fade" id="pills-characteristics" role="tabpanel"
                        aria-labelledby="pills-characteristics-tab">

                        <!-- Characteristics -->
                        <?php if ($product_characteristics_repeater): ?>
                            <div>
                                <ul class="liebwerk-single-product__pdp-characteristics-list">
                                    <?php foreach ($product_characteristics_repeater as $characteristic): ?>
                                        <li><?php echo $characteristic['product_characteristic']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="tab-pane fade" id="pills-tips-and-tricks" role="tabpanel"
                        aria-labelledby="pills-tips-and-tricks-tab">
                        <!-- wysiwyg -->
                        <?php if ($product_tips_and_tricks): ?>
                            <div class="liebwerk-single-product__tips-and-tricks">
                                <?php echo $product_tips_and_tricks; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="container my-5">
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

            <?php if (have_rows('elements')): ?>
                <?php while (have_rows('elements')):
                    the_row();

                    $path = get_template_directory() . '/page-templates/sections/' . get_row_layout() . '.php';
                    if (file_exists($path)) {
                        include $path;
                    }
                endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php do_action('woocommerce_after_single_product'); ?>