<?php

// Get fields 
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$link = get_sub_field('link');
$grid_type = get_sub_field('type');
$count = get_sub_field('count') ?? 4; // Default count 3

$products = array();

if ($grid_type === "select") {
    // Get all Post IDs out of Repeater - did not use multi-select here if we need to add additional data
    $products = array_map(function ($a) {
        return $a['products'];
    }, get_sub_field('products'));
} else if ($grid_type === "favourites") {
    // get posts by category ids

    $products = get_posts(
        array(
            'fields' => 'ids',
            'posts_per_page' => $count,
            // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'product',
            'post__in' => wc_get_featured_product_ids(),
        )
    );
} else {
    // Get posts by date
    $products = get_posts(
        array(
            'fields' => 'ids',
            'posts_per_page' => $count,
            // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
            'orderby' => 'rand',
            'post_type' => 'product',
        )
    );
}
?>

<section class="product-grid-slider">
    <div class="container">
        <div class="row">
            <?php if ($heading): ?>
                <div class="col-12">
                    <?php echo maweo_get_heading($heading, $heading_tag, "product-grid-slider__heading"); ?>
                </div>
            <?php endif; ?>
            <?php if ($text): ?>
                <div class="col-lg-10 maweo-wysiwyg product-grid-slider__text">
                    <?php echo $text ?>
                </div>
            <?php endif; ?>
            <div class="col-12">
                <?php
                include (get_stylesheet_directory() . '/template-parts/product-slider.php');
                wp_reset_postdata();
                ?>
            </div>
            <?php if ($link): ?>
                <div class="col-12 d-flex justify-content-center">
                    <?php echo maweo_get_link($link, "product-grid-slider__link text-center"); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php wp_reset_query(); ?>
</section>