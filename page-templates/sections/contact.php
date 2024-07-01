<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$item_repeater = get_sub_field('item_repeater');
$form = get_sub_field('form');
?>

<section class="contact">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5">
                <?php if ($heading): ?>
                    <?php echo maweo_get_heading($heading, $headingTag, "contact__form-heading"); ?>
                <?php endif; ?>
                <?php if ($text): ?>
                    <div class="contact__text">
                        <?= $text; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="contact__info">
                    <div class="row">
                        <?php foreach ($item_repeater as $sales_item): ?>
                            <?php
                            $image = get_image_data($sales_item['item_icon']);
                            ?>
                            <div class="col-6 mb-4">
                                <?php if ($image['url']): ?>
                                    <img src="<?php echo $image['url'] ?>" class="contact__info--img"
                                        alt="<?php echo $image['alt'] ?>">
                                <?php endif; ?>
                                <div class="contact__info--title">
                                    <?php if ($sales_item['item_title']): ?>
                                        <?php echo $sales_item['item_title'] ?>
                                    <?php endif; ?>
                                </div>
                                <?php if ($sales_item['item_text']): ?>
                                    <p class="contact__info--text">
                                        <?php echo $sales_item['item_text'] ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 mt-5 mt-lg-0">
                <?php if ($form): ?>
                    <div class="wysiwyg contact__form-text">
                        <?= $form; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>