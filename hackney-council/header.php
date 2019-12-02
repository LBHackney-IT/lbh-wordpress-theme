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
	<body <?php body_class(); ?>>
		<script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>
		<a class="govuk-skip-link lbh-skip-link" href="#main-content">Skip to main content</a>
		<!-- header -->
		<header class="lbh-header lbh-header--purple lbh-header--fixed">
			<div class="lbh-header__main">
				<div class="lbh-container lbh-header__wrapper lbh-header__wrapper--stacked">
					<div class="lbh-header__title">
						<a href="<?php echo home_url(); ?>" class="lbh-header__title-link">
							<?php if (get_field('header_logo', 'option')): ?>
								<span class="lbh-header__logo lbh-header__logo--svg">
									<?php echo wp_get_attachment_image(get_field('header_logo', 'option'), 'header_logo'); ?>
								</span>
							<?php endif; ?>
							<?php if (get_field('header_logo_fallback', 'option')): ?>
								<span class="lbh-header__logo lbh-header__logo--png">
									<?php echo wp_get_attachment_image(get_field('header_logo_fallback', 'option'), 'header_logo'); ?>
								</span>
							<?php endif; ?>
							<span class="lbh-header__logo-text">
								Hackney
							</span>
							<span class="lbh-header__service-name lbh-header__service-name--short">Intranet</span>
						</a>
					</div>
					<nav class="lbh-header__nav">
						<a class="lbh-header__nav-link" href="<?php echo home_url(); ?>/nav">A to Z</a>
						<a class="lbh-header__nav-link" href="<?php echo home_url(); ?>/news">News</a>
						<a class="lbh-header__nav-link" href="<?php echo home_url(); ?>/search">Search</a>
						<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
							<a class="lbh-header__nav-link lbh-header__nav-link--dashboard" href="<?php echo home_url(); ?>/wp-admin">Dashboard</a>
						<?php } ?>
					</nav>
				</div>
			</div>
		</header>
		<!-- /header -->
