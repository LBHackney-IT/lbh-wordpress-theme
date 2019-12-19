<?php if (have_posts()): ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php $hero = get_field('hero'); ?>
    <?php if($hero['show_hero']): ?>
      <main class="lbh-main-wrapper" role="main" >
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php include( locate_template( 'component-hero.php', false, false ) ); ?>
          <?php if(!is_front_page()) : ?>
            <div class="lbh-container">
          <?php endif; ?>
    <?php else :?>
      <?php get_template_part('component-phase-banner'); ?>
      <?php get_template_part('component-announcement'); ?>
      <?php get_template_part('component-breadcrumb'); ?>
      <main class="lbh-main-wrapper" role="main" >
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="lbh-container">
            <h1 class="lbh-heading-h1" id="content"><?php the_title(); ?></h1>
            <?php if ( has_post_thumbnail()) : ?>
              <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <?php if (is_singular('post')) : ?>
              <span class="lbh-date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
              <p class="lbh-category"><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', ');  ?></p>        
              <span class="lbh-comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
            <?php endif ?>
          <?php endif; ?>
          <?php // $accordion_counter helps us to make sure that accordion ids are unique ?>
          <?php $accordion_counter = 0; ?>
          <?php if( have_rows('lbh_page_builder') ): ?>
            <?php while ( have_rows('lbh_page_builder') ) : the_row(); ?>
              <?php if( get_row_layout() == 'content' ): ?>
                <?php get_template_part('component-content'); ?>
              <?php elseif( get_row_layout() == 'featured_message' ): ?>
                <?php get_template_part('component-page-announcement'); ?>
              <?php elseif( get_row_layout() == 'accordion' ): ?>
                <?php // $accordion_counter helps us to make sure that accordion ids are unique ?>
                <?php $accordion_counter++; ?>
                <?php include( locate_template( 'component-accordion.php', false, false ) ); ?>
              <?php elseif( get_row_layout() == 'anchor_links' ): ?>
                <?php get_template_part('component-anchor-links'); ?>
              <?php elseif( get_row_layout() == 'iframes' ): ?>
                <?php get_template_part('component-iframe'); ?>
              <?php elseif( get_row_layout() == 'image_block_single' ): ?>
                <?php get_template_part('component-image-landscape'); ?>
              <?php elseif( get_row_layout() == 'image_block_single_portrait' ): ?>
                <?php get_template_part('component-image-portrait'); ?>
              <?php elseif( get_row_layout() == 'image_block_double' ): ?>
                <?php get_template_part('component-image-double'); ?>
              <?php elseif( get_row_layout() == 'image_block_triple' ): ?>
                <?php get_template_part('component-image-triple'); ?>
              <?php elseif( get_row_layout() == 'article_listings' ): ?>
                <?php if(!is_front_page()) : ?>
                  </div>
                <?php endif; ?>
                <?php get_template_part('component-article-listings'); ?>
                <?php if(!is_front_page()) : ?>
                  <div class="lbh-container">
                <?php endif; ?>
              <?php elseif( get_row_layout() == 'promo' ): ?>
                <?php if(!is_front_page()) : ?>
                  </div>
                <?php endif; ?>
                  <?php get_template_part('component-promo'); ?>
                <?php if(!is_front_page()) : ?>
                  <div class="lbh-container">
                <?php endif; ?>
              <?php elseif( get_row_layout() == 'news' ): ?>
                <?php if(!is_front_page()) : ?>
                  </div>
                <?php endif; ?>
                <?php get_template_part('component-news-listings'); ?>
                <?php if(!is_front_page()) : ?>
                  <div class="lbh-container">
                <?php endif; ?>
              <?php elseif( get_row_layout() == 'blocks' ): ?>
                <?php if(!is_front_page()) : ?>
                  </div>
                <?php endif; ?>
                  <?php get_template_part('component-blocks'); ?>
                <?php if(!is_front_page()) : ?>
                  <div class="lbh-container">
                <?php endif; ?>
              <?php endif; ?>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php if(!is_front_page()) : ?>
            <?php if (get_post_type == 'post') : ?>
              <?php comments_template( '', true ); ?>
            <?php endif; ?>
            <?php edit_post_link(); ?>
          <?php endif; ?>
        </div>
        <?php if(is_front_page()) : ?>
          <?php get_template_part('component-social-blocks'); ?>
        <?php endif; ?>
      </article>
    </main>
  <?php endwhile; ?>
<?php else: ?>
  <main class="lbh-main-wrapper" role="main" >
    <article>
      <div class="lbh-container">
        <h2 class="lbh-heading-h2"><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
      </div>
    </article>
  </main>
<?php endif; ?>	

