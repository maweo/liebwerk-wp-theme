<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$subheading = get_sub_field('subheading');
$subheadingTag = get_sub_field('subheading_tag');
$text = get_sub_field('text');
$logo_repeater = get_sub_field('logo_repeater');
$background_color = get_sub_field('background_color');
$default_color = get_sub_field('default_color');

$imgClass = ($default_color === "default-grayscale") ? "logo-repeater__logos-slide logo-repeater__logos-slide--default-grayscale" : "logo-repeater__logos-slide";
?>

<div class="logo-repeater logo-repeater--<?php echo $background_color ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($heading): ?>
                    <?php echo maweo_get_heading($heading, $headingTag, "logo-repeater--heading") ?>
                <?php endif; ?>
                <?php if ($subheading): ?>
                    <?php echo maweo_get_heading($subheading, $subheadingTag, "logo-repeater--subheading") ?>
                <?php endif; ?>
                <?php if ($text): ?>
                    <div class="maweo-wysiwyg logo-repeater--text">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
                <div class="logo-repeater__logos">
                    <div class="<?php echo $imgClass ?>">
                        <?php foreach ($logo_repeater as $logo_item): ?>
                            <?php
                            $image = get_image_data($logo_item['image']);
                            $imageForIconLink = $logo_item['image'];
                            $link = $logo_item['link'] ?? null;
                            ?>
                            <?php if ($link): ?>
                                <?php echo maweo_get_icon_link($link, $imageForIconLink, "logo-repeater__link") ?>
                            <?php else: ?>
                                <img src="<?php echo $image['url'] ?>" class=" logo-repeater__link" />
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>