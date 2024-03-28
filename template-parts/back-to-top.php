<?php
$back_to_top_image = get_image_data_from_option_field('back_to_top_button_image', 'option');
$background_color = get_field('back_to_top_button_background_color', 'option');
?>

<div class="back-to-top back-to-top--<?php echo $background_color ?>" onClick="backToTop()">
    <?php if ($back_to_top_image && $back_to_top_image['url'] != ""): ?>
        <img src="<?php echo $back_to_top_image['url'] ?>" alt="back to top">
    <?php endif; ?>
</div>