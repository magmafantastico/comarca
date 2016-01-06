<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<style>

	.post {
		padding: 1em;
		width: 18em;
	}

	.post:first-of-type {
		width: 36em;
	}

	.post .entry-title {
		color: #004d40;
		font-size: 1.5em;
		font-weight: 900;
	}

	.post:first-of-type .entry-title {
		font-size: 3em;
	}

	.post .entry-title:hover {
		color: #00796b;
	}

</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
//		comarca_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
//			the_content( sprintf(
//				__( 'Continue reading %s', 'comarca' ),
//				the_title( '<span class="screen-reader-text">', '</span>', false )
//			) );

			/*the_excerpt();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'comarca' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'comarca' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );*/
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php /*comarca_entry_meta();*/ ?>
		<?php /*edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); */?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
