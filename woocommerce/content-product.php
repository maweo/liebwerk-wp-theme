<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

?>

<div class="col-md-6 col-lg-4 liebwerk-product-card mb-4">
    <a href="<?php echo get_permalink($product->id) ?>" class="liebwerk-product-card--item">
        <!-- Image -->
        <div class="liebwerk-product-card__image">
            <?php if ($product->get_image_id()): ?>
                <img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'large'); ?>"
                    alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">
            <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/woocommerce-placeholder.png' ?>"
                    alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">
            <?php endif; ?>
        </div>
        <div class="liebwerk-product-card__content">
            <!-- category badge -->
            <?php if ($product->get_category_ids()): ?>
                <div class="liebwerk-product-card__categories">
                    <?php
                    $terms = get_the_terms($product->id, 'product_cat');
                    if ($terms) {
                        foreach ($terms as $term) {
                            echo '<div class="liebwerk-product-card__category-item">' . $term->name . '</div>';
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>
            <!-- Name -->
            <h2 class="liebwerk-product-card__title">
                <?php echo get_the_title($product->id) ?>
            </h2>
            <!-- short description -->
            <div class="liebwerk-product-card__description">
                <?php echo $product->get_short_description(); ?>
            </div>
        </div>
        <div class="liebwerk-product-card__bottom">
            <!-- Price -->
            <div class="liebwerk-product-card__price-wrapper">
                <?php if ($product->is_on_sale()): ?>
                    <div class="liebwerk-product-card__price">
                        <?php echo woocommerce_price($product->get_sale_price()); ?>
                    </div>
                    <div class="liebwerk-product-card__price liebwerk-product-card__price--sale">
                        <?php echo woocommerce_price($product->get_regular_price()); ?>
                    </div>
                <?php else: ?>
                    <div class="liebwerk-product-card__price">
                        <?php echo woocommerce_price($product->get_regular_price()); ?>
                    </div>
                <?php endif; ?>
            </div>
            <button class="liebwerk-product-card__button">
                Details
            </button>
        </div>

    </a>
</div>