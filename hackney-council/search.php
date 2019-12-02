<?php get_header(); ?>

<main class="lbh-main-wrapper" role="main">
	<div class="lbh-container">
		<h1 class="lbh-heading-h1"><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>
	</div>
</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
