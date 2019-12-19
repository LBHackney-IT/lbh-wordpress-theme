<?php /* Template Name: Demo Page Template */ get_header(); ?>
	<?php get_template_part('component-phase-banner'); ?>
	<?php get_template_part('component-announcement'); ?>
	<?php get_template_part('component-breadcrumb'); ?>
	<main class="lbh-main-wrapper" role="main">
		<div class="lbh-container">
			<h1 class="lbh-heading-h1"><?php the_title(); ?></h1>
			<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('lbh-content'); ?>>
						<?php the_content(); ?>
						<?php comments_template( '', true ); // Remove if you don't want comments ?>
						<?php edit_post_link(); ?>
					</article>
				<?php endwhile; ?>
			<?php else: ?>
				<article class="lbh-content">
					<h2 class="lbh-heading-h2"><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				</article>
			<?php endif; ?>
		</div>
	</main>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
