<?php
/**
 * The template for displaying articles in the loop with full content
 *
 * @package Beetle
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php beetle_post_image_archives(); ?>
		
		<header class="entry-header">
		
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			
			<?php beetle_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content clearfix">
			<?php the_content( esc_html__( 'Read more', 'beetle' ) ); ?>
		</div><!-- .entry-content -->

	</article>