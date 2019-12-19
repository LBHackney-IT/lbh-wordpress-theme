<?php get_header(); ?>
	<?php get_template_part('component-phase-banner'); ?>
	<?php get_template_part('component-announcement'); ?>
	<?php get_template_part('component-breadcrumb'); ?>
	<main class="lbh-main-wrapper" role="main" >
    <!-- This is a horrible hack to make the anchor link to the right place (because of the fixed header) 
    but it's what the TinyMCE plugin is doing for anchors across the rest of the site anyway -->
    <a id="main-content"></a>
		<div class="lbh-container">
			<h1 class="lbh-heading-h1"><?php esc_html_e( 'Latest Posts', 'html5blank' ); ?></h1>
			<?php get_template_part( 'loop' ); ?>
			<?php get_template_part( 'pagination' ); ?>
		</div>
	</main>
<?php get_footer(); ?>
