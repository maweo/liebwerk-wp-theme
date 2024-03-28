<?php 
    $title = get_the_title($post_id);
    $link = get_permalink($post_id);
    $image = get_the_post_thumbnail($post_id, 'medium', array('class' => 'post-card__image'));
    $excerpt = get_excerpt_by_id(100, 'content', $post_id);
?>

<div class="post-card">
    <span class="post-card__heading">
        <?php echo $image;?>
        <strong class="post-card__title">
            <?php echo $title;?>
        </strong>
        <div class="post-card__text">
            <?php echo $excerpt;?>...
        </div>
        <a href="<?php echo $link;?>" class="post-card__link">
            Mehr lesen 
            <img 
                src="<?php echo get_theme_icon_url('chevron-right.svg') ?>" 
                alt="" 
                class="post-card__icon"
            />
        </a>
    </span>
</div>