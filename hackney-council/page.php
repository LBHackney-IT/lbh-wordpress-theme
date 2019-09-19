<?php get_header(); ?>

	<main role="main" >
		<!-- section -->
		<section>
			<div class="lbhContainer">
				<div class="lbhRow">
					<div class="lbhColumnFull">
						<div  class="singlePage">
							<div  class="pageContent">
								<h1 id="content"><?php the_title(); ?></h1>
								<?php if (have_posts()): while (have_posts()) : the_post(); ?>

									<!-- article -->
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

											<?php //the_content(); ?>
											
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
				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
