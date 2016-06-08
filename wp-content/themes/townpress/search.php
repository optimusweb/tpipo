<?php get_header(); ?>

<?php global $wp_query;
$total_results = $wp_query->found_posts;
$search_query = get_search_query(); ?>

<?php // PAGE CONTENT BEFORE
get_template_part( 'components/page-content-before' ); ?>

<!-- PAGE CONTENT : begin -->
<div id="page-content">
	<div class="search-results-page">

		<div class="c-content-box m-no-padding">
			<?php get_search_form() ?>
		</div>

		<?php if ( have_posts() ) : ?>

			<h2><?php echo @sprintf( __( '%d Results for <strong>"%s"</strong>', 'lsvrtheme' ), $total_results, $search_query ); ?></h2>

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="c-content-box">
					<h3 class="item-title"><?php the_title(); ?></h3>
					<p class="item-link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></p>
					<div class="item-text">
						<?php echo wpautop( do_shortcode( get_the_excerpt() ) ); ?>
					</div>
				</div>

			<?php endwhile; ?>

			<?php // PAGINATION
			get_template_part( 'components/pagination' ); ?>

		<?php else : ?>

			<p class="c-alert-message m-info">
				<i class="ico fa fa-info-circle"></i>
				<?php _e( 'No results found.', 'lsvrtheme' ); ?>
			</p>

		<?php endif; ?>

	</div>
</div>
<!-- PAGE CONTENT : end -->

<?php // PAGE CONTENT AFTER
get_template_part( 'components/page-content-after' ); ?>

<?php get_footer(); ?>