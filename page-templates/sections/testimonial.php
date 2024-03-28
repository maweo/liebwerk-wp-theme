<?php 
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $text = get_sub_field('text');
    $testimonials = get_sub_field('testimonials');
    $background = get_sub_field('background');

    $carousel_id = "testimonialCarousel" . uniqid();
?>

<section class="testimonials testimonials--<?php echo $background ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8 offset-xl-2">
                <?php echo maweo_get_heading($heading, $heading_tag, "testimonials__heading text-center") ?>
                <?php if($testimonials): ?>
                    <div id="<?php echo $carousel_id ?>" class="carousel slide testimonials__carousel" data-bs-ride="carousel">
                        <img 
                            src="<?php echo get_theme_icon_url('quotation_left.svg') ?>" 
                            alt=""
                            class="testimonials__quote testimonials__quote--left"
                        />
                        <img 
                            src="<?php echo get_theme_icon_url('quotation_right.svg') ?>" 
                            alt=""
                            class="testimonials__quote testimonials__quote--right"
                        />
                        <div class="carousel-indicators testimonials__indicators">
                            <?php foreach($testimonials as $index => $testimonial): ?>
                                <?php $class = $index == 0 ? "active testimonials__indicator--active" : ""; ?>
                                <button 
                                    type="button" 
                                    data-bs-target="#<?php echo $carousel_id?>" 
                                    data-bs-slide-to="<?php echo $index?>" 
                                    aria-label="Slide <?php echo $index?>"
                                    class="testimonials__indicator <?php echo $class?>"
                                    <?php if($index == 0): ?>
                                        aria-current="true" 
                                    <?php endif; ?>
                                ></button>
                            <?php endforeach; ?>
                        </div>
                        <div class="carousel-inner testimonials__item-wrapper">
                            <?php foreach($testimonials as $index => $testimonial) : ?>
                                <?php 
                                    $author = get_field('author', $testimonial['testimonial']);
                                    $company = get_field('company', $testimonial['testimonial']);
                                    $text = get_field('text', $testimonial['testimonial']);
                                    $class = $index == 0 ? "active" : "";
                                ?>
                                <div class="carousel-item testimonials__item testimonials__item--<?php echo $background ?> <?php echo $class ?>">
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
                        <button class="carousel-control-prev testimonials__control testimonials__control--prev" type="button" data-bs-target="#<?php echo $carousel_id?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon testimonials__prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next testimonials__control testimonials__control--next" type="button" data-bs-target="#<?php echo $carousel_id?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon testimonials__next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
