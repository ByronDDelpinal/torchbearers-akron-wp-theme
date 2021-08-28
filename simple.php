<?php /* Template Name: Simple */ ?>

<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
