<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>
	<div class="lbhContainer">
		<div class="lbhRow">
			<div class="lbhColumnFull">
				<div  class="singlePage">
						<div  class="pageContent">
								<?php if (have_posts()): while (have_posts()) : the_post(); ?>

									<!-- article -->
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

										<!-- post thumbnail -->
										<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_post_thumbnail(); // Fullsize image for the single post ?>
											</a>
										<?php endif; ?>
										<!-- /post thumbnail -->

										<!-- post title -->
										<h1>
											<?php the_title(); ?>
										</h1>
										<!-- /post title -->

										<!-- post details -->
										<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
										<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>
										<!-- <span class="author"><?php //_e( 'Published by', 'html5blank' ); ?> <?php //the_author_posts_link(); ?></span>   -->
										
										<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
										<!-- /post details -->

										<?php //the_content(); // Dynamic Content ?>
										<?php
										// check if the flexible content field has rows of data
										if( have_rows('lbh_page_builder') ):

											// loop through the rows of data
											while ( have_rows('lbh_page_builder') ) : the_row(); ?>

												<?php if( get_row_layout() == 'content' ): ?>

													<div class="wpContent"><?php the_sub_field('content'); ?></div>

												<?php elseif( get_row_layout() == 'featured_message' ): ?>

													<div class="wpFeaturedMsg"><?php the_sub_field('featured_message'); ?></div>

												<?php elseif( get_row_layout() == 'accordion' ): ?>
													<div id="accordion" class="accordion-container">
													
														<?php
														// check if the repeater field has rows of data
														if( have_rows('accordions') ):

															// loop through the rows of data
															while ( have_rows('accordions') ) : the_row();
																
																?>
																	<h4 class="article-title"><?php the_sub_field('accordion_title'); ?></h4>
																	<div class="accordion-content">
																		<p><?php the_sub_field('accordion_content'); ?></p>
																	</div>
																<?php

															endwhile;

														else :

															// no rows found

														endif;

													?>
													</div><!--/#accordion-->
													

												<?php elseif( get_row_layout() == 'anchor_links' ): ?>
													<div class="wpAnchorLinks">
														<h5>On this page:</h5>
														<ul>
														<?php
															// check if the repeater field has rows of data
															if( have_rows('anchor_links') ):

																// loop through the rows of data
																while ( have_rows('anchor_links') ) : the_row(); 
																?>
																	<li>
																		<a href="<?php the_sub_field('anchor_link'); ?>"><?php the_sub_field('anchor_title'); ?></a>
																	</li>

																<?php 
																endwhile;

															else :

																// no rows found

															endif;

														?>
														</ul>
													</div>

												<?php elseif( get_row_layout() == 'iframes' ): ?>
													<div id="lbhiframe" className="wpIframes">
														<?php the_sub_field('iframe'); ?>
													</div>
												<?php elseif( get_row_layout() == 'image_block_single' ): ?>
													<div class="imageBlockContainer">
														<div  class="wpSingleImage" style="background-image: url(<?php the_sub_field('image_one'); ?>)">
														</div>
													</div>
												<?php elseif( get_row_layout() == 'image_block_single_portrait' ): ?>
													<div class="imageBlockContainer">
														<div  class="wpDoubleImageLeft" style="background-image: url(<?php the_sub_field('image_one'); ?>)">
															<!-- <span><?php //the_sub_field('image_one'); ?></span> -->
														</div>
														<div  class="wpDoubleImageLeft">
															<!-- <span><?php //the_sub_field('image_one'); ?></span> -->
														</div>
													</div>
												<?php elseif( get_row_layout() == 'image_block_double' ): ?>
													<div class="imageBlockContainer">
														<div  class="wpDoubleImageLeft" style="background-image: url(<?php the_sub_field('image_one'); ?>)">
															<!-- <span><?php //the_sub_field('image_one'); ?></span> -->
														</div>
														<div  class="wpDoubleImageRight" style="background-image: url(<?php the_sub_field('image_two'); ?>)">
															<!-- <span><?php //the_sub_field('image_one'); ?></span> -->
														</div>
													</div>
												<?php elseif( get_row_layout() == 'image_block_triple' ): ?>
													<div class="imageBlockContainer">
														<div  class="wpTripleImageLeft" style="background-image: url(<?php the_sub_field('image_one'); ?>)">
															<!-- <span><?php //the_sub_field('image_one'); ?></span> -->
														</div>
														<div  class="wpTripleImageMiddle" style="background-image: url(<?php the_sub_field('image_two'); ?>)">
															<!-- <span><?php //the_sub_field('image_one'); ?></span> -->
														</div>
														<div  class="wpTripleImageRight" style="background-image: url(<?php the_sub_field('image_three'); ?>)">
															<!-- <span><?php //the_sub_field('image_one'); ?></span> -->
														</div>
													</div>
												<?php //elseif( get_row_layout() == 'embed_external_script' ): ?>
												
													<?php //the_sub_field('header_script'); ?>
													<?php //the_sub_field('body_script'); ?>

												<?php endif;

											endwhile;

										else :

											// no layouts found

										endif;
									?>

										<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>



										<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

										<?php comments_template(); ?>

									</article>
									<!-- /article -->

								<?php endwhile; ?>

								<?php else: ?>

									<!-- article -->
									<article>

										<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

									</article>
									<!-- /article -->

								<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
