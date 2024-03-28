<?php
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $text = get_sub_field('text');

    $posts_per_page_desktop = (int) get_sub_field('posts_per_page_desktop');
    $posts_per_page_mobile = (int) get_sub_field('posts_per_page_mobile');
    $post_type = get_sub_field('post_type_select');

    $all_posts = new WP_Query(array(
        'fields'          => 'ids', 
        'posts_per_page'  => -1,
        // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => $post_type,
    ));

    $posts_desktop = get_posts(array(
        'fields'          => 'ids', 
        'posts_per_page'  => $posts_per_page_desktop,
        // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => $post_type,
    ));

    $posts_mobile = get_posts(array(
        'fields'          => 'ids', 
        'posts_per_page'  => $posts_per_page_mobile,
        // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => $post_type,
    ));

    $categories = get_terms(array(
        'taxonomy' => 'category', // Replace 'category' with the actual taxonomy name if different
        'hide_empty' => true,     // Only fetch non-empty terms
        // Only get those categories from the desired post type
        'object_ids' => get_posts(array(
            'post_type' => $post_type,
            'posts_per_page' => -1,
            'fields' => 'ids', // Fetch only post IDs for efficiency
        )),
    ));
?>

<section class="post-grid">
    <div class="container">
        <?php if($heading || $text):  ?>
            <div class="row">
                <div class="col-12 col-xl-10">
                    <?php if($heading): ?>
                        <?php echo maweo_get_heading($heading, $heading_tag, "post-grid__heading"); ?>
                    <?php endif; ?>
                    <?php if($text): ?>
                        <div class="post-grid__text maweo-wysiwyg">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if(count($categories) > 0): ?>
            <div class="row">
                <div class="col-12">
                    <div class="post-grid__category-container">
                        <?php foreach($categories as $cat): ?>
                            <button data-category="<?php echo $cat->term_id?>" class="post-grid__category-button">
                                <?php echo $cat->name?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div 
                    class="post-grid__posts-desktop d-none d-lg-grid"
                    data-page="1"
                    data-max-pages="<?php echo ceil($all_posts->found_posts / $posts_per_page_desktop) ?>"
                    data-posts-per-page="<?php echo $posts_per_page_desktop ?>"
                    data-post-type="<?php echo $post_type  ?>"
                    data-ajaxurl="<?php echo esc_js(admin_url('admin-ajax.php')); ?>"
                    data-security="<?php echo esc_js(wp_create_nonce("post_pagination")); ?>"
                    data-category=""
                >
                    <div class="post-grid__post-container post-grid__post-container--desktop">
                        <?php foreach($posts_desktop as $post_id): ?>
                            <?php include(get_stylesheet_directory() . '/page-templates/sections/partials/post_card.php'); ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="post-grid__pagination post-grid__pagination--desktop">
                        <button 
                            class="post-grid__pagination-button post-grid__pagination-button--previous post-grid__pagination-button--desktop"
                            disabled
                        >
                            <img 
                                src="<?php echo get_theme_icon_url('chevron-left.svg') ?>" 
                                alt="" 
                                class="post-grid__pagination-icon"
                            />
                        </button>
                        <div class="post-grid__pagination-text">
                            <div class="post-grid__pagination-current post-grid__pagination-current--desktop">
                                1
                            </div>
                            <div class="post-grid__pagination-text-inner">
                                von
                            </div>
                            <div class="post-grid__pagination-max post-grid__pagination-max--desktop">
                                <?php echo ceil($all_posts->found_posts / $posts_per_page_desktop) ?>
                            </div>
                        </div>
                        <button class="post-grid__pagination-button post-grid__pagination-button--next post-grid__pagination-button--desktop">
                            <img 
                                src="<?php echo get_theme_icon_url('chevron-right.svg') ?>" 
                                alt="" 
                                class="post-grid__pagination-icon"
                            />
                        </button>
                    </div>
                </div>
                <div 
                    class="post-grid__posts-mobile d-lg-none"
                    data-page="1"
                    data-max-pages="<?php echo ceil($all_posts->found_posts / $posts_per_page_mobile) ?>"
                    data-posts-per-page="<?php echo $posts_per_page_mobile ?>"
                    data-post-type="<?php echo $post_type  ?>"
                    data-ajaxurl="<?php echo esc_js(admin_url('admin-ajax.php')); ?>"
                    data-security="<?php echo esc_js(wp_create_nonce("post_pagination")); ?>"
                    data-category=""
                >
                    <div class="post-grid__post-container">
                        <?php foreach($posts_mobile as $post_id): ?>
                            <?php include(get_stylesheet_directory() . '/page-templates/sections/partials/post_card.php'); ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="post-grid__pagination post-grid__pagination--mobile">
                        <button 
                            class="post-grid__pagination-button post-grid__pagination-button--previous post-grid__pagination-button--mobile"
                            disabled
                        >
                            <img 
                                src="<?php echo get_theme_icon_url('chevron-left.svg') ?>" 
                                alt="" 
                                class="post-grid__pagination-icon"
                            />
                        </button>
                        <div class="post-grid__pagination-text">
                            <div class="post-grid__pagination-current post-grid__pagination-current--mobile">
                                1
                            </div>
                            <div class="post-grid__pagination-text-inner">
                                von
                            </div>
                            <div class="post-grid__pagination-max post-grid__pagination-max--mobile">
                                <?php echo ceil($all_posts->found_posts / $posts_per_page_mobile) ?>
                            </div>
                        </div>
                        <button class="post-grid__pagination-button post-grid__pagination-button--next post-grid__pagination-button--mobile">
                            <img 
                                src="<?php echo get_theme_icon_url('chevron-right.svg') ?>" 
                                alt="" 
                                class="post-grid__pagination-icon"
                            />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>