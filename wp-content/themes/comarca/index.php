<?php
/**
 * The main template file
 *
 * @package Comarca
 */

get_header(); ?>

<style>

	.Main {
		margin: 2.25em 0;
	}

	.MainContainer {
		max-width: 72em;
		width: 100%;
		margin: 0 auto;
	}

</style>

<main id="main" class="Main" role="main">

	<div class="MainContainer flex flex-wrap">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'comarca' ),
				'next_text'          => __( 'Next page', 'comarca' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'comarca' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

	</div>

</main><!-- .main -->



<?php get_footer(); ?>
