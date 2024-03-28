<?php
/*
 * Template Name: Main Template
 */
?>

<?php get_header(); ?>

<main class="header-height">
    <?php if (have_rows('elements')): ?>
        <?php while (have_rows('elements')):
            the_row(); ?>
            <?php
            $path = 'sections/' . get_row_layout() . '.php';
            include($path);
            ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>