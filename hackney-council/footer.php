		<footer class="lbh-footer" role="contentinfo">
			<div class="lbh-container">
				<a href="<?php echo home_url(); ?>" class="lbh-header__title-link">
					<?php if (get_field('header_logo', 'option')): ?>
						<span class="lbh-header__logo lbh-header__logo--svg">
							<?php echo wp_get_attachment_image(get_field('header_logo', 'option'), 'header-logo'); ?>
						</span>
					<?php endif; ?>
					<?php if (get_field('header_logo_fallback', 'option')): ?>
						<span class="lbh-header__logo lbh-header__logo--png">
							<?php echo wp_get_attachment_image(get_field('header_logo_fallback', 'option'), 'header-logo'); ?>
						</span>
					<?php endif; ?>
					<span class="lbh-header__logo-text">
						Hackney
					</span>
					<span class="lbh-header__service-name lbh-header__service-name--short">Intranet</span>
				</a>
				<ul class="lbh-footer__links govuk-list lbh-list">
					<?php foreach(['footer_links_left', 'footer_links_middle', 'footer_links_right'] as $links): ?>
						<div class="lbh-footer__links-group">
							<?php if (have_rows($links, 'option')): ?>
								<?php while(have_rows($links, 'option')): the_row(); ?>
									<li class="lbh-footer__list-item"><a href="<?php the_sub_field('url'); ?>" class="lbh-footer__link"><?php the_sub_field('text'); ?></a></li>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php if ($links === 'footer_links_right'): ?>
								<div class="lbh-footer__links-social">
									<li class="lbh-footer__social-item">
										<a href="https://twitter.com/hackneycouncil" class="lbh-footer__social-link">
											<svg class="lbh-footer__social-icon lbh-footer__social-icon--twitter" width="20px" height="17px" viewBox="0 0 20 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<title>Twitter</title>
												<g id="Symbols" stroke="none" stroke-width="1" fill-rule="nonzero">
													<path d="M20,1.9372028 C19.25625,2.26573427 18.46375,2.4834965 17.6375,2.58923077 C18.4875,2.07818182 19.13625,1.2751049 19.44125,0.307132867 C18.64875,0.782937063 17.77375,1.11902098 16.84125,1.30657343 C16.08875,0.49972028 15.01625,0 13.84625,0 C11.57625,0 9.74875,1.85538462 9.74875,4.12993007 C9.74875,4.4572028 9.77625,4.77188811 9.84375,5.07146853 C6.435,4.90405594 3.41875,3.25888112 1.3925,0.752727273 C1.03875,1.37076923 0.83125,2.07818182 0.83125,2.83972028 C0.83125,4.26965035 1.5625,5.5372028 2.6525,6.27104895 C1.99375,6.25846154 1.3475,6.06587413 0.8,5.76251748 C0.8,5.7751049 0.8,5.79146853 0.8,5.80783217 C0.8,7.81426573 2.22125,9.48083916 4.085,9.86475524 C3.75125,9.95664336 3.3875,10.0006993 3.01,10.0006993 C2.7475,10.0006993 2.4825,9.98559441 2.23375,9.93020979 C2.765,11.5653147 4.2725,12.7674126 6.065,12.8064336 C4.67,13.9053147 2.89875,14.5674126 0.98125,14.5674126 C0.645,14.5674126 0.3225,14.5523077 0,14.5107692 C1.81625,15.6902098 3.96875,16.3636364 6.29,16.3636364 C13.835,16.3636364 17.96,10.0699301 17.96,4.61454545 C17.96,4.43202797 17.95375,4.2558042 17.945,4.08083916 C18.75875,3.4993007 19.4425,2.77300699 20,1.9372028 Z"></path>
												</g>
												<image src="<?php echo get_template_directory_uri() . '/img/social/twitter.png'; ?>" xlink:href="" width="20" height="17"></image>
											</svg>
											<span class="lbh-footer__social-text">Twitter</span>
										</a>
									</li>
									<li class="lbh-footer__social-item">
										<a href="https://www.facebook.com/hackneycouncil" class="lbh-footer__social-link">
											<svg class="lbh-footer__social-icon lbh-footer__social-icon--facebook" width="11px" height="20px" viewBox="0 0 11 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<title>Facebook</title>
												<g stroke="none" stroke-width="1" transform="translate(-10.000000, -5.000000)" fill-rule="nonzero">
													<path d="M20.554729,5.00416133 L17.9240664,5 C14.9686072,5 13.0586597,6.93189975 13.0586597,9.92202699 L13.0586597,12.191411 L10.4136461,12.191411 C10.1850855,12.191411 10,12.3740936 10,12.5994299 L10,15.8875087 C10,16.112845 10.1852966,16.2953195 10.4136461,16.2953195 L13.0586597,16.2953195 L13.0586597,24.5921892 C13.0586597,24.8175255 13.2437452,25 13.4723058,25 L16.9232961,25 C17.1518567,25 17.3369422,24.8173174 17.3369422,24.5921892 L17.3369422,16.2953195 L19.9310462,16.2953195 C20.1596068,16.2953195 20.3446923,16.112845 20.3446923,15.8875087 L20.8444923,12.5994299 C20.8444923,12.4912352 20.8008062,12.3876179 20.7233531,12.3110494 C20.6458999,12.2344808 20.540378,12.191411 20.4306351,12.191411 L17.3369422,12.191411 L17.3369422,10.2676259 C17.3369422,9.34297723 17.5604377,8.87357864 18.782171,8.87357864 L20.5543069,8.87295444 C20.7826564,8.87295444 20.9677419,8.69027184 20.9677419,8.46514362 L20.9677419,5.41197216 C20.9677419,5.18705201 20.7828675,5.00457747 20.554729,5.00416133 Z"></path>
												</g>
												<image src="<?php echo get_template_directory_uri() . '/img/social/facebook.png'; ?>" xlink:href="" width="11" height="20"></image>
											</svg>
											<span class="lbh-footer__social-text">Facebook</span>
										</a>
									</li>
									<li class="lbh-footer__social-item">
										<a href="https://www.youtube.com/user/hackneycouncil" class="lbh-footer__social-link">
											<svg class="lbh-footer__social-icon lbh-footer__social-icon--youtube" width="26px" height="18px" viewBox="0 0 26 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<title>YouTube</title>
												<g stroke="none" stroke-width="1" fill-rule="nonzero">
													<path d="M10.5089286,5.390625 L16.8839286,9.01339286 L10.5089286,12.6361607 L10.5089286,5.390625 Z M25.1875,9.02008929 C25.1875,9.02008929 25.1875,5.02901786 24.6785714,3.11383929 C24.3973214,2.05580357 23.5736607,1.22544643 22.5223214,0.944196429 C20.6272321,0.428571429 13,0.428571429 13,0.428571429 C13,0.428571429 5.37276786,0.428571429 3.47767857,0.944196429 C2.42633929,1.22544643 1.60267857,2.05580357 1.32142857,3.11383929 C0.8125,5.02232143 0.8125,9.02008929 0.8125,9.02008929 C0.8125,9.02008929 0.8125,13.0111607 1.32142857,14.9263393 C1.60267857,15.984375 2.42633929,16.78125 3.47767857,17.0625 C5.37276786,17.5714286 13,17.5714286 13,17.5714286 C13,17.5714286 20.6272321,17.5714286 22.5223214,17.0558036 C23.5736607,16.7745536 24.3973214,15.9776786 24.6785714,14.9196429 C25.1875,13.0111607 25.1875,9.02008929 25.1875,9.02008929 L25.1875,9.02008929 Z"></path>
												</g>
												<image src="<?php echo get_template_directory_uri() . '/img/social/youtube.png'; ?>" xlink:href="" width="26" height="18"></image>
											</svg>
											<span class="lbh-footer__social-text">YouTube</span>
										</a>
									</li>
									<li class="lbh-footer__social-item">
										<a href="https://www.instagram.com/hackneycouncil/" class="lbh-footer__social-link">
											<svg class="lbh-footer__social-icon lbh-footer__social-icon--instagram" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<title>Instagram</title>
												<g stroke="none" stroke-width="1" fill-rule="nonzero">
													<path d="M14.0418922,-3.41060513e-13 L5.95810785,-3.41060513e-13 C2.67279333,-3.41060513e-13 0,2.67279333 0,5.95810785 L0,14.0418922 C0,17.3272067 2.67279333,20 5.95810785,20 L14.0418922,20 C17.3272067,20 20,17.3272067 20,14.0418922 L20,5.95810785 C20,2.67279333 17.3271704,-3.41060513e-13 14.0418922,-3.41060513e-13 Z M17.9880007,14.0418922 C17.9880007,16.2212495 16.2212495,17.9880007 14.0418922,17.9880007 L5.95810785,17.9880007 C3.77875049,17.9880007 2.01199926,16.2212495 2.01199926,14.0418922 L2.01199926,5.95810785 C2.01199926,3.7787142 3.77875049,2.01199926 5.95810785,2.01199926 L14.0418922,2.01199926 C16.2212495,2.01199926 17.9880007,3.7787142 17.9880007,5.95810785 L17.9880007,14.0418922 L17.9880007,14.0418922 Z M10,4.84848485 C7.15944998,4.84848485 4.84848485,7.15945809 4.84848485,9.99998193 C4.84848485,12.8405058 7.15944998,15.1515152 10,15.1515152 C12.84055,15.1515152 15.1515152,12.8405419 15.1515152,9.99998193 C15.1515152,7.15942194 12.84055,4.84848485 10,4.84848485 Z M10,6.85224645 C11.7384742,6.85224645 13.1477606,8.26153782 13.1477606,10.0000181 C13.1477606,11.7384622 11.738438,13.1477897 10,13.1477897 C8.26152584,13.1477897 6.85223942,11.7384983 6.85223942,10.0000181 C6.85223942,8.26153782 8.26156199,6.85224645 10,6.85224645 Z M15.1515152,4.24242424 C15.8209512,4.24242424 16.3636364,4.78510939 16.3636364,5.45454545 C16.3636364,6.12398151 15.8209512,6.66666667 15.1515152,6.66666667 C14.4820791,6.66666667 13.9393939,6.12398151 13.9393939,5.45454545 C13.9393939,4.78510939 14.4820791,4.24242424 15.1515152,4.24242424 Z"></path>
												</g>
												<image src="<?php echo get_template_directory_uri() . '/img/social/instagram.png'; ?>" xlink:href="" width="20" height="20"></image>
											</svg>
											<span class="lbh-footer__social-text">Instagram</span>
										</a>
									</li>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="lbh-footer__bottom">
				<div class="lbh-container">
					<img class="lbh-footer__ogl" src="<?php echo get_template_directory_uri() . '/img/footer-ogl.png' ?>" alt="OGL" />
					<p class="lbh-footer__bottom-text">All content is available under the <a href="http://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/" class="lbh-footer__bottom-link">Open Government Licence v3.0</a>, except where otherwise stated</p>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>
