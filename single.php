<?php
/**
 * The template for displaying all single posts.
 *
 * @package Beetle
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				
		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			beetle_related_posts();

			comments_template();

		endwhile; ?>
		
		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?>
	
<?php get_footer(); ?>
