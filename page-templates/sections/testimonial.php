<?php
$icon = get_sub_field('icon');
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$testimonials = get_sub_field('testimonials');
$carousel_id = "testimonialCarousel" . uniqid();
?>


<div class="testimonials">
    <div class="container testimonials__wrapper">
        <div class="row">
            <div class="col-12">
                <?php echo maweo_get_heading($heading, $heading_tag, "testimonials__heading") ?>
            </div>
            <div class="col-12">
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        <?php foreach ($testimonials as $index => $testimonial): ?>
                            <?php
                            $author = get_field('author', $testimonial['testimonial']);
                            $text = get_field('text', $testimonial['testimonial']);
                            ?>
                            <div class="testimonials__item">

                                <div class="maweo-wysiwyg testimonials__text">
                                    <?php echo $text ?>
                                </div>
                                <?php if ($author): ?>
                                    <div class="testimonials__author">
                                        <?php echo $author ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="testimonials__arrows">
                        <button class="testimonials__button--prev testimonials__arrow" data-glide-dir="|<">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <button class="testimonials__button--next testimonials__arrow" data-glide-dir="|>">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>