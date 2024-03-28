<?php
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $text = get_sub_field('text');
    $section_link = get_sub_field('link');
    $post_type = get_sub_field('post_type_select');
    $posts = get_sub_field('posts');
    $type = get_sub_field('type');

    $posts = array();

    if($type === "select") {
        $posts = get_sub_field('posts');
    } else {
        $posts = get_posts(array(
            'fields'          => 'ids', 
            'posts_per_page'  => 4,
            // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => $post_type,
        ));
    }
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
        <?php if(count($posts) > 0): ?>
            <div class="row">
                <div class="col-12">
                    <div class="post-grid__post-container">
                        <?php foreach($posts as $post_id): ?>
                            <?php include(get_stylesheet_directory() . '/page-templates/sections/partials/post_card.php'); ?>
                        <?php endforeach; ?>
                    <div>    
                </div>
            </div>
        <?php endif; ?>
        <?php if($section_link && $section_link != ""): ?>
            <div class="row">
                <div class="col-12">
                    <?php echo maweo_get_link($section_link, "post-grid__link") ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>