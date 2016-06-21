<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ChurchPew
 */

get_header(); ?>

<div class="row"><!-- .row start -->

	<div class="small-12 columns"><!-- .columns start -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>
				</header><!-- .page-header -->

				<div class="row service-archive-item">

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="small-2 columns">

				            <a href='<?php echo get_permalink(); ?>' class=''>

		            			<div class="row columns">
									<?php 
										$image_url = get_field('service-image'); 
				
										echo "<img class='service-image' src='".$image_url."'/>";
									?>
								</div>
					
		            			<div class="row columns">
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
									<p><?php echo get_field('service-description', $post->ID); ?></p>
								</div>
					
				            </a>

						</div>

					<?php endwhile; ?>

				</div> <!-- .service-archive-item.image -->

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'page-templates/partials/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .columns end -->

</div><!-- .row end -->

<?php get_footer(); ?>
