<?php
/*
 * The Single Post
 */
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
    <header>
      <div class="index-post-category">
        <i class="bi bi-bookmark"></i> 
        <span><?php the_category(', '); ?></span>
      </div>
      <h1 class="display-1"><?php the_title()?></h1>
    </header>
    <section class="container-xxl">
      <?php the_post_thumbnail(); ?>
    </section>

    <?php wp_link_pages(); ?>

    <section>
      <?php the_content(); ?>
    </section>

    <?php wp_link_pages(); ?>
  </article>

  <section class="container-xxl">
    <div class="row">
      <?php if (strlen(get_previous_post()->post_title) > 0) { ?>
      <div class="col-sm">
        <div>
          <i class="bi bi-chevron-compact-left fs-1"></i>
          <div>
            Previous post<br>
            <?php previous_post_link( '%link', '%title' ) ?>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php if (strlen(get_next_post()->post_title) > 0) { ?>
        <div class="col-sm">
          <div>
            <i class="bi bi-chevron-compact-right fs-1"></i>
            <div class="text-end">
              Next Post<br>
              <?php next_post_link( '%link', '%title' ) ?>
            </div>
        </div>
      </div>
      <?php } ?>

      <!-- `<div class="col text-start">
        <?php previous_post_link('%link', '<i class="bi bi-arrow-left"></i> Previous post: '.'%title'); ?>
      </div>
      <div class="col text-end">
        <?php next_post_link('%link', 'Next post: '.'%title'.' <i class="bi bi-arrow-right"></i>'); ?>
      </div> -->
    </div>
  </section>


  <?php
  endwhile; else :
    get_template_part('loops/404');
  endif;
?>


