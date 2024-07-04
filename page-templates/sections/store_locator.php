<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
?>


<div class="store-locator">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <?php if ($heading) : ?>
                    <?php echo maweo_get_heading($heading, $heading_tag, "store-locator__heading") ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode('[wpsf-map]') ?>
            </div>
        </div>
    </div>
</div>