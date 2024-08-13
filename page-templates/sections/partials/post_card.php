<?php
$title = get_the_title($post_id);
$link = get_permalink($post_id);
$image = get_the_post_thumbnail($post_id, 'large', array('class' => 'post-card__image'));
$intro = get_field('introduction', $post_id);
$date = get_the_date('F Y', $post_id);
?>

<?php if (!$intro) {
    $intro = strip_tags($intro);
} ?>

<div class="col">
    <a href="<?php echo $link; ?>" class="text-decoration-none">
        <div class="post-card">
            <?php echo $image; ?>
            <div class="post-card__content">
                <?php if ($title): ?>
                    <div class="post-card__title">
                        <strong>
                            <?php echo $title; ?>
                        </strong>
                    </div>
                <?php endif; ?>
                <?php if ($intro): ?>
                    <div class="post-card__text">
                        <?php echo strip_tags($intro); ?>...
                    </div>
                <?php endif; ?>
            </div>
            <div class="post-card__link-wrapper">
                <a href="<?php echo $link; ?>" class="post-card__link">
                    <?php _e('Mehr lesen', 'maweo'); ?>
                </a>
            </div>
        </div>
    </a>
</div>