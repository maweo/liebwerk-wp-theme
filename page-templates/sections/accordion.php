<?
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$firstElementOpen = get_sub_field('first_element_open');
$accordionIcon = get_sub_field('accordion_icon');
$accordionRepeater = get_sub_field('accordion_repeater');
?>

<!-- create unique id object -->
<?php $id = uniqid(); ?>

<?php
switch ($accordionIcon) {
    case "biChevronDown":
        $icon = "bi-chevron-down";
        $iconClass = "flip";
        break;
    case "biArrowRight":
        $icon = "bi-arrow-right";
        $iconClass = "rotate";
        break;
    case "biPlus":
        $icon = "bi-plus";
        $iconClass = "small-rotate";
        break;
    default:
        $icon = "bi-chevron-down";
        $iconClass = "flip";
        break;
}
?>

<section class="accordion">
    <div class="accordion__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php echo maweo_get_heading($heading, $headingTag, "accordion--heading") ?>
                    <i className="bi bi-chevron-compact-down"></i>
                    <?php if ($text): ?>
                        <div class="maweo-wysiwyg accordion--text">
                            <?php echo $text ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="container accordion-flush">
                <?php $first = $firstElementOpen;
                foreach ($accordionRepeater as $accordion_item): ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="maweo-accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#<?php echo "maweo-".  esc_attr(sanitize_title($accordion_item['accordion_label'] . $id)); ?>"
                                aria-expanded="<?php echo $first ? 'true' : 'false'; ?>"
                                aria-controls="<?php echo "maweo-" . esc_attr(sanitize_title($accordion_item['accordion_label'] . $id)); ?>">
                                <?php echo $accordion_item['accordion_label'] ?>
                                <div class="accordion-icon <?php echo $iconClass ?>">
                                    <i class="<?php echo $icon ?>"></i>
                                </div>
                            </button>
                        </div>
                        <div id="<?php echo "maweo-" . esc_attr(sanitize_title($accordion_item['accordion_label'] . $id)); ?>"
                            class="accordion-collapse collapse <?php echo $first ? ' show' : ''; ?>"
                            aria-labelledby="<?php echo "maweo-" . esc_attr(sanitize_title($accordion_item['accordion_label'] . $id)); ?>"
                            data-bs-parent=".accordion">
                            <div class="accordion-body">
                                <?php if ($accordion_item['accordion_content_image']): ?>
                                    <div class="row accordion-row">
                                        <div class="col-md-6 maweo-wysiwyg">
                                            <?php echo $accordion_item['accordion_content'] ?>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="image-wrapper"
                                                src="<?php echo $accordion_item['accordion_content_image']['url'] ?>"
                                                alt="<?php echo $accordion_item['accordion_content_image']['alt'] ?>">
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo $accordion_item['accordion_content'] ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $first = false; ?>
                <?php endforeach; ?>
            </div>
        </div>
</section>