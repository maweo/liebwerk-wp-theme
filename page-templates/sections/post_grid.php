<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');

$posts_per_page = (int) get_sub_field('posts_per_page');
$post_type = get_sub_field('post_type_select');

$all_posts = new WP_Query(
    array(
        'fields' => 'ids',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => $post_type,
    )
);

$posts = get_posts(
    array(
        'fields' => 'ids',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => $post_type,
    )
);
?>

<section class="post-grid">
    <div class="container">
        <?php if ($heading || $text): ?>
            <div class="row">
                <div class="col-12">
                    <?php if ($heading): ?>
                        <?php echo maweo_get_heading($heading, $heading_tag, "post-grid__heading"); ?>
                    <?php endif; ?>
                    <?php if ($text): ?>
                        <div class="post-grid__text maweo-wysiwyg">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="post-grid__posts d-grid" data-page="1"
                    data-max-pages="<?php echo ceil($all_posts->found_posts / $posts_per_page) ?>"
                    data-posts-per-page="<?php echo $posts_per_page ?>" data-post-type="<?php echo $post_type ?>"
                    data-ajaxurl="<?php echo esc_js(admin_url('admin-ajax.php')); ?>"
                    data-security="<?php echo esc_js(wp_create_nonce("post_pagination")); ?>" data-category="">
                    <div class="post-grid__post-container">
                        <?php foreach ($posts as $post_id): ?>
                            <?php include (get_stylesheet_directory() . '/page-templates/sections/partials/post_card.php'); ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="post-grid__load-more">
                        <button class="post-grid__load-more-button">
                            <?php _e('Mehr Laden', 'maweo'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>