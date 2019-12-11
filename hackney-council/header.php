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
				<div class="lbh-container lbh-header__wrapper lbh-header__wrapper--stacked">
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
		<?php if(!is_front_page()) : ?>
			<!-- sitewide announcement -->
			<?php if(get_field('show_sitewide_msg', 'option')) : ?>
				<section class="lbh-announcement lbh-announcement--site">
					<div class="lbh-container">
						<?php if (get_field('sitewide_message_title', 'option')) : ?>
							<h3 class="lbh-announcement__title"><?php the_field('sitewide_message_title', 'option'); ?></h3>
						<?php endif; ?>
						<div class="lbh-announcement__content"><?php the_field('sitewide_message', 'option'); ?></div>
					</div>
				</section>
			<?php endif; ?>
			
			<?php if (is_page()) : ?>
				<!-- sectionwide announcements -->
				<?php global $post; ?>
				<?php  $terms = get_the_terms( $post->ID, 'service' );
				if ($terms) {
					$announcement_sections = [];
					// check if the repeater field has rows of data
					if( have_rows('sectionwide_announcements', 'option') ):
						// loop through the rows of data
						while ( have_rows('sectionwide_announcements', 'option') ) : the_row();
							$message = new stdClass();
							$message->id = get_sub_field('sections', 'option');
							$message->content = get_sub_field('announcement', 'option');
							array_push($announcement_sections, $message);
						endwhile;
					endif;
					foreach($terms as $term) {
						foreach ($announcement_sections as $section) { 
							if (in_array($term->term_id, $section->id)) { ?>
								<section class="lbh-announcement ">
									<div class="lbh-container">
										<div class="lbh-announcement__content"><?php echo $section->content; ?></div>
									</div>
								</section>
						<?php }
						}
					} 
				} ?>
				
				<!-- breadcrumbs -->
				<?php $breadcrumbs = []; ?>
				<?php $term = get_the_terms($post->ID, 'service')[0]; ?>
				<?php if ($term->name !== 'Pages'): ?>
					<?php array_unshift($breadcrumbs, $term); ?>
					<?php while(!empty($term->parent)): ?>
						<?php $term = get_term_by('id', $term->parent, 'service'); ?>
						<?php array_unshift($breadcrumbs, $term); ?>
					<?php endwhile; ?>
					<div class="govuk-breadcrumbs lbh-breadcrumbs lbh-container">
						<ol class="govuk-breadcrumbs__list">
							<li class="govuk-breadcrumbs__list-item">
								<a class="govuk-breadcrumbs__link" href="<?php echo home_url(); ?>">Home</a>
							</li>
							<?php foreach($breadcrumbs as $breadcrumb) { ?>
								<li class="govuk-breadcrumbs__list-item">
									<a class="govuk-breadcrumbs__link" href="<?php echo get_term_link($breadcrumb); ?>"><?php echo $breadcrumb->name; ?></a>
								</li>
							<?php } ?>
						</ol>
					</div>
				<?php endif; ?>
			<?php elseif (is_single()): ?>
				<div class="govuk-breadcrumbs lbh-breadcrumbs lbh-container">
					<ol class="govuk-breadcrumbs__list">
						<li class="govuk-breadcrumbs__list-item">
							<a class="govuk-breadcrumbs__link" href="<?php echo home_url(); ?>">Home</a>
						</li>
						<li class="govuk-breadcrumbs__list-item">
							<a class="govuk-breadcrumbs__link" href="<?php echo get_post_type_archive_link('post'); ?>">News</a>
						</li>
					</ol>
				</div>
			<?php elseif (is_archive()): ?>
				<div class="govuk-breadcrumbs lbh-breadcrumbs lbh-container">
					<ol class="govuk-breadcrumbs__list">
						<li class="govuk-breadcrumbs__list-item">
							<a class="govuk-breadcrumbs__link" href="<?php echo home_url(); ?>">Home</a>
						</li>
					</ol>
				</div>
			<?php endif; ?>
		<?php endif; ?>
