<?php get_header(); ?>
<?php get_template_part('component-announcement'); ?>
<?php get_template_part('component-breadcrumb'); ?>
<main class="lbh-main-wrapper" role="main">
	<div class="lbh-container">
		<article id="post-404">
			<h1 class="lbh-heading-h1"><?php _e( 'Page not found', 'html5blank' ); ?></h1>
			<p class="lbh-body-l"><a href="<?php echo home_url(); ?>" class="lbh-link"><?php _e( 'Return home?', 'html5blank' ); ?></a></p>
		</article>
	</div>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
