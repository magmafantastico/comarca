<?php
/**
 * The main template file
 *
 * @package Comarca
 */

get_header(); ?>

<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

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

	<?php

	$args = array(
		'post_type' => 'product'
	);

	$products = new WP_Query( $args );

	if ( $products->have_posts() ) {
		while( $products->have_posts() ) {
			$products->the_post();
			$price = get_post_meta( get_the_ID(), 'product_price', true ) . "\n";
			$thumb = wp_get_attachment_image_src(get_post_meta( get_the_ID(), '_thumbnail_id', true ));
			?>

			<img src="<?php echo $thumb[0] ?>" alt="" width="<?php echo $thumb[1] ?>">
			
			<h1><?php the_title() ?></h1>
			<div class='content'>
				<?php the_excerpt() ?>
			</div>
			<style>
				.price:before {
					content: 'R$ ';
				}
				
				.price:after {
					content: ',00';
					margin-left: -2px;
				}
			</style>
			<div class="price">
				<?php echo $price; ?>
			</div>
			<?php
		}
	} else {
		echo 'Oh ohm no products!';
	}

	?>

</main><!-- .site-main -->

<?php get_footer(); ?>
