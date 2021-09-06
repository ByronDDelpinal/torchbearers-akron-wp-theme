<?php /* Template Name: Simple */ ?>

<?php get_header(); ?>

<?php if ( is_front_page() ) : ?>
    <main id="primary" class="site-main homepage">
<?php else : ?>
    <main id="primary" class="site-main">
<?php endif; ?>
    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
