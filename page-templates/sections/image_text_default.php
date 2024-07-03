<?php
$heading_icon = get_sub_field('heading_icon');
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$headline_color = get_sub_field('headline_color');
$sub_heading = get_sub_field('sub_heading');
$text = get_sub_field('text');
$link = get_sub_field('link');

$image = get_image_data_from_sub_field('image');
$image_position = get_sub_field('image_position');
$image_fit = get_sub_field('image_fit') ?? "cover";

$is_centered_mobile_class = get_sub_field('is_text_centered_mobile') ? " d-block mx-auto mx-lg-0 text-center text-lg-start" : "";
?>

<?php $headline_color = " image-text__heading--" . $headline_color ?>

<section class="image-text">
    <div class="container">
        <div class="row align-items-stretch">
            <div
                class="col-12 col-lg-5 order-1 d-flex flex-column justify-content-center <?php echo $image_position === "right" ? "order-lg-0" : "order-lg-2 offset-lg-1" ?>">
                <div class="image-text__content">
                    <?php if ($heading_icon && $heading_icon['url'] != ""): ?>
                        <img alt="<?php echo $heading_icon['alt'] ?>"
                            class="image-text__icon <?php echo $is_centered_mobile_class ?>"
                            src="<?php echo $heading_icon['url'] ?>">
                    <?php endif; ?>
                    <?php echo maweo_get_heading($heading, $heading_tag, "image-text__heading mb-0" . $is_centered_mobile_class . $headline_color) ?>
                    <?php if ($sub_heading): ?>
                        <div class="image-text__sub-heading <?php echo $is_centered_mobile_class ?>">
                            <?php echo $sub_heading ?>
                        </div>
                    <?php endif; ?>
                    <div class="maweo-wysiwyg image-text__text <?php echo $is_centered_mobile_class ?>">
                        <?php echo $text ?>
                    </div>
                    <?php if ($link): ?>
                        <?php echo maweo_get_link($link, "maweo-button image-text__link" . $is_centered_mobile_class) ?>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="col-12 col-lg-6 order-lg-1 d-flex align-items-center <?php echo $image_position === "right" ? "offset-lg-1" : "" ?>">
                <div class="w-100">
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"
                        class="image-text__image image-text__image--<?php echo $image_fit ?>">
                </div>
            </div>
        </div>
    </div>
</section>