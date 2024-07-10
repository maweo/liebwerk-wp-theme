<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');

$images_desktop = get_sub_field('images_desktop');
$images_mobile = get_sub_field('images_mobile');
?>


<div class="engravings">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mx-auto">
                <?php if ($heading): ?>
                    <?php echo maweo_get_heading($heading, $heading_tag, "engravings__heading") ?>
                <?php endif; ?>
                <?php if ($text): ?>
                    <div class="maweo-wysiwyg engravings__text text-center">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row d-none d-lg-flex">
            <div class="col-10 mx-auto">
                <div class="d-flex justify-content-between engravings__images-desktop">
                    <?php $i = 0; ?>
                    <?php foreach ($images_desktop as $image): ?>
                        <?php $data = get_image_data($image['image']) ?>
                        <img src="<?php echo $data['url'] ?>" alt="<?php echo $data['alt'] ?>"
                            class="engravings__image-desktop engravings__image-desktop--<?php echo $i ?>">
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row d-lg-none">
            <div class="col-6 mx-auto">
                <div class="d-flex justify-content-between engravings__images-mobile">
                    <?php $i = 0; ?>
                    <?php foreach ($images_mobile as $image): ?>
                        <?php $data = get_image_data($image['image']) ?>
                        <img src="<?php echo $data['url'] ?>" alt="<?php echo $data['alt'] ?>"
                            class="engravings__image-mobile">
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>