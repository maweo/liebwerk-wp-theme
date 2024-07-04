<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$elements = get_sub_field('elements');

?>

<section class="elements-grid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($heading) : ?>
                    <?php echo maweo_get_heading($heading, $headingTag, "elements-grid__heading"); ?>
                <?php endif; ?>
                <div class="elements-grid__elements d-none d-lg-grid">
                    <?php foreach ($elements as $element) : ?>
                        <?php $image = get_image_data($element['image']); ?>
                        <div class="elements-grid__element">
                            <?php if ($image) : ?>
                                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="elements-grid__element-image">
                            <?php endif; ?>
                            <?php if ($element['heading']) : ?>
                                <?php echo maweo_get_heading($element['heading'], $element['heading_tag'], "elements-grid__element-heading"); ?>
                            <?php endif; ?>
                            <?php if ($element['text']) : ?>
                                <div class="maweo-wysiwyg elements-grid__element-text">
                                    <?php echo $element['text']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="elements-grid__slider d-lg-none">
                    <div class="glide__track" data-glide-el="track">
                        <div class="glide__slides">
                            <?php foreach ($elements as $element) : ?>
                                <?php $image = get_image_data($element['image']); ?>
                                <div class="elements-grid__element">
                                    <?php if ($image) : ?>
                                        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="elements-grid__element-image">
                                    <?php endif; ?>
                                    <?php if ($element['heading']) : ?>
                                        <?php echo maweo_get_heading($element['heading'], $element['heading_tag'], "elements-grid__element-heading"); ?>
                                    <?php endif; ?>
                                    <?php if ($element['text']) : ?>
                                        <div class="maweo-wysiwyg elements-grid__element-text">
                                            <?php echo $element['text']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="elements-grid__controls">
                        <div class=" elements-grid__bullets" data-glide-el="controls[nav]">
                            <?php foreach ($elements as $element) : ?>
                                <button class="glide__bullet elements-grid__bullet"></button>
                            <?php endforeach; ?>
                        </div>
                        <div class="elements-grid__slider-arrows">
                            <button class="elements-grid__slider-arrow" aria-label="Slider left" data-glide-dir="<">
                                <img src="<?php echo get_theme_icon_url('arrow-right-solid.svg') ?>" alt="" class="elements-grid__slider-arrow-img elements-grid__slider-arrow-img--prev">
                            </button>
                            <button class="elements-grid__slider-arrow" aria-label="Slider right" data-glide-dir=">">
                                <img src="<?php echo get_theme_icon_url('arrow-right-solid.svg') ?>" alt="" class="elements-grid__slider-arrow-img elements-grid__slider-arrow-img--next">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>