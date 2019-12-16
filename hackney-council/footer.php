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
									<li>
										<a href="https://twitter.com/hackneycouncil">
											<span class="lbh-footer__social-text">Twitter</span>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/hackneycouncil">
											<span class="lbh-footer__social-text">Facebook</span>
										</a>
									</li>
									<li>
										<a href="https://www.youtube.com/user/hackneycouncil">
											<span class="lbh-footer__social-text">YouTube</span>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/hackneycouncil/">
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
