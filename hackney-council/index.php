<?php get_header(); ?>

<?php get_template_part('component-announcement'); ?>
<?php get_template_part('component-breadcrumb'); ?>
<main class="lbh-main-wrapper" role="main" aria-label="Content">
	<div class="lbh-container">
		<h1 class="lbh-heading-h1"><?php esc_html_e( 'Latest Posts', 'html5blank' ); ?></h1>
		<?php get_template_part( 'loop' ); ?>
		<?php get_template_part( 'pagination' ); ?>
	</div>
</main>


<?php get_footer(); ?>
