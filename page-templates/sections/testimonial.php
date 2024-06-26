<?php 
    $icon = get_sub_field('icon'); 
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $text = get_sub_field('text');
    $testimonials = get_sub_field('testimonials');
?>

<section class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <?php if($icon) :?>  
                    <div class="d-flex justify-content-center">  
                        <img alt="<?php $icon['alt'] ?>"
                            class="testimonials__icon"
                            src="<?php echo $icon['url'] ?>">
                    </div>
                <?php endif; ?>
                <?php echo maweo_get_heading($heading, $heading_tag, "testimonials__heading text-center") ?>
                <?php if($testimonials): ?>
                    <div class="testimonials__row">
                        <?php foreach($testimonials as $index => $testimonial) : ?>
                            <?php 
                                $author = get_field('author', $testimonial['testimonial']);
                                $company = get_field('company', $testimonial['testimonial']);
                                $text = get_field('text', $testimonial['testimonial']);
                            ?>
                            <div class="col-12 col-lg-4 testimonials__item testimonials__item">
                                <div class="maweo-wysiwyg testimonials__text">
                                    <?php echo $text?>
                                </div>
                                <?php if($author): ?>
                                    <div class="testimonials__author">
                                        <?php echo $author?>
                                    </div>
                                <?php endif; ?>
                                <?php if($company): ?>
                                    <div class="testimonials__company">
                                        <?php echo $company?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
