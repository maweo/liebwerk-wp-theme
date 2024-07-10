<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$backgroundImage = get_sub_field('background_image');
$banner_layout = get_sub_field('banner_layout') ?? "content-left";
$gradient_direction = get_sub_field('gradient_direction') ?? "left-to-right";
$link = get_sub_field('link');
?>

<section class='link-banner'>
    <div class="container">
        <div class="row">
            <?php if ($banner_layout === "content-right"): ?>
                <div class="col-12 col-lg-4"></div>
            <?php endif; ?>
            <div class="col-12 col-lg-6">
                <?php if ($heading): ?>
                    <?php echo maweo_get_heading($heading, $headingTag, "link-banner--heading") ?>
                <?php endif; ?>
                <?php if ($text): ?>
                    <div class="maweo-wysiwyg link-banner--text">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
                <?php if ($link): ?>
                    <?php echo maweo_get_link($link, "link-banner--button") ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($backgroundImage): ?>
        <div class="link-banner--overlay link-banner--overlay--<?php echo $gradient_direction ?>"></div>
        <div class="link-banner--background-image" style="background-image: url('<?php echo $backgroundImage['url'] ?>')">
        </div>
    <?php endif; ?>
</section>