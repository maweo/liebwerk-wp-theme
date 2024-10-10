<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$item_repeater = get_sub_field('item_repeater');
?>

<section class="sales-arguments">
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-12">
                <?php if ($heading): ?>
                    <?php echo maweo_get_heading($heading, $headingTag, "sales-arguments--heading") ?>
                <?php endif; ?>
            </div>
            <?php foreach ($item_repeater as $sales_item): ?>
                <?php
                $image = get_image_data($sales_item['item_icon']);
                ?>
                <div class="col-12 col-lg-3 g-2 g-md-3">
                    <div class="sales-arguments__card h-100">
                        <?php if ($image['url']): ?>
                            <img src="<?php echo $image['url'] ?>" class="sales-arguments__card--img"
                                alt="<?php echo $image['alt'] ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="sales-arguments__card--title">
                                <?php if ($sales_item['item_title']): ?>
                                    <?php echo $sales_item['item_title'] ?>
                                <?php endif; ?>
                            </div>
                            <?php if ($sales_item['item_text']): ?>
                                <p class="sales-arguments__card--text">
                                    <?php echo $sales_item['item_text'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>