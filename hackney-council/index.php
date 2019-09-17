<?php //get_header(); ?>



<?php //get_footer(); ?>
<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
			<div class="lbhContainer">
				<div class="lbhRow">
					<div class="lbhColumnFull">

						<h1><?php esc_html_e( 'Latest Posts', 'html5blank' ); ?></h1>

						<?php get_template_part( 'loop' ); ?>

						<?php get_template_part( 'pagination' ); ?>

					</div>
				</div>
			</div>
		<!-- /section -->
	</main>


<?php get_footer(); ?>