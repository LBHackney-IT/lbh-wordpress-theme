<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <!-- <link href="<?php //echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php //echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
		<!-- Font awesome: Mo's code, we need LBH credentials to replace this -->
		<script src="https://kit.fontawesome.com/4ac6b92187.js" crossorigin="anonymous"></script>
		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
		});
	
</script>

	</head>
	<body <?php body_class('body--' . get_field('colour_scheme', 'option')); ?>>
		<script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>
		<a class="govuk-skip-link lbh-skip-link" href="#main-content">Skip to main content</a>
		<!-- header -->
		<header class="lbh-header lbh-header--<?php echo get_field('colour_scheme', 'option'); ?> lbh-header--fixed">
			<div class="lbh-header__main">
				<div class="lbh-container lbh-header__wrapper">
					<?php if (is_home()) : ?>
						<h1 class="lbh-header__title">
					<?php else : ?>
						<div class="lbh-header__title">
					<?php endif; ?>
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
					<?php if (is_home()) : ?>
						</h1>
					<?php else : ?>
						</div>
					<?php endif; ?>
					<div class="lbh-header__links">
						<?php if( current_user_can('editor') || current_user_can('administrator') ) :  ?>
							<a class="lbh-header__nav-link" href="<?php echo home_url(); ?>/wp-admin">Dashboard</a>
						<?php endif; ?>
						<a class="lbh-header__nav-link" href="<?php echo home_url(); ?>/news">News</a>
            <button class="lbh-header__menu-link" data-module="lbh-nav-button">
							<span class="lbh-header__menu-link--menu">
								<span class="lbh-header__menu-link-text">Menu</span>
								<svg width="40px" height="25px" viewBox="0 0 40 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="lbh-header__menu-link-icon lbh-header__menu-link-icon--mobile">
									<title>Menu icon</title>
									<g stroke="none" stroke-width="1" transform="translate(5.000000, 0.000000)" fill-rule="nonzero">
										<path d="M1.05559465,3.67346939 L28.5010556,3.67346939 C29.0840737,3.67346939 29.5566502,3.3080102 29.5566502,2.85714286 L29.5566502,0.816326531 C29.5566502,0.365459184 29.0840737,0 28.5010556,0 L1.05559465,0 C0.472576531,0 0,0.365459184 0,0.816326531 L0,2.85714286 C0,3.3080102 0.472576531,3.67346939 1.05559465,3.67346939 Z M1.05559465,11.8367347 L28.5010556,11.8367347 C29.0840737,11.8367347 29.5566502,11.4712755 29.5566502,11.0204082 L29.5566502,8.97959184 C29.5566502,8.52872449 29.0840737,8.16326531 28.5010556,8.16326531 L1.05559465,8.16326531 C0.472576531,8.16326531 0,8.52872449 0,8.97959184 L0,11.0204082 C0,11.4712755 0.472576531,11.8367347 1.05559465,11.8367347 Z M1.05559465,20 L28.5010556,20 C29.0840737,20 29.5566502,19.6345408 29.5566502,19.1836735 L29.5566502,17.1428571 C29.5566502,16.6919898 29.0840737,16.3265306 28.5010556,16.3265306 L1.05559465,16.3265306 C0.472576531,16.3265306 0,16.6919898 0,17.1428571 L0,19.1836735 C0,19.6345408 0.472576531,20 1.05559465,20 Z"></path>
									</g>
									<!-- Fallback PNG image for older browsers.
									The <image> element is a valid SVG element. In SVG, you would specify
									the URL of the image file with the xlink:href – as we don't reference an
									image it has no effect. It's important to include the empty xlink:href
									attribute as this prevents versions of IE which support SVG from
									downloading the fallback image when they don't need to.
									In other browsers <image> is synonymous for the <img> tag and will be
									interpreted as such, displaying the fallback image. -->
									<image src="<?php echo get_template_directory_uri() . '/img/icon-burger-mobile.png'; ?>" xlink:href="" width="30" height="20"></image>
								</svg>
								<svg width="17px" height="15px" viewBox="0 0 17 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="lbh-header__menu-link-icon lbh-header__menu-link-icon--desktop">
									<title>Menu icon</title>
									<g stroke="none" stroke-width="1" fill-rule="nonzero">
											<path d="M0.607142857,2.75510204 L16.3928571,2.75510204 C16.7281897,2.75510204 17,2.48100765 17,2.14285714 L17,0.612244898 C17,0.274094388 16.7281897,0 16.3928571,0 L0.607142857,0 C0.271810268,0 0,0.274094388 0,0.612244898 L0,2.14285714 C0,2.48100765 0.271810268,2.75510204 0.607142857,2.75510204 Z M0.607142857,8.87755102 L16.3928571,8.87755102 C16.7281897,8.87755102 17,8.60345663 17,8.26530612 L17,6.73469388 C17,6.39654337 16.7281897,6.12244898 16.3928571,6.12244898 L0.607142857,6.12244898 C0.271810268,6.12244898 0,6.39654337 0,6.73469388 L0,8.26530612 C0,8.60345663 0.271810268,8.87755102 0.607142857,8.87755102 Z M0.607142857,15 L16.3928571,15 C16.7281897,15 17,14.7259056 17,14.3877551 L17,12.8571429 C17,12.5189923 16.7281897,12.244898 16.3928571,12.244898 L0.607142857,12.244898 C0.271810268,12.244898 0,12.5189923 0,12.8571429 L0,14.3877551 C0,14.7259056 0.271810268,15 0.607142857,15 Z"></path>
									</g>
									<!-- Fallback PNG image for older browsers.
									The <image> element is a valid SVG element. In SVG, you would specify
									the URL of the image file with the xlink:href – as we don't reference an
									image it has no effect. It's important to include the empty xlink:href
									attribute as this prevents versions of IE which support SVG from
									downloading the fallback image when they don't need to.
									In other browsers <image> is synonymous for the <img> tag and will be
									interpreted as such, displaying the fallback image. -->
									<image src="<?php echo get_template_directory_uri() . '/img/icon-burger.png'; ?>" xlink:href="" width="17" height="15"></image>
								</svg>
							</span>
							<span class="lbh-header__menu-link--close">
								<span class="lbh-header__menu-link-text">Close</span>
								<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="lbh-header__menu-link-icon lbh-header__menu-link-icon--mobile">
									<title>Close</title>
									<g stroke="none" stroke-width="1" fill-rule="nonzero">
										<path d="M-1.69536057,13.7881994 L25.5877012,13.7881994 C26.1672695,13.7881994 26.6370497,13.4683015 26.6370497,13.0736431 L26.6370497,11.2872521 C26.6370497,10.8925937 26.1672695,10.5726957 25.5877012,10.5726957 L-1.69536057,10.5726957 C-2.27492888,10.5726957 -2.7447091,10.8925937 -2.7447091,11.2872521 L-2.7447091,13.0736431 C-2.7447091,13.4683015 -2.27492888,13.7881994 -1.69536057,13.7881994 Z" transform="translate(11.946170, 12.180448) rotate(-315.000000) translate(-11.946170, -12.180448) "></path>
										<path d="M-1.71428571,13.6923077 L25.7142857,13.6923077 C26.2969451,13.6923077 26.7692308,13.3555855 26.7692308,12.9401709 L26.7692308,11.0598291 C26.7692308,10.6444145 26.2969451,10.3076923 25.7142857,10.3076923 L-1.71428571,10.3076923 C-2.29694505,10.3076923 -2.76923077,10.6444145 -2.76923077,11.0598291 L-2.76923077,12.9401709 C-2.76923077,13.3555855 -2.29694505,13.6923077 -1.71428571,13.6923077 Z" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-315.000000) translate(-12.000000, -12.000000) "></path>
									</g>
									<!-- Fallback PNG image for older browsers.
									The <image> element is a valid SVG element. In SVG, you would specify
									the URL of the image file with the xlink:href – as we don't reference an
									image it has no effect. It's important to include the empty xlink:href
									attribute as this prevents versions of IE which support SVG from
									downloading the fallback image when they don't need to.
									In other browsers <image> is synonymous for the <img> tag and will be
									interpreted as such, displaying the fallback image. -->
									<image src="<?php echo get_template_directory_uri() . '/img/icon-close-mobile.png'; ?>" xlink:href="" width="24" height="24"></image>
								</svg>
								<svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="lbh-header__menu-link-icon lbh-header__menu-link-icon--desktop">
									<title>Close</title>
									<g stroke="none" stroke-width="1" fill-rule="nonzero">
										<path d="M-1.40559333,9.26593871 L16.7120649,9.26593871 C17.0969345,9.26593871 17.4088979,9.04022945 17.4088979,8.76177173 L17.4088979,7.50135429 C17.4088979,7.22289656 17.0969345,6.99718731 16.7120649,6.99718731 L-1.40559333,6.99718731 C-1.79046291,6.99718731 -2.10242634,7.22289656 -2.10242634,7.50135429 L-2.10242634,8.76177173 C-2.10242634,9.04022945 -1.79046291,9.26593871 -1.40559333,9.26593871 Z" id="Shape" transform="translate(7.653236, 8.131563) rotate(-315.000000) translate(-7.653236, -8.131563) "></path>
                		<path d="M-1.37741188,9.40687462 L16.8368738,9.40687462 C17.2237961,9.40687462 17.5374233,9.16929473 17.5374233,8.8761922 L17.5374233,7.54948613 C17.5374233,7.2563836 17.2237961,7.01880371 16.8368738,7.01880371 L-1.37741188,7.01880371 C-1.7643341,7.01880371 -2.07796133,7.2563836 -2.07796133,7.54948613 L-2.07796133,8.8761922 C-2.07796133,9.16929473 -1.7643341,9.40687462 -1.37741188,9.40687462 Z" id="Shape-Copy" transform="translate(7.729731, 8.212839) scale(-1, 1) rotate(-315.000000) translate(-7.729731, -8.212839) "></path>
									</g>
									<!-- Fallback PNG image for older browsers.
									The <image> element is a valid SVG element. In SVG, you would specify
									the URL of the image file with the xlink:href – as we don't reference an
									image it has no effect. It's important to include the empty xlink:href
									attribute as this prevents versions of IE which support SVG from
									downloading the fallback image when they don't need to.
									In other browsers <image> is synonymous for the <img> tag and will be
									interpreted as such, displaying the fallback image. -->
									<image src="<?php echo get_template_directory_uri() . '/img/icon-close.png'; ?>" xlink:href="" width="16" height="16"></image>
								</svg>
							</span>
						</button>
						<a class="lbh-header__nav-link lbh-header__search" href="<?php echo home_url(); ?>/search">
							<span class="lbh-header__search-text">Search</span>
							<svg class="lbh-header__search-icon" width="25px" height="25px" viewBox="0 0 25 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<title>Search</title>
								<g transform="translate(-8.000000, -7.000000)" stroke="none" stroke-width="1" fill-rule="nonzero">
										<path d="M11.0137037,10.0137037 C15.0319752,5.99543211 21.5616665,5.99543211 25.579938,10.0137037 C29.2214966,13.6552623 29.5982096,19.1803856 26.8356479,23.1986572 L32.4863423,28.8493516 C34.1187651,30.4817744 31.4817744,33.1187651 29.8493516,31.4863423 L24.1986572,25.8356479 C20.1803856,28.5982096 14.6552623,28.2214966 11.0137037,24.579938 C6.99543211,20.5616665 6.99543211,14.0319752 11.0137037,10.0137037 Z M13.2739814,12.2739814 C10.5114197,15.0365431 10.5114197,19.5570986 13.2739814,22.3196603 C16.0365431,25.082222 20.5570986,25.082222 23.3196603,22.3196603 C26.082222,19.5570986 26.082222,15.0365431 23.3196603,12.2739814 C20.5570986,9.51141972 16.0365431,9.51141972 13.2739814,12.2739814 Z"></path>
								</g>
								<!-- Fallback PNG image for older browsers.
								The <image> element is a valid SVG element. In SVG, you would specify
								the URL of the image file with the xlink:href – as we don't reference an
								image it has no effect. It's important to include the empty xlink:href
								attribute as this prevents versions of IE which support SVG from
								downloading the fallback image when they don't need to.
								In other browsers <image> is synonymous for the <img> tag and will be
								interpreted as such, displaying the fallback image. -->
								<image src="<?php echo get_template_directory_uri() . '/img/icon-search.png'; ?>" xlink:href="" width="25" height="25"></image>
							</svg>
						</a>
          </div>
				</div>
			</div>
		</header>
		<!-- /header -->
		<!-- nav -->	
		<?php $terms = get_terms([
			'taxonomy' => 'service',
			'parent' => 0,
			'hide_empty' => true,
		]); ?>

		<?php
			$hierarchy = [];
			if(is_page()) {
				global $post;
				$service = get_the_terms( $post->ID, 'service')[0];
				if ($service->name !== 'Pages') {
					$hierarchy = get_term_hierarchy($service);
				}
			}
		?>
		<?php if($terms): ?>
			<nav class="lbh-nav" data-module="lbh-nav">
				<div class="lbh-container">
					<div class="govuk-breadcrumbs lbh-breadcrumbs">
						<ol class="govuk-breadcrumbs__list"><li class="govuk-breadcrumbs__list-item">
							<button class="govuk-breadcrumbs__link">Services</button>
						</li></ol>
					</div>
					<div class="lbh-nav__wrapper" data-module="lbh-nav-container"><ul class="lbh-nav__list lbh-nav__list--level-1" data-level="1" tabindex="-1">
						<h2 class="lbh-heading-h5 lbh-nav__list-title">Services</h2>
						<?php foreach($terms as $term) :?>
							<?php if($term->name !== 'Pages'): ?>
								<?php echo render_nav_term($term, 1, $hierarchy); ?>
							<?php endif; ?>
						<?php endforeach; ?>	
					</ul></div>
				</div>
			</nav>
		<?php endif; ?>
		<!-- /nav -->
