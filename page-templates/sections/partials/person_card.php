<?php 
    $person_image = get_image_data(get_field('image', $person_id));
    $person_name= get_the_title($person_id);
    $person_position = get_field('position', $person_id);
    $person_text = get_field('text', $person_id);
    $person_phone = get_field('phone', $person_id);
    $person_mail = get_field('mail', $person_id);
?>
<div class="person-grid__card person-grid__card--<?php echo $background ?>">
    <?php if($person_image):?>
        <img 
            src="<?php echo $person_image['url'] ?>" 
            alt="<?php echo $person_image['alt'] ?>"
            class="person-grid__card-image"
        >
    <?php endif; ?>
    <strong class="person-grid__card-name">
        <?php echo $person_name ?>
    </strong>
    <?php if($person_position): ?>
        <div class="person-grid__card-position">
            <?php echo $person_position ?>
        </div>
    <?php endif; ?>
    <?php if($person_text): ?>
        <div class="wysiwyg person-grid__card-text">
            <?php echo $person_text ?>
        </div>
    <?php endif; ?>
    <div class="person-grid__card-contact-links">
        <?php if($person_phone): ?>
            <a href="tel:<?php echo $person_phone ?>" class="person-grid__card-contact-link"> 
                <?php echo $person_phone ?>
            </a>
        <?php endif; ?>
        <?php if($person_mail): ?>
            <a href="mailto:<?php echo $person_mail ?>" class="person-grid__card-contact-link"> 
                <?php echo $person_mail ?>
            </a>
        <?php endif; ?>
    </div>
</div>