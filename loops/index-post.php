<?php
/*
 * The Index Post (or excerpt)
 * ===========================
 * Used by index.php, category.php and author.php
 */
?>


<article role="article" id="post_<?php the_ID()?>" <?php post_class(); ?> >
  <header>
    <?php the_post_thumbnail(); ?>
    <div class="index-post-category">
      <i class="bi bi-bookmark"></i> 
      <span><?php the_category(', '); ?></span>
    </div>
    <h2>
      <a href="<?php the_permalink(); ?>">
        <?php the_title()?>
      </a>
    </h2>
  </header>

  <section>
    <?php if ( has_excerpt( $post->ID ) ) {
    the_excerpt();
    ?><a href="<?php the_permalink(); ?>">
    	<?php _e( 'Continue reading →', 'maweo' ) ?>
      </a>
  	<?php } else {
  	  the_content( __('Continue reading →', 'maweo' ) );
	  } ?>

    <div>
      <i class="bi bi-calendar3"></i> <?php maweo_post_date(); ?>
      <i class="bi bi-person-circle"></i> <?php _e('By ', 'maweo'); the_author_posts_link(); ?>
      <i class="bi bi-chat-text"></i> <a href="<?php comments_link(); ?>"><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), '', 'maweo' ), number_format_i18n( get_comments_number() ) ); ?></a>
    </div>
  </section>
</article>
