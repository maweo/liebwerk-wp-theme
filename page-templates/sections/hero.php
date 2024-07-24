<?php
// Elements
$sub_heading = get_sub_field('sub_heading');
$sub_heading_image = get_sub_field('sub_heading_image');
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$link_primary = get_sub_field('link_primary');
$link_secondary = get_sub_field('link_secondary');
$background_image = get_sub_field('background_image');
$height = get_sub_field('height');
?>

<?php $id = uniqid(); ?>
<?php $height = $height === "height50" ? "height--half" : "height--full" ?>
<?php $headingStyle = "hero__heading" ?>

<section class='hero hero--<?php echo $height ?>'>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="hero__content">
                    <?php if ($sub_heading): ?>
                        <div class="hero__subheading-wrapper">
                            <div class="hero__subheading">
                                <?php echo $sub_heading ?>
                            </div>
                            <?php if ($sub_heading_image): ?>
                                <img alt="sub-heading_image" class="hero__subheading-image"
                                    src="<?php echo $sub_heading_image['url'] ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php echo maweo_get_heading($heading, $headingTag, $headingStyle) ?>
                    <?php if ($text): ?>
                        <div class="maweo-wysiwyg">
                            <?php echo $text ?>
                        </div>
                    <?php endif; ?>
                    <div class="hero__link-wrapper">
                        <?php if ($link_primary): ?>
                            <?php echo maweo_get_link($link_primary, "hero__link") ?>
                        <?php endif; ?>
                        <?php if ($link_secondary): ?>
                            <?php echo maweo_get_link($link_secondary, "hero__link-secondary") ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero__overlay"></div>
    <div class="hero__background-image" style="background-image: url('<?php echo $background_image['url'] ?>')"></div>
</section>