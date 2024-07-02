<?php 
    $icon = get_sub_field('icon'); 
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $text = get_sub_field('text');
    $testimonials = get_sub_field('testimonials');
    $carousel_id = "testimonialCarousel" . uniqid();
?>

<section class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($icon) :?>  
                    <div class="d-flex justify-content-center">  
                        <img alt="<?php $icon['alt'] ?>"
                            class="testimonials__icon"
                            src="<?php echo $icon['url'] ?>">
                    </div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <?php echo maweo_get_heading($heading, $heading_tag, "testimonials__heading text-center col-12 col-lg-8") ?>
                </div>
                <?php if($testimonials): ?>
                    <div id="<?php echo $carousel_id ?>" class="carousel slide testimonials__carousel" data-bs-ride="carousel">
                        <div class="carousel-inner testimonials__item-wrapper row">
                            <?php foreach($testimonials as $index => $testimonial) : ?>
                                <?php 
                                    $author = get_field('author', $testimonial['testimonial']);
                                    $text = get_field('text', $testimonial['testimonial']);
                                    $class = $index == 0 ? "active" : "";
                                ?>
                                <div class="col-12 col-lg-4 carousel-item testimonials__item testimonials__item--<?php echo $background ?> <?php echo $class ?>">
                                    <div class="maweo-wysiwyg testimonials__text">
                                        <?php echo $text?>
                                    </div>
                                    <?php if($author): ?>
                                        <div class="testimonials__author">
                                            <?php echo $author?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row justify-content-betweeen">
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
                            <div class="width-auto">
                                <button class="carousel-control-prev testimonials__control testimonials__control--prev" type="button" data-bs-target="#<?php echo $carousel_id?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon testimonials__prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next testimonials__control testimonials__control--next" type="button" data-bs-target="#<?php echo $carousel_id?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon testimonials__next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>