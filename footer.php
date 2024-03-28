<?php

$footer_logo = get_image_data_from_option_field('footer_logo');
$footer_text = get_field('footer_text', 'option');
$footer_social_links = get_field('footer_social_links', 'option');
$footer_column_1 = get_field('footer_column_1', 'option');
$footer_column_2 = get_field('footer_column_2', 'option');
$footer_contact = get_field('footer_contact', 'option');
$footer_copyright = get_field('footer_copyright', 'option');
$footer_legal_links = get_field('footer_legal_links', 'option');

maweo_footer_before();
?>

<?php
include_once('template-parts/back-to-top.php');
?>

<footer id="site-footer" class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3">
        <?php if ($footer_logo && $footer_logo['url'] != ""): ?>
          <img src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['alt'] ?>" class="footer__logo">
        <?php endif; ?>
        <?php if ($footer_text): ?>
          <div class="footer__text">
            <?php echo $footer_text; ?>
          </div>
        <?php endif; ?>
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
      <div class="col-12 col-lg-3">
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
      <div class="col-12 col-lg-3">
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
        <?php if ($footer_column_2['icons']): ?>
          <div class="footer__icons">
            <?php foreach ($footer_column_2['icons'] as $icon): ?>
              <?php $icon_data = get_image_data($icon['icon']) ?>
              <img src="<?php echo $icon_data['url'] ?>" alt="<?php echo $icon_data['alt'] ?>" class="footer__icon" />
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-12 col-lg-3">
        <?php if ($footer_contact['heading']): ?>
          <h2 class="footer__heading">
            <?php echo $footer_contact['heading'] ?>
          </h2>
        <?php endif; ?>
        <?php if ($footer_contact['address']): ?>
          <div class="footer__address">
            <?php echo $footer_contact['address'] ?>
          </div>
        <?php endif; ?>
        <?php if ($footer_contact['phone_number']): ?>
          <a href="tel:<?php echo $footer_contact['phone_number'] ?>" class="footer__contact-link">
            <?php echo $footer_contact['phone_number'] ?>
          </a>
        <?php endif; ?>
        <?php if ($footer_contact['mail']): ?>
          <a href="mailto:<?php echo $footer_contact['mail'] ?>" class="footer__contact-link">
            <?php echo $footer_contact['mail'] ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<section class="bottom-bar">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4 order-1">
        <?php if ($footer_copyright): ?>
          <span class="bottom-bar__text">
            <?php echo $footer_copyright ?>
          </span>
        <?php endif; ?>
      </div>
      <div class="col-12 col-lg-4 order-0 order-lg-1">
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
      <div class="col-12 col-lg-4 bottom-bar__company order-1">
        <span class="bottom-bar__text">
          Designed & developed by MAWEO with <span class="bottom-bar__text--highlight">♥</span>
        </span>
      </div>
    </div>
  </div>
</section>

<?php maweo_footer_after(); ?>

<?php wp_footer(); ?>
</body>

</html>