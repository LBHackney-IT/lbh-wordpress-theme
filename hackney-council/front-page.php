<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
			<div class="heroSection" blur="0" style="background-image:url(<?php the_field('hero_banner', 'option'); ?>)" alt="Hackney Town Hall">
				<div class="whiteBand"></div>
				<div class="ctaBar">
					<div class="lbhContainer">
						<div class="lbhRow">
							<ul class="socialCtaBar">
								<li >
									<a 
									href="https://drive.google.com/"
									style="
										background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/drive.png');
										background-size: contain;
										background-repeat: no-repeat;
										background-position: center;
									"
									target="_blank"
									alt="Google Drive"
									>
									</a>
								</li>
								<li >
									<a 
									href="https://plus.google.com/"
									style="
										background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/official-google-plus-logo-900x900.jpg');
										background-size: contain;
										background-repeat: no-repeat;
										background-position: center;
									"									
									target="_blank"
									alt="G+ Communities"
									>
									</a>
								</li>
								<li >
									<a 
									href="https://contacts.google.com/"
									style="
										background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/google-plus-profile-2.png');
										background-size: contain;
										background-repeat: no-repeat;
										background-position: center;
									"									
									target="_blank"
									alt="Google Contacts"
									>
									</a>
								</li>
								<li >
									<a 
									href="https://mail.google.com/"
									style="
										background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/gmail.png');
										background-size: contain;
										background-repeat: no-repeat;
										background-position: center;
									"									
									target="_blank"
									alt="Gmail"
									>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
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
			<div class="headlinesSection">
				<div class="lbhContainer">
					<?php if (get_field('headlines_title', 'option')): ?>
						<div class="lbhRow">
							<div class="lbhColumnFull">
								<h2><?php the_field('headlines_title', 'option'); ?></h2>
							</div>
						</div>
					<?php endif; ?>
					<div class="lbhRow">
						<ul class="headlineCards">
						<?php

						// check if the repeater field has rows of data
						if( have_rows('headline_cards', 'option') ):

							// loop through the rows of data
							while ( have_rows('headline_cards', 'option') ) : the_row();

								?>
										<li class="lbhColumnOneThird">
											<a href="<?php the_sub_field('cta_url'); ?>" class="card">
												<div class="cardImage"  style="background-image:url(<?php the_sub_field('image'); ?>)"></div>
												<div class="cardTitle">
													<?php the_sub_field('title'); ?>
												</div>
												<div class="cardExcerpt">
													<?php the_sub_field('description'); ?>
												</div>
												<hr>
												<div class="cardCta">
													<?php the_sub_field('cta_url_text'); ?>
													<i class="fas fa-arrow-right"></i>
													<!-- <FontAwesomeIcon icon="faArrowRight} /> -->
												</div>
											</a>
										</li>
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
			<div class="mayorSection">
				<div class="lbhHomeContainer">
					<div class="lbhRow">
					<?php

					// check if the repeater field has rows of data
					if( have_rows('mayor_intro', 'options') ):

					// loop through the rows of data
					while ( have_rows('mayor_intro', 'options') ) : the_row();

					?>
						<div class="mayorBlock">
							<div class="lbhColumnHalf">
								<div class="mayorImage">
									<?php echo wp_get_attachment_image(attachment_url_to_postid(get_sub_field('icon')), 'large') ?>
								</div>
							</div>
							<div class="lbhColumnHalf">
								<h2><?php the_sub_field('title'); ?></h2>
								<div class="mayorMessage">
									<?php the_sub_field('description'); ?>
								</div>
								<a href="<?php the_sub_field('cta_url'); ?>" class="mayorReadmore">
									<button class="calltoaction">
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
			<div class="councilNewsSection">
				<div class="lbhHomeContainer">
					<?php if (get_field('news_section_title', 'option')): ?>
						<div class="lbhRow">
							<div class="lbhColumnFull">
								<h2><?php the_field('news_section_title', 'option'); ?></h2>
							</div>
						</div>
					<?php endif; ?>
					<div class="lbhRow">
							<?php

								// check if the repeater field has rows of data
								if( have_rows('news_blocks', 'options') ):

								// loop through the rows of data
								while ( have_rows('news_blocks', 'options') ) : the_row();

							?>
								<div class="lbhColumnOneFourth">
									<a href="<?php the_sub_field('cta_url'); ?>" class="newsItem">
										<div class="newsItemInfo">
											<div class="newsFeaturedImage" style="background-image:url(<?php the_sub_field('image'); ?>)" alt="<?php the_sub_field('hero_banner', 'option'); ?>"  ></div>
											<div class="newsItemContent">
												<h3><?php the_sub_field('title'); ?></h3>
												<div class="excerpt">
													<?php the_sub_field('description'); ?>
												</div>
												<div class="date">
												<i class="fas fa-calendar-alt"></i>
													<?php the_sub_field('cta_url_text'); ?>
													<div class="readMore">
														<i class="fas fa-arrow-right"></i>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php

								endwhile;

								else :

								// no rows found

								endif;

							?>
						<div class="lbhColumnFull">
							<a href="https://intranet.hackney.gov.uk/news">
								<button class="callToAction" >Read all news about Hackney Council</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="findOutMoreSection">
				<div class="lbhHomeContainer">
					<?php if (get_field('find_out_more_title', 'option')): ?>
						<div class="lbhRow">
							<div class="lbhColumnFull">
								<h2><?php the_field('find_out_more_title', 'option'); ?></h2>
							</div>
						</div>
					<?php endif; ?>
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
			<!-- Below section is not editable in CMS -->
			<div class="socialMediaSection">
				<div class="lbhHomeContainer">
					<div class="lbhRow">
						<div class="lbhColumnFull">
							<h2>Follow us</h2>
						</div>
					</div>
					<div class="lbhRow">
						<div class="lbhColumnOneThird">
							<div class="facebook">
								<div class="hackneyBlackLogo">
									<img src="https://web-content-api.hackney.gov.uk/wp-content/uploads/Screen-Shot-2019-09-26-at-12.20.21.png"/>
									<div>@hackneycouncil</div>
								</div>
								<span>
									<i class="fab fa-google-plus"></i>
								</span>
									<!-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhackneycouncil%2F&tabs=timeline&&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=250143628337727" width="720" height="500"  scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
									<!-- <iframe width="560" height="530" src="https://www.plus.google.com/" frameborder="0"></iframe> -->
									<a href="https://plus.google.com/communities/111335090618317296762" target="_blank">
										<img src="https://intranet.hackney.gov.uk/wp-content/uploads/image-1.png" style="margin-top: 35px;"/>
									</a>
							</div>
						</div>
						<div class="lbhColumnOneThird">
							<div class="youtube">
								<div class="hackneyBlackLogo">
									<img src="https://web-content-api.hackney.gov.uk/wp-content/uploads/Screen-Shot-2019-09-26-at-12.20.21.png"/>
									<div>hackneycouncil</div>
								</div>
								<span>
									<i class="fab fa-youtube"></i>
								</span>

								<iframe width="560" height="500" src="https://www.youtube.com/embed/videoseries?list=PLwZ-4_VwwqbZXHuHJMIazWY9QVVevuZT3" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
						<div class="lbhColumnOneThird">
							<div class="twitter">
								<div class="hackneyBlackLogo">
									<img src="https://web-content-api.hackney.gov.uk/wp-content/uploads/Screen-Shot-2019-09-26-at-12.20.21.png"/>
									<div>@hackneycouncil</div>
								</div>
								<span>
									<i class="fab fa-twitter"></i>
								</span>
								<a class="twitter-timeline" height="500" href="https://twitter.com/hackneycouncil?ref_src=twsrc%5Etfw" style="margin-top:35px">Tweets by hackneycouncil</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
