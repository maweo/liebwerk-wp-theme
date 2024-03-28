<?php
/*
 * The Single Post
 */
?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
    <?php the_content(); ?>
  <?php
  endwhile;
else:
  get_template_part('loops/404');
endif;
?>