<?php
$not_found_image = get_field('not-found-image', 'option');
$not_found_image_position = get_field('not-found-image-position', 'option');
$not_found_heading = get_field('not-found-heading', 'option');
$not_found_subheading = get_field('not-found-subheading', 'option');
$not_found_text = get_field('not-found-text', 'option');
$not_found_button = get_field('not-found-button', 'option');

get_header();
?>


<div class="not-found not-found--<?php echo $not_found_image_position === "cover" ? "fullwidth" : "fit" ?>" id="404">
    <?php if ($not_found_image): ?>
        <img src="<?php echo $not_found_image['url'] ?>" alt="<?php echo $not_found_image['alt'] ?>"
            class="not-found__image not-found__image--<?php echo $not_found_image_position ?>">
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($not_found_heading): ?>
                    <h1 class="not-found__heading">
                        <?php echo esc_html($not_found_heading); ?>
                    </h1>
                <?php endif; ?>
                <?php if ($not_found_subheading): ?>
                    <h2 class="not-found__subheading">
                        <?php echo esc_html($not_found_subheading); ?>
                    </h2>
                <?php endif; ?>
                <?php if ($not_found_text): ?>
                    <div class="not-found__text maweo-wysiwyg">
                        <?php echo $not_found_text; ?>
                    </div>
                <?php endif; ?>
                <?php if ($not_found_button): ?>
                    <?php echo maweo_get_link($not_found_button, 'not-found__home-button'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
maweo_mainbody_after();
get_footer();
?>