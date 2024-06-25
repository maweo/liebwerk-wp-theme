<?php
$logo = get_image_data_from_option_field('navigation_logo', 'option');
$mainMenuDe = get_field('main_menu_de', 'option');

$slide_in_direction_mobile = get_field('slide_in_direction_mobile', 'option') ?? 'left';
$show_language_switcher = get_field('show_language_switch', 'option');

$border_bottom_color = get_field('border_bottom_color', 'option');
$border_bottom_color_formatted = strtolower($border_bottom_color);
?>

<?php $borderClass = $border_bottom_color === 'None' ? "brand" : "$border_bottom_color_formatted" ?>

<?php include_once ('nav-parts/topbar.php'); ?>

<div>
  <div class="d-none d-xl-block">
    <?php include_once ('nav-parts/nav-desktop.php'); ?>
  </div>
  <div class="d-block d-xl-none">
    <?php include_once ('nav-parts/nav-mobile.php'); ?>
  </div>
</div>