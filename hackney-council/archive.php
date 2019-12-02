<?php get_header(); ?>

	<main class="lbh-main-wrapper" role="main">
		<section class="lbh-container">
			<h1 class="lbh-heading-h1"><?php  single_term_title(); ?></h1>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>

<?php get_footer(); ?>
