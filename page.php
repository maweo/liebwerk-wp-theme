<?php
get_header();
maweo_mainbody_before();
?>

<main>
  <?php
  maweo_mainbody_start();
  get_template_part('loops/page-content');
  maweo_mainbody_end();
  ?>
</main>

<?php
maweo_mainbody_after();
get_footer();
?>