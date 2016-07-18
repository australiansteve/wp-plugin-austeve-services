<?php
/**
 * Template part for displaying the archive of services.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * 
 * @package AUSteve Services
 */
?>
<div class="small-6 medium-4 large-3 columns">

	<div class="container service-archive-item">

		<div class="row">

			<div class="small-12 columns service-image">

				<a href="<?php echo get_permalink(); ?>">
					<?php $image = get_field('service-image'); ?>
					<img class='image-thumbnail' src='<?php echo $image['sizes']['thumbnail'] ?>' />
				</a>
			</div>

			<div class="small-12 columns">

				<a href="<?php echo get_permalink(); ?>">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					<p class="service-snippet"><?php echo get_field('service-snippet'); ?></p>
				</a>
			</div>

		</div>

	</div>

</div>
