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

	<style>

		.post {
			padding: 1em .5em 1em 1em;
			width: 18em;
		}

		.post:first-of-type {
			width: 36em;
		}

		.post .entry-title {
			color: #004d40;
			font-size: 1.5em;
			font-weight: 900;
			line-height: 1.15;
		}

		.post:first-of-type .entry-title {
			font-size: 3em;
			line-height: 1.05;
		}

		.post .entry-title:hover {
			color: #00796b;
		}

		.post .entry-tag {
			color: #004d40;
			text-transform: uppercase;
			font-weight: 900;
			letter-spacing: 0;
			font-size: .875em;
		}

	</style>

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
