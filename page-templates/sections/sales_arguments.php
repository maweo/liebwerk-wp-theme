<?php
$heading = get_sub_field('heading');
$headingTag = get_sub_field('heading_tag');
$item_repeater = get_sub_field('item_repeater');
?>

<div class="sales-arguments">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($heading): ?>
                    <?php echo maweo_get_heading($heading, $headingTag, "sales-arguments--heading") ?>
                <?php endif; ?>
            </div>
            <?php foreach ($item_repeater as $sales_item): ?>
                <?php
                $image = get_image_data($sales_item['item_icon']);
                ?>
                <div class="col-6 col-lg-3 mb-3">
                    <div class="sales-arguments__card h-100">
                        <img src="<?php echo $image['url'] ?>" class="sales-arguments__card--img"
                            alt="<?php echo $image['alt'] ?>">
                        <div class="card-body">
                            <div class="sales-arguments__card--title"><?php echo $sales_item['item_title'] ?></div>
                            <p class="sales-arguments__card--text">
                                <?php echo $sales_item['item_text'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>