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

		

			<!-- header -->
			<header class="header clear" role="banner">
				<div class="lbhHeaderBlock">
					<div class="lbhContainer">
						<div class="lbhRow">
							<div class="lbhColumnFull">
								<div class="lbhLHeaderLogoContainer">
									<a href="<?php echo home_url(); ?>">
										<img src="<?php the_field('header_logo', 'option'); ?>" alt="Hackney Council Logo" class="lbhHeaderLogo">
									</a>
								</div>
								<div class="lbhHeaderMenuLinks">
									<ul>
										<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
											<li>
												<a href="<?php echo home_url(); ?>/wp-admin">Dashboard</a>
											</li>
										<?php } ?>
										<li>
											<a href="<?php echo home_url(); ?>/search">Search</a>
										</li>
										<li>
											<a href="<?php echo home_url(); ?>/news">News</a>
										</li>
										<li>
											<a href="<?php echo home_url(); ?>/nav">A to Z</a>
										</li>
										
									</ul>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="headerHackneyLines">
					<div class="headerDarkGreenLine"></div>
					<div class="headerMiddleGreenLine"></div>
					<div class="headerLightGreenLine"></div>
				</div>
			</header>
			<!-- /header -->
<!-- wrapper -->

	<!-- nav -->
	<!-- <nav class="nav" role="navigation">
		<a href="#content">Jump to content</a>
	</nav> -->
	<!-- /nav -->
