<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ChurchPew
 */

get_header(); ?>

<div class="row align-center"><!-- .row start -->

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

						<div class="small-6 medium-4 large-3 columns">

				            <a href='<?php echo get_permalink(); ?>' class=''>

		            			<div class="row columns">
									<?php $image = get_field('service-image'); ?>
									<img class='image-thumbnail' src='<?php echo $image['sizes']['thumbnail'] ?>' />
								</div>
					
		            			<div class="row columns">
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
									<p><?php echo get_field('service-snippet', $post->ID); ?></p>
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
