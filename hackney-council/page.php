<?php get_header(); ?>

	<main role="main" >
		<!-- section -->
		<section>
		<div class="lbhContainer">
		<div class="lbhRow">
			<div class="lbhColumnFull">
			<h1 id="content"><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php //the_content(); ?>
				
				<?php
// check if the flexible content field has rows of data
if( have_rows('lbh_page_builder') ):

     // loop through the rows of data
    while ( have_rows('lbh_page_builder') ) : the_row();

        if( get_row_layout() == 'content' ):

        	the_sub_field('content');

//         elseif( get_row_layout() == 'download' ): 

//         	$file = get_sub_field('file');

        endif;

    endwhile;

else :

    // no layouts found

endif;
				?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
		</div>
			</div>
		</div>
		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
