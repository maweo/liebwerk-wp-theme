<?php
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
                            $link = get_field('link', $testimonial['testimonial']);
                            $icon = get_field('testimonial_icon', $testimonial['testimonial']);
                            ?>
                            <div class="testimonials__item">
                                <div class="maweo-wysiwyg testimonials__text">
                                    <?php echo $text ?>
                                </div>
                                <div class="testimonials__item--grid">
                                    <div>
                                        <?php if ($author): ?>
                                            <div class="testimonials__item--author">
                                                <?php echo $author ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($link): ?>
                                            <a href="<?php echo $link['url'] ?>" class="testimonials__item--link">
                                                <img src='<?php echo get_stylesheet_directory_uri() . '/assets/icons/open.svg' ?>'
                                                    alt='Open Icon'>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="testimonials__item--icon-wrapper">
                                        <?php if ($icon): ?>
                                            <div class="testimonials__item--icon pl-2">
                                                <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
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