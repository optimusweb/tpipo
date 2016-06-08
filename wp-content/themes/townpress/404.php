<?php get_header(); ?>

<?php // PAGE CONTENT BEFORE
get_template_part( 'components/page-content-before' ); ?>

<!-- PAGE CONTENT : begin -->
<div id="page-content">
	<div class="error-404-page">
		<div class="c-content-box">
			<?php echo wpautop( do_shortcode( lsvr_get_field( 'page404_content', __( 'The page you are looking for is no longer available or has been moved.', 'lsvrtheme' ) ) ) ); ?>
		</div>
	</div>
</div>
<!-- PAGE CONTENT : end -->

<?php // PAGE CONTENT AFTER
get_template_part( 'components/page-content-after' ); ?>

<?php get_footer(); ?>