<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$form = get_sub_field('form');
$background_color_selection = get_sub_field('background_color');

$background_color = strtolower($background_color_selection);
?>

<section class="contact contact--<?php echo $background_color ?>">
    <div class="container contact__container py-5">
        <div class="row">
            <div class="col-md-6">
                <?php if ($heading): ?>
                    <?php echo maweo_get_heading($heading, $headingTag, "contact__form-heading"); ?>
                <?php endif; ?>
                <?php if ($text): ?>
                    <div class="contact__text">
                        <?= $text; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5 mt-md-0">
                <?php if ($form): ?>
                    <div class="wysiwyg contact__form-text">
                        <?= $form; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>