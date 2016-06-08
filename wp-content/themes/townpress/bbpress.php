<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php // PAGE CONTENT BEFORE
	get_template_part( 'components/page-content-before' ); ?>

	<!-- PAGE CONTENT : begin -->
	<div id="page-content">
		<div class="page-content-inner">

			<div class="page-content-bbpress">
				<?php the_content(); ?>
			</div>

		</div>
	</div>
	<!-- PAGE CONTENT : end -->

	<?php // PAGE CONTENT AFTER
	get_template_part( 'components/page-content-after' ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>