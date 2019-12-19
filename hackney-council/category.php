<?php get_header(); ?>
	<?php get_template_part('component-announcement'); ?>
  <?php get_template_part('component-breadcrumb'); ?>
	<main class="lbh-main-wrapper" role="main">
		<div class="lbh-container">
			<h1 class="lbh-heading-h1"><?php _e( '', 'html5blank' ); single_cat_title(); ?></h1>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</div>
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
