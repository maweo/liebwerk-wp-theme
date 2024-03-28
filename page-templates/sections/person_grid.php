<?php 
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $background = get_sub_field('background');
    $type = get_sub_field('type');
    $persons = [];

    if($type != "all") {
        $persons = array_map(function ($a) { return $a['person']; },get_sub_field('persons'));
    } else {
        $persons = get_posts(array(
            'fields'          => 'ids', 
            'posts_per_page'  => -1,
            // If needed, we could install https://de.wordpress.org/plugins/post-types-order/ that allows Backend Drag and Drop Ordering
            'orderby' => 'title',
            'order' => 'ASC',
            'post_type' => 'persons',
        ));
    }
?>

<section class="person-grid person-grid--<?php echo $background; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($heading): ?>
                    <?php echo maweo_get_heading($heading, $heading_tag, "person-grid__heading") ?>
                <?php endif; ?>
                <div class="person-grid__cards">
                    <?php foreach($persons as $person_id): ?>
                        <?php include(get_stylesheet_directory() . '/page-templates/sections/partials/person_card.php') ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>