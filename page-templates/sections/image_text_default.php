<?php
$padding = get_sub_field('section_padding');
$heading_icon = get_sub_field('heading_icon');
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$headline_color = get_sub_field('headline_color');
$sub_heading = get_sub_field('sub_heading');
$text = get_sub_field('text');
$link = get_sub_field('link');
$media_type = get_sub_field('media_type');
$video = get_sub_field('youtube_embedd_code');

$padding = $padding === "big" ? "image-text__padding-big" : "" ;

$image_one = get_image_data_from_sub_field('image');

if (get_sub_field('image_two')) {
    $image_two = get_image_data_from_sub_field('image_two');
} else {
    $image_two = null;
}

$image_position = get_sub_field('image_position');
$image_fit = get_sub_field('image_fit') ?? "cover";

$is_centered_mobile_class = get_sub_field('is_text_centered_mobile') ? " d-block mx-auto mx-lg-0 text-center text-lg-start" : "";
?>

<?php $headline_color = " image-text__heading--" . $headline_color ?>

<section class="image-text <?php echo $padding; ?>">
    <div class="container">
        <div class="row">
            <div
                class="col-12 <?php echo $image_two ? "col-lg-5" : "col-lg-6" ?> order-1 d-flex flex-column justify-content-center <?php echo $image_position === "right" ? "order-lg-0" : "order-1 order-lg-2 offset-lg-1 " ?> ">
                <div
                    class="image-text__content mt-3 mt-lg-0  <?php echo $image_two ? "image-text__content--large" : "" ?>">
                    <div class="image-text__heading-container"> 
                    <?php if ($heading_icon && $heading_icon['url'] != ""): ?>
                        <img alt="<?php echo $heading_icon['alt'] ?>"
                            class="image-text__icon <?php echo $is_centered_mobile_class ?>"
                            src="<?php echo $heading_icon['url'] ?>">
                    <?php endif; ?>
                    <?php echo maweo_get_heading($heading, $heading_tag, "image-text__heading mb-0" . $is_centered_mobile_class . $headline_color) ?>
                    </div>
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
                class="col-12 <?php echo $image_two ? "col-lg-6" : "col-lg-5" ?> order-lg-1 <?php echo $image_position === "right" ? "offset-lg-1" : "" ?>">
                <div class="image-text__image-wrapper">
                    <?php if($media_type == "youtube"):  ?>
                        <?php if($video): ?>
                            <?php echo $video; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if ($image_one && $image_one['url'] != ""): ?>
                            <div>
                                <img src="<?php echo $image_one['url'] ?>" alt="<?php echo $image_one['alt'] ?>"
                                    class="image-text__image image-text__image--<?php echo $image_fit ?>">
                            </div>
                        <?php endif; ?>
                        <?php if ($image_two && $image_two['url'] != ""): ?>
                            <div>
                                <img src="<?php echo $image_two['url'] ?>" alt="<?php echo $image_two['alt'] ?>"
                                    class="image-text__image image-text__image--<?php echo $image_fit ?>">
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>