<?php
// Elements
$heading = get_sub_field('heading');
$headingTag = get_sub_field('section_heading_tag');
$text = get_sub_field('text');
$background_image = get_sub_field('background_image');
$image_right = get_sub_field('image_right'); 
?>

<?php 
if ($image_right):
    $height = "hero-small__min-image-height";  
endif; 

if (!$background_image):
    $bg_color = "hero-small__background-color";  
endif; 


?>

<section class='hero-small <?php echo $height ?> <?php echo $bg_color ?>'>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10">
                <?php echo maweo_get_heading($heading, $headingTag, "hero-small__heading" ) ?>
            </div>
            <div class="col-12 col-lg-8">
            <?php if ($text): ?>
                <div class="maweo-wysiwyg hero-small__text">
                    <?php echo $text ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <?php if ($image_right): ?>
                <div class="hero-small__image">
                    <img src="<?php echo $image_right['url'] ?>" alt="<?php echo $image_right['alt'] ?>">
                </div>
            <?php endif; ?>
    </div>
  
    <?php if ($background_image): ?>
        <div class="hero-small__overlay"></div>
        <div class="hero-small__background-image" style="background-image: url('<?php echo $background_image['url'] ?>')"></div>
    <?php endif; ?>
   
</section>