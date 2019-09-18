<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
			<div class="lbhContainer">
				<div class="lbhRow">
					<div class="lbhColumnFull">
						<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

						<?php get_template_part('loop'); ?>

						<?php get_template_part('pagination'); ?>
					</div>
				</div>
			</div>
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
