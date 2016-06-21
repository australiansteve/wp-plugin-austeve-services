<?php
/**
 * Template part for displaying single services.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * 
 * @package AUSteve Services
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="gallery">
		<?php 
			$image_url = get_field('service-image'); 
			
			echo "<img class='service-gallery-image' src='".$image_url."'/>";
			
		?>
		</div>

		<div class="description">
		<?php echo get_field('service-description'); ?>
		</div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'austeve-services' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php austeve_services_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
