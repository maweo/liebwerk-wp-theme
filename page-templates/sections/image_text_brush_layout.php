<?php
$background = get_sub_field('background');
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$sub_heading = get_sub_field('sub_heading');
$text = get_sub_field('text');
$link = get_sub_field('link');

$image_desktop = get_image_data_from_sub_field('image_desktop');
$image_position_desktop = get_sub_field('image_position_desktop');

$image_mobile = get_image_data_from_sub_field('image_mobile');
$image_position_mobile = get_sub_field('image_position_mobile');

$is_centered_mobile_class = get_sub_field('is_text_centered_mobile') ? " d-block mx-auto mx-lg-0 text-center text-lg-start" : "";
?>

<section class="image-text-brush-layout image-text-brush-layout--<?php echo $background; ?>">
    <div class="container">
        <div class="row">
            <div
                class="col-12 col-lg-6 order-1 <?php echo in_array($image_position_desktop, ["right-top", "right-bottom"]) ? "order-lg-1 offset-lg-1" : "order-lg-2 offset-lg-1" ?>">
                <div class="image-text-brush-layout__content ">
                    <?php echo maweo_get_heading($heading, $heading_tag, "image-text-brush-layout__heading image-text-brush-layout__heading--$background mb-0" . $is_centered_mobile_class) ?>
                    <?php if ($sub_heading): ?>
                        <div
                            class="image-text-brush-layout__sub-heading image-text-brush-layout__sub-heading--<?php echo $background; ?> <?php echo $is_centered_mobile_class ?>">
                            <?php echo $sub_heading ?>
                        </div>
                    <?php endif; ?>
                    <div
                        class="maweo-wysiwyg image-text-brush-layout__text image-text-brush-layout__text--<?php echo $background; ?> <?php echo $is_centered_mobile_class ?>">
                        <?php echo $text ?>
                    </div>
                    <?php if ($link): ?>
                        <?php echo maweo_get_link($link, "maweo-button image-text-brush-layout__link image-text-brush-layout__link--$background" . $is_centered_mobile_class) ?>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="col-12 col-lg-3 order-lg-1 <?php echo in_array($image_position_desktop, ["right-top", "right-bottom"]) ? "offset-lg-1" : "" ?>">
                <div class="image-text-brush-layout__image-wrapper">
                    <?php if ($image_desktop): ?>
                        <img src="<?php echo $image_desktop['url'] ?>" alt="<?php echo $image_desktop['alt'] ?>"
                            class="d-none d-lg-block image-text-brush-layout__desktop-image image-text-brush-layout__desktop-image--<?php echo $image_position_desktop; ?>">
                    <?php endif; ?>
                    <?php if ($image_mobile): ?>
                        <img src="<?php echo $image_mobile['url'] ?>" alt="< ?php echo $image_mobile['alt'] ?>"
                            class="d-block d-lg-none image-text-brush-layout__mobile-image image-text-brush-layout__mobile-image--<?php echo $image_position_mobile; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>