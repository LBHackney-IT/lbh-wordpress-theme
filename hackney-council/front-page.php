<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
			<div class="heroSection" blur="0" style="background-image:url(<?php the_field('hero_banner', 'option'); ?>)" alt="Hackney Town Hall">
				<div class="opacLayer"></div>
				<div class="lbhContainer" >
					<div class="lbhRow">
						<div class="lbhColumnTwoThirds">
							<div class="copySectionOne">
								<h1><?php the_field('hero_title', 'option'); ?></h1>
								<div>
									<?php the_field('hero_intro_text', 'option'); ?>
								</div>
							</div>
						</div>
						<div class="lbhColumnOneThird">
							<div class="popularTasks">
								<div>
									<h3><?php the_field('popular_tasks_title', 'option'); ?></h3>
										<ul>
											<?php

												// check if the repeater field has rows of data
												if( have_rows('popular_tasks', 'option') ):

													// loop through the rows of data
													while ( have_rows('popular_tasks', 'option') ) : the_row();
													
														// display a sub field value
														// the_sub_field('sub_field_name');
														?>
															<li><a href="<?php the_sub_field('cta_url'); ?>"><?php the_sub_field('cta_url_text'); ?></a></li>
														<?php

													endwhile;

												else :

													// no rows found

												endif;

											?>
										</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="findOutMoreSection">
				<div class="lbhHomeContainer">
					<div class="lbhRow">
						<div class="lbhColumnFull">
							<h2>Quick links</h2>
						</div>
					</div>
					<div class="lbhRow">
						<?php

						// check if the repeater field has rows of data
						if( have_rows('find_out_more_cards', 'option') ):

							// loop through the rows of data
							while ( have_rows('find_out_more_cards', 'option') ) : the_row();

								// display a sub field value
								// the_sub_field('sub_field_name');
								?>
									<div class="lbhColumnOneThird">
										<div class="findOutMoreCard" style="background-image:'url(<?php the_sub_field('icon'); ?>)">
											<h3><?php the_sub_field('title'); ?></h3>
											<div class="content">
												<p>
													<?php the_sub_field('description'); ?>
												</p>
											</div>
											<a href="<?php the_sub_field('cta_url'); ?>" >
												<button class="calltoactionInverted">
												<?php the_sub_field('cta_url_text'); ?>
												</button>
											</a>
										</div>
									</div>

								<?php

							endwhile;

						else :

							// no rows found

						endif;

						?>
				
					</div>
				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
