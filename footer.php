<?php

$footer_logo = get_image_data_from_option_field('footer_logo');
$footer_social_links = get_field('footer_social_links', 'option');
$footer_column_1 = get_field('footer_column_1', 'option');
$footer_column_2 = get_field('footer_column_2', 'option');
$footer_column_3 = get_field('footer_column_3', 'option');
$footer_legal_links = get_field('footer_legal_links', 'option');
$footer_icons = get_field('footer_icons', 'option');

maweo_footer_before();
?>

<?php
include_once('template-parts/back-to-top.php');
?>

<footer id="site-footer" class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-4">
        <?php if ($footer_logo && $footer_logo['url'] != ""): ?>
          <img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['alt'] ?>" class="footer__logo">
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <?php if ($footer_column_1['heading']): ?>
          <h2 class="footer__heading">
            <?php echo $footer_column_1['heading'] ?>
          </h2>
        <?php endif; ?>
        <?php if ($footer_column_1['links']): ?>
          <div class="footer__links">
            <?php foreach ($footer_column_1['links'] as $link): ?>
              <?php if ($link['link']): ?>
                <?php echo maweo_get_link($link['link'], "footer__link") ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <?php if ($footer_column_2['heading']): ?>
          <h2 class="footer__heading">
            <?php echo $footer_column_2['heading'] ?>
          </h2>
        <?php endif; ?>
        <?php if ($footer_column_2['links']): ?>
          <div class="footer__links">
            <?php foreach ($footer_column_2['links'] as $link): ?>
              <?php if ($link['link']): ?>
                <?php echo maweo_get_link($link['link'], "footer__link") ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-6 col-lg-2">
        <?php if ($footer_column_3['heading']): ?>
          <h2 class="footer__heading">
            <?php echo $footer_column_3['heading'] ?>
          </h2>
        <?php endif; ?>
        <?php if ($footer_column_3['links']): ?>
          <div class="footer__links">
            <?php foreach ($footer_column_3['links'] as $link): ?>
              <?php if ($link['link']): ?>
                <?php echo maweo_get_link($link['link'], "footer__link") ?>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($footer_social_links): ?>
              <div class="footer__social-links">
                <?php foreach ($footer_social_links as $link): ?>
                  <?php if ($link['link']): ?>
                    <?php echo maweo_get_icon_link($link['link'], $link['icon'], "footer__social-link", "footer__social-link-icon") ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<section class="bottom-bar">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-5 order-1 order-lg-1">
        <?php if ($footer_legal_links): ?>
          <div class="bottom-bar__links">
            <?php foreach ($footer_legal_links as $link): ?>
              <?php if ($link['link']): ?>
                <?php echo maweo_get_link($link['link'], "bottom-bar__link") ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-12 col-lg-7 bottom-bar__company order-0 order-lg-1">
        <?php if ($footer_icons): ?>
          <div class="bottom-bar__icons">
            <?php foreach ($footer_icons as $image): ?>
              <?php $image = get_image_data($image['icon']); ?>
              <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="bottom-bar__icon">
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php maweo_footer_after(); ?>

<?php wp_footer(); ?>
</body>

</html>