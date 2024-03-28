<?php
  get_header(); 
  maweo_mainbody_before();
?>

<main id="site-main">
  <?php maweo_mainbody_start(); ?>

  <header class="container">
    <h3><?php _e('Category:', 'maweo'); ?></h3>
    <h1>
      <?php echo single_cat_title(); ?>
    </h1>
  </header>

  <?php
    get_template_part('loops/index-loop');
    maweo_mainbody_end();
  ?>
</main>

<?php 
  maweo_mainbody_after();
  get_footer(); 
?>