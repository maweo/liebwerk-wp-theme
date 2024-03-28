<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$subHeading = get_sub_field('sub_heading');
$subHeadingTag = get_sub_field('sub_heading_tag');
$text = get_sub_field('text');
$is_centered_class = get_sub_field('is_text_centered') ? " d-block mx-auto text-center" : "";
$backgroundElement = get_sub_field('background_element');
$backgroundImage = get_sub_field('background_image');
$backgroundColor = get_sub_field('background_color');
$showButton = get_sub_field('show_button');
$button = get_sub_field('button');
$linkTarget = get_sub_field('button_target');
?>

<?php if ($backgroundElement === "color"): ?>
    <?php $backgroundColor = strtolower($backgroundColor) ?>
<?php endif; ?>

<section class='link-banner'>
    <div class="container <?php echo $is_centered_class ?>">
        <div class="row">
            <div class="col-12">
                <?php echo maweo_get_heading($heading, $headingTag, "link-banner--heading") ?>
                <?php if ($subHeading): ?>
                    <?php echo maweo_get_heading($subHeading, $subHeadingTag, "link-banner--subheading") ?>
                <?php endif; ?>
                <?php if ($text): ?>
                    <div class="maweo-wysiwyg link-banner--text">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
                <?php if ($showButton): ?>
                    <?php echo maweo_get_link($button, "link-banner--button" . $is_centered_class) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ($backgroundElement === "color"): ?>
        <div class="link-banner--background link-banner--background-<?php echo $backgroundColor ?>"></div>
    <?php endif; ?>

    <?php if ($backgroundElement === "image"): ?>
        <div class="link-banner--overlay"></div>
        <div class="link-banner--background-image" style="background-image: url('<?php echo $backgroundImage['url'] ?>')">
        </div>
    <?php endif; ?>
</section>