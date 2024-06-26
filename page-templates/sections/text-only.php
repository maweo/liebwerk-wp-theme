<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$button = get_sub_field('button');
?>

<section class="text-only">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <?php if ($heading) {
                    echo maweo_get_heading($heading, $heading_tag, "text-only__heading");
                }
                ?>
            </div>
            <div class="col-12 col-lg-6">
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
</section>