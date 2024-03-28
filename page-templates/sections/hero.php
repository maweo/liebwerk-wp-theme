<?php
// Elements
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$link = get_sub_field('link');

// Element choices
$backgroundElement = get_sub_field('background_element');
$backgroundImage = get_sub_field('background_image');
$backgroundColor = get_sub_field('background_color');
$backgroundVideo = get_sub_field('background_video');
$backgroundSlider = get_sub_field('background_slider');

// General options
$height = get_sub_field('height'); // height50/height100
$overlay = get_sub_field('background_overlay'); // light/dark
$is_centered_class = get_sub_field('is_text_centered') ? " d-block mx-auto text-center" : "";

// Slider options
$carousel_arrows_class = get_sub_field('use_arrows') ? "d-none d-lg-block" : " d-none";
$carousel_dots_class = get_sub_field('use_dots') ? "d-block" : " d-none";
$carousel_autoplay = get_sub_field('autoplay'); // true/false
$carousel_autoplay_interval = get_sub_field('autoplay_interval'); // seconds
$carousel_autoplay_animation_class = get_sub_field('carousel_animation'); // slide/fade
?>

<?php $id = uniqid(); ?>

<?php if ($backgroundElement === "color"): ?>
    <?php $backgroundColor = strtolower($backgroundColor) ?>
<?php endif; ?>

<?php $height = $height === "height50" ? "height--half" : "height--full" ?>

<!-- regex for $carousel_autoplay_interval format -->
<?php if ($backgroundElement === "slider"): ?>
    <?php if ($carousel_autoplay_interval): ?>
        <?php $carousel_autoplay_interval = preg_replace('/[^0-9]/', '', $carousel_autoplay_interval) * 1000 ?>
    <?php endif; ?>
<?php endif; ?>

<!-- edge case: overlay triggers font color, that should be ignored for textOnly & background to avoid white on white text -->
<?php
$hasBackground =
    $backgroundElement === 'image' ||
    $backgroundElement === 'video' ||
    $backgroundElement === 'slider';
?>

<?php $headingStyle = $hasBackground ? "hero__heading hero__heading--$overlay" : "hero__heading" ?>
<?php $textStyle = $hasBackground ? "hero__text--$overlay" : "hero__text" ?>

<section class='hero hero--<?php echo $height ?>'>
    <div class="container hero__content">
        <div class="row">
            <div class="col-12">
                <?php echo maweo_get_heading($heading, $headingTag, $headingStyle . $is_centered_class) ?>
                <?php if ($text): ?>
                    <div class="maweo-wysiwyg <?php echo $textStyle ?> <?php echo $is_centered_class ?>">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
                <?php if ($link): ?>
                    <?php echo maweo_get_link($link, "maweo-button hero__button hero__link" . $is_centered_class) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ($backgroundElement === "color"): ?>
        <div class="hero__background hero__background--<?php echo $backgroundColor ?>"></div>
    <?php endif; ?>

    <?php if ($backgroundElement === "image"): ?>
        <div class="hero__overlay--<?php echo $overlay ?>"></div>
        <div class="hero__background-image" style="background-image: url('<?php echo $backgroundImage['url'] ?>')">
        </div>
    <?php endif; ?>

    <?php if ($backgroundElement === "video"): ?>
        <div class="hero__overlay--<?php echo $overlay ?>"></div>
        <video autoplay muted loop id="" class="hero__background-video hero--<?php echo $height ?>">
            <source src="<?php echo $backgroundVideo['url'] ?>" type="video/mp4">
        </video>
    <?php endif; ?>

    <?php if ($backgroundElement === "slider"): ?>
        <div class="hero__carousel-fullscreen">
            <div id="hero-carousel-<?php echo $id ?>"
                class="carousel slide <?php echo $carousel_autoplay_animation_class === "slide" ? "" : "carousel-fade" ?> <?php echo $overlay === "light" ? "carousel-dark" : "" ?>"
                data-bs-ride="carousel">

                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    <?php foreach ($backgroundSlider as $index => $slide): ?>
                        <button type="button" data-bs-target="#hero-carousel-<?php echo $id ?>"
                            data-bs-slide-to="<?php echo $index ?>"
                            class="control <?php echo $index === 0 ? 'active' : ''; ?> <?php echo $carousel_dots_class ?>"
                            aria-current="true" aria-label="Slide <?php echo $index ?>"></button>
                    <?php endforeach; ?>
                </div>

                <!-- Carousel Slides -->
                <div class="hero__overlay--<?php echo $overlay ?>"></div>
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($backgroundSlider as $index => $slide): ?>

                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?> hero--<?php echo $height ?>"
                            style="background-image: url(<?php echo $slide['url'] ?>);"
                            data-bs-interval="<?php echo $carousel_autoplay === true ? $carousel_autoplay_interval : false ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Carousel Controls -->
                <button class="control carousel-control-prev <?php echo $carousel_arrows_class ?>" type="button"
                    data-bs-target="#hero-carousel <?php echo $id ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="control carousel-control-next <?php echo $carousel_arrows_class ?>" type="button"
                    data-bs-target="#hero-carousel-<?php echo $id ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    <?php endif; ?>
</section>