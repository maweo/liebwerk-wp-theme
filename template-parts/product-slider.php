<?php
/*
    You can include this section in all of your templates. 
    All you need to do is to create an array containing all of the product id's you want to display in the slider

    You can create an arrray like that by:

        -   Adding 'fields' => 'ids' to your query-arguments, if you use a WP-Query

            Example:

            $products = get_posts(array(
                'fields'          => 'ids', 
                'posts_per_page'  => -1,
                'post_type' => 'product',
            ));

        - Parsing the id out of your AFC-Repeater, if you use a repeater

            Example:

            $products = array_map(function ($a) { return $a['products']; }, get_sub_field('products'));

    Right now, there are 4 slides on desktop, 2 slides on tablet, 1 slide on mobile. 
    You can find the settings for the slide-amount in the product-slider.js-File. 
    The hide-show-logic of the pagination-arrows is done in this php-file. 
*/


// Get all product-objects based on the id's
$args = array(
    'post_type' => 'product',
    'post__in' => $products,
    'posts_per_page' => -1,
);

$loop = new WP_Query($args);

// Only display controls if there are enough slides to slide
if (count($products) == 1) {
    $controls_class = "d-none-md";
} else if (count($products) <= 4) {
    $controls_class = "d-xl-none";
} else {
    $controls_class = "";
}
?>

<?php if ($loop->have_posts()): ?>
    <div class="image-slider__wrapper">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides p-1">
                <?php
                while ($loop->have_posts()):
                    $loop->the_post();
                    wc_get_template_part('content', 'product');
                endwhile;
                ?>
            </div>
            <div class="image-slider__arrows">
                <button class="image-slider__button--prev image-slider__arrow" data-glide-dir="<">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="image-slider__button--next image-slider__arrow" data-glide-dir=">">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
<?php endif;