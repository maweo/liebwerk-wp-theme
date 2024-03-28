<?php
$text = get_sub_field('text');
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$sub_heading = get_sub_field('sub_heading');
$text_heading = get_sub_field('text_heading');
$text_heading_tag = get_sub_field('text_heading_tag');
$link = get_sub_field('link');
$media_type = get_sub_field('media_type');
$image_position = get_sub_field('image_position');
$background = get_sub_field('background');
$is_centered_mobile_class = get_sub_field('is_text_centered_mobile') ? " d-block mx-auto mx-lg-0 text-center text-lg-start" : "";
?>

<section class="image-text image-text--<?php echo $background; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo maweo_get_heading($heading, $heading_tag, "image-text__heading mb-0" . $is_centered_mobile_class) ?>
                <?php if ($sub_heading): ?>
                    <div class="image-text__sub-heading <?php echo $is_centered_mobile_class ?>">
                        <?php echo $sub_heading ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row image-text__content-row">
            <div
                class="col-12 col-lg-6 order-1 <?php echo $image_position === "right" ? "order-lg-0" : "order-lg-2 offset-lg-1 " ?>">
                <?php if ($text_heading): ?>
                    <?php echo maweo_get_heading($text_heading, $text_heading_tag, "image-text__text-heading" . $is_centered_mobile_class) ?>
                <?php endif; ?>
                <div class="maweo-wysiwyg <?php echo $is_centered_mobile_class ?>">
                    <?php echo $text ?>
                </div>
                <?php if ($link): ?>
                    <?php echo maweo_get_link($link, "maweo-button image-text__link" . $is_centered_mobile_class) ?>
                <?php endif; ?>
            </div>
            <div
                class="col-12 col-lg-5 order-lg-1 image-text__media-col <?php echo $image_position === "right" ? "offset-lg-1" : "" ?>">
                <?php
                if ($media_type === "image"):
                    $image = get_image_data_from_sub_field('image');
                    ?>
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="image-text__image">
                <?php endif; ?>
                <?php
                if ($media_type === "video"):
                    $video = get_sub_field("video")['url'];
                    $options = get_sub_field("video_options");
                    $autoplay = $options["autoplay"] == true ? "autoplay playsinline" : "";
                    $controls = $options["show_controls"] == true ? "controls" : "";
                    ?>
                    <video class="image-text__video" muted <?php echo $autoplay ?>     <?php echo $controls ?> loop>
                        <source src="<?php echo $video ?>" type="video/mp4">
                        Video wird in deinem Browser leider nicht unterstützt
                    </video>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>