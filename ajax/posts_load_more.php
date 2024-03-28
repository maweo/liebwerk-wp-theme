<?php

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback'); // If you want it to work for non-logged in users too

function load_posts_by_ajax_callback()
{
    check_ajax_referer('post_pagination', 'security');

    $page = intval($_POST['currentPage']) ?? 1;
    $posts_per_page = intval($_POST['postsPerPage']) ?? 1;
    $paged = $_POST['direction'] == "next" ? $page + 1 : $page - 1;
    $cat =  intval($_POST['category']) ?? null;

    $posts = get_posts(array(
        'fields'          => 'ids', 
        'posts_per_page'  => $posts_per_page,
        'paged' => $paged,
        // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => $_POST['postType'],
        'cat' => $cat,
    ));

    foreach($posts as $post_id) {
        include(get_stylesheet_directory() . '/page-templates/sections/partials/post_card.php');
    }
    
    die();
}

add_action('wp_ajax_get_pagination_data_by_ajax', 'get_pagination_data_by_ajax_callback');
add_action('wp_ajax_nopriv_get_pagination_data_by_ajax', 'get_pagination_data_by_ajax_callback'); // If you want it to work for non-logged in users too

function get_pagination_data_by_ajax_callback()
{
    check_ajax_referer('post_pagination', 'security');

    $page = intval($_POST['currentPage']) ?? 1;
    $posts_per_page = intval($_POST['postsPerPage']) ?? 1;
    $paged = $_POST['direction'] == "next" ? $page + 1 : $page - 1;
    $cat =  intval($_POST['category']) ?? null;

    $posts = new WP_Query(array(
        'fields'          => 'ids', 
        'posts_per_page'  => -1,
        'paged' => $paged,
        // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => $_POST['postType'],
        'cat' => $cat,
    ));

    echo ceil($posts->found_posts / $posts_per_page);

    die;
}
