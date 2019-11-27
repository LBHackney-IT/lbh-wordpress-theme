<?php /* Template Name: Nav Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section >
		<div class="lbhContainer">
		<div class="lbhRow">
			<div class="lbhColumnFull">
			<h1 id="content">A to Z ...</h1>
			<ul>
				<?php
				wp_list_pages( array(
					'title_li'    => '',
					// 'child_of'    => $post->ID,
					'show_date'   => 'modified',
					'date_format' => $date_format
				) );
				?>
			</ul>
			<hr>
		<?php //html5blank_nav(); ?>
		</div>
			</div>
		</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
