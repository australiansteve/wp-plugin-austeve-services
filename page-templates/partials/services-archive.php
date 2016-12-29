<?php
/**
 * Template part for displaying the archive of services.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * 
 * @package AUSteve Services
 */
?>
<div class="small-12 medium-4 large-3 columns">

	<div class="container service-archive-item">

		<div class="row">

			<div class="small-12 columns service-image">

				<?php $image = get_field('service-image'); ?>
				<img class='image-thumbnail' src='<?php echo $image['sizes']['thumbnail'] ?>' />

			</div>

			<div class="small-12 columns">

				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<div class="service-snippet"><?php echo get_field('service-snippet'); ?></div>
				
			</div>

		</div>

	</div>

</div>
