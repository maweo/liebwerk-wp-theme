<?php
$heading_icon = get_sub_field('heading_icon');
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$link = get_sub_field('link');
$image_position = get_sub_field('image_position');
$image = get_sub_field('image_with_ratio');
$is_centered_mobile_class = get_sub_field('is_text_centered_mobile') ? " d-block mx-auto mx-lg-0 text-center text-lg-start" : "";
?>

<section class="image-text">
    <div class="container">
        <div class="row align-items-center">
            <div
                class="col-12 col-lg-6 order-1 <?php echo $image_position === "right" ? "order-lg-0" : "order-lg-2 offset-lg-1 " ?>">
                <?php if ($heading_icon && $heading_icon['url'] != ""): ?>
                    <img alt="<?php $heading_icon['alt'] ?>"
                        class="image-text__icon <?php echo $is_centered_mobile_class ?>"
                        src="<?php echo $heading_icon['url'] ?>">
                <?php endif; ?>
                <?php echo maweo_get_heading($heading, $heading_tag, "image-text__heading" . $is_centered_mobile_class) ?>
                <div class="maweo-wysiwyg <?php echo $is_centered_mobile_class ?>">
                    <?php echo $text ?>
                </div>
                <?php if ($link): ?>
                    <?php echo maweo_get_link($link, "image-text__link" . $is_centered_mobile_class) ?>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-5 order-lg-1 <?php echo $image_position === "right" ? "offset-lg-1" : "" ?>">
                <?php if ($image['url']): ?>
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="image-text__image">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>