<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package torchbearers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php torchbearers_post_thumbnail(); ?>
			<div class="header-overlay-content">
				<?php the_title( '<h1 class="entry-title">', '</h1>' );
				if ( 'post' === get_post_type() ) :
					torchbearers_posted_on();
				endif; 
				?>
			</div>
		<?php else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'torchbearers' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">
		<?php torchbearers_entry_footer(); ?>
	</footer> -->
</article><!-- #post-<?php the_ID(); ?> -->
