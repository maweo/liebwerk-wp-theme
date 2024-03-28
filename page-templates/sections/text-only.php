<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$subheading = get_sub_field('subheading');
$subheading_tag = get_sub_field('subheading_tag');
$text = get_sub_field('text');
$textalign = get_sub_field('align-content');
$aligntext = 'text-left';
$textwidth = "col-12 col-md-10";
if ($textalign == 'center') {
    $aligntext = 'text-only__center';
    $textwidth = "col-12 ";
}
$background = get_sub_field('background-color');
$button = get_sub_field('button');
?>

<section class="text-only bg-<?php echo $background ?>">
    <div class="container">
        <div class="row">
            <div class="<?php echo $textwidth ?>">
                <div class="<?php echo $aligntext ?> ">
                    <?php if ($heading) {
                        echo maweo_get_heading($heading, $heading_tag, "text-only__heading mb-0");
                    }
                    ?>
                    <?php if ($subheading) {
                        echo maweo_get_heading($subheading, $subheading_tag, "text-only__subheading mb-0");
                    }
                    ?>
                    <?php if ($text) { ?>
                        <div class="text-only__text maweo-wysiwyg">
                            <?php echo $text ?>
                        </div>
                    <?php } ?>
                    <?php if ($button) {
                        echo maweo_get_link($button, $class = "text-only__button maweo-button");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>