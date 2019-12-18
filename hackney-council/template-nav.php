<?php /* Template Name: Nav Template */ get_header(); ?>

<main class="lbh-main-wrapper" role="main" >
	<!-- This is a horrible hack to make the anchor link to the right place (because of the fixed header) 
	but it's what the TinyMCE plugin is doing for anchors across the rest of the site anyway -->
	<a id="main-content"></a>
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
