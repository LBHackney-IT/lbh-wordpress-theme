<?php /* Template Name: Nav Template */ get_header(); ?>

<main class="lbh-main-wrapper" role="main">
	<div class="lbh-container">
		<h1 class="lbh-heading-h1" id="content">A to Z</h1>
		<ul class="lbh-list lbh-nav">
			<?php
			wp_list_pages( array(
				'title_li'    => '',
				'show_date'   => 'modified',
				'date_format' => $date_format
			) );
			?>
		</ul>
	</div>
</main>

<?php get_footer(); ?>
