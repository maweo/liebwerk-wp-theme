<?php
get_header();
maweo_mainbody_before();

// get post id
$post_id = get_the_ID();
$title = get_the_title();
$introduction = get_field('introduction');
$thumbnail = get_the_post_thumbnail_url();
$main_image = $thumbnail ? $thumbnail : get_template_directory_uri() . '/assets/images/placeholder.png';
$content_repeater = get_field('content');
$author = get_field('author');
?>


<main>
  <?php maweo_mainbody_start(); ?>
  <div class="blog-single">

    <div class="container">
      <div class="col-12 mb-4">
        <h1 class="blog-single__heading">
          <?php echo $title; ?>
        </h1>
        <div class="blog-single__date">
          <div class="blog-single__date-border"></div>
          <?php echo get_the_date('d. F Y'); ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <img src="<?php echo $main_image; ?>" class="blog-single__teaser-image" alt="<?php echo $title; ?>">
        </div>
        <div class="col-lg-12">
          <?php if ($introduction): ?>
            <div class="blog-single__introduction">
              <?php echo $introduction ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row blog-single__content">
        <div class="col-lg-12">
          <?php if ($content_repeater): ?>
            <?php foreach ($content_repeater as $content): ?>

              <?php
              $heading = $content['heading'];
              $headingTag = $content['heading_tag'];
              $text = $content['text'];
              $image = $content['image'];
              $formatted_heading = strtolower(str_replace(' ', '-', $heading));
              ?>

              <div class="blog-single__content-item" id="<?php echo $formatted_heading; ?>">
                <?php echo maweo_get_heading($heading, $headingTag, "blog-single__content-item__heading") ?>
                <?php if ($text): ?>
                  <div class="maweo-wysiwyg">
                    <?php echo $text ?>
                  </div>
                <?php endif; ?>
                <?php if ($image): ?>
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"
                    class="blog-single__content-item__image">
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php if (have_rows('elements')): ?>
    <?php while (have_rows('elements')):
      the_row(); ?>
      <?php
      $path = 'page-templates/sections/' . get_row_layout() . '.php';
      include ($path);
      ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php maweo_mainbody_end(); ?>
</main>

<?php
maweo_mainbody_after();
get_footer();
?>