<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$link = get_sub_field('link');
$slider_items = get_sub_field('slider');
$use_dots = get_sub_field('use_dots');
$use_arrows = get_sub_field('use_arrows');
$carousel_animation = get_sub_field('carousel_animation');

// Note: If autoplay is needed -> check hero
?>

<?php $id = uniqid(); ?>

<section id="media-slider" class='media-slider'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo maweo_get_heading($heading, $heading_tag, "media-slider__heading mb-0") ?>
                <?php if ($text): ?>
                    <div class="maweo-wysiwyg media-slider__text">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div id="media-slider-carousel-<?php echo $id ?>" data-bs-ride="false"
            class="carousel slide <?php echo $carousel_autoplay_animation_class === "slide" ? "" : "carousel-fade" ?>">

            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <?php foreach ($slider_items as $index => $slide): ?>
                    <button type="button" data-bs-target="#media-slider-carousel-<?php echo $id ?>"
                        data-bs-slide-to="<?php echo $index ?>"
                        class="control <?php echo $index === 0 ? 'active' : ''; ?> <?php echo $carousel_dots_class ?>"
                        aria-current="true" aria-label="Slide <?php echo $index ?>"></button>
                <?php endforeach; ?>
            </div>

            <!-- Carousel Slides -->
            <div class="carousel-inner" role="listbox">
                <?php foreach ($slider_items as $index => $item): ?>
                    <div class="carousel-item media-slider__carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">

                        <?php if ($item['type'] === 'image'): ?>
                            <img src="<?php echo $item['url'] ?>" alt="<?php echo $item['alt'] ?>"
                                class="media-slider__image-container" />

                        <?php elseif ($item['type'] === 'video'): ?>
                            <div class="media-slider__video-wrapper">
                                <video controls autoplay muted class="media-slider__video-container">
                                    <source src="<?php echo $item['url'] ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Carousel Controls -->
            <button
                class="control carousel-control-prev media-slider__carousel-control-prev <?php echo $carousel_arrows_class ?>"
                type="button" data-bs-target="#media-slider-carousel-<?php echo $id ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="control carousel-control-next media-slider__carousel-control-next <?php echo $carousel_arrows_class ?>"
                type="button" data-bs-target="#media-slider-carousel-<?php echo $id ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php if ($link): ?>
            <?php echo maweo_get_link($link, "maweo-button media-slider__button" . $is_centered_class) ?>
        <?php endif; ?>
    </div>
</section>