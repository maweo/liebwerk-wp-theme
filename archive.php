<?php
  get_header(); 
  maweo_mainbody_before();
?>

<main id="site-main">
  <?php maweo_mainbody_start(); ?>

  <header class="container">
    <span class="h3"><?php  _e('Archive', 'maweo'); ?></span>
    <h1>
      <?php echo the_archive_title(); ?>
    </h1>
  </header>

  <?php get_template_part('loops/index-loop'); ?>

  <?php maweo_mainbody_end(); ?>
</main>

<?php 
  maweo_mainbody_after();
  get_footer(); 
?>