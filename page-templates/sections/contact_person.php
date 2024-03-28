<?php 
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $background = get_sub_field('background');
    $person_id = get_sub_field('person');
    $person_image = get_image_data(get_field('image', $person_id));
    $person_text = get_field('text', $person_id);
    $person_phone = get_field('phone', $person_id);
    $person_mail = get_field('mail', $person_id);
?>

<section class="contact-person contact-person--<?php echo $background; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($heading): ?>
                    <?php echo maweo_get_heading($heading, $heading_tag, "contact-person__heading") ?>
                <?php endif; ?>
                <div class="contact-person__wrapper contact-person__wrapper--<?php echo $background; ?>">
                    <div class="contact-person__data">
                        <strong class="contact-person__name">
                            <?php echo get_the_title($person_id) ?>
                        </strong>
                        <?php if($person_text): ?>
                            <div class="wysiwyg contact-person__text">
                                <?php echo $person_text ?>
                            </div>
                        <?php endif; ?>
                        <div class="contact-person__contact-links">
                            <?php if($person_phone): ?>
                                <a href="tel:<?php echo $person_phone ?>" class="contact-person__contact-link"> 
                                    <?php echo $person_phone ?>
                                </a>
                            <?php endif; ?>
                            <?php if($person_mail): ?>
                                <a href="mailto:<?php echo $person_mail ?>" class="contact-person__contact-link"> 
                                    <?php echo $person_mail ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($person_image):?>
                        <img 
                            src="<?php echo $person_image['url'] ?>" 
                            alt="<?php echo $person_image['alt'] ?>"
                            class="contact-person__image"
                        >
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>