<?php
  get_header();
  maweo_mainbody_before();
?>

<main>
  <?php maweo_mainbody_start(); ?>

  <?php get_template_part('loops/single-post', get_post_format()); ?>

  <?php maweo_mainbody_end(); ?>
</main>

<?php
    maweo_mainbody_after();
    get_footer();
?>
