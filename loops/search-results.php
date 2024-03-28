<?php
/*
 * The Search Results (Main Header and) Loop
 */
?>

<header>
  <h1>
    <?php _e('Search Results for', 'maweo'); ?> &ldquo;<?php the_search_query(); ?>&rdquo;
  </h1>
</header>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
    <header>
      <h2>
        <a href="<?php the_permalink(); ?>">
          <?php the_title()?>
        </a>
      </h2>
    </header>
    <section>
      <?php the_excerpt(); ?>
    </section>
  </article>
<?php endwhile; else: ?>
  <div>
    <article>
      <i class="bi bi-exclamation-triangle"></i> <?php _e('Sorry, your search yielded no results.', 'maweo'); ?>
    </article>
  </div>
<?php endif; ?>
