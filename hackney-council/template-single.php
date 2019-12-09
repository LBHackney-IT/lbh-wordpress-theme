<main class="lbh-main-wrapper" role="main" >
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  	<?php if (have_posts()): ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php if( have_rows('hero') ): ?>
          <?php while( have_rows('hero') ): the_row(); ?>
            <?php get_template_part('component-hero'); ?>
          <?php endwhile; ?>
        <?php else :?>
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
          </div>
        <?php endif; ?>
        <?php // $accordion_counter helps us to make sure that accordion ids are unique ?>
        <?php $accordion_counter = 0; ?>
        <?php if( have_rows('lbh_page_builder') ): ?>
          <?php while ( have_rows('lbh_page_builder') ) : the_row(); ?>
            <?php if( get_row_layout() == 'content' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-content'); ?>
              </div>
            <?php elseif( get_row_layout() == 'featured_message' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-page-announcement'); ?>
              </div>
            <?php elseif( get_row_layout() == 'accordion' ): ?>
              <?php // $accordion_counter helps us to make sure that accordion ids are unique ?>
              <?php $accordion_counter++; ?>
              <div class="lbh-container">
                <?php include( locate_template( 'component-accordion.php', false, false ) ); ?>
              </div>
            <?php elseif( get_row_layout() == 'anchor_links' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-anchor-links'); ?>
              </div>
            <?php elseif( get_row_layout() == 'iframes' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-iframe'); ?>
              </div>
            <?php elseif( get_row_layout() == 'image_block_single' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-image-landscape'); ?>
              </div>
            <?php elseif( get_row_layout() == 'image_block_single_portrait' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-image-portrait'); ?>
              </div>
            <?php elseif( get_row_layout() == 'image_block_double' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-image-double'); ?>
              </div>
            <?php elseif( get_row_layout() == 'image_block_triple' ): ?>
              <div class="lbh-container">
                <?php get_template_part('component-image-triple'); ?>
              </div>
            <?php elseif( get_row_layout() == 'article_listings' ): ?>
              <?php get_template_part('component-article-listings'); ?>
            <?php elseif( get_row_layout() == 'promo' ): ?>
              <?php get_template_part('component-promo'); ?>
            <?php elseif( get_row_layout() == 'news' ): ?>
              <?php get_template_part('component-news-listings'); ?>
            <?php elseif( get_row_layout() == 'blocks' ): ?>
              <?php get_template_part('component-blocks'); ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php if(is_front_page()) : ?>
          <?php get_template_part('component-social-blocks'); ?>
        <?php endif; ?>
        <?php if (get_post_type == 'post') : ?>
          <?php comments_template( '', true ); ?>
        <?php endif; ?>
        <?php edit_post_link(); ?>
      </article>
    <?php endwhile; ?>
  <?php else: ?>
    <article>
      <div class="lbh-container">
        <h2 class="lbh-heading-h2"><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
      </div>
    </article>
  <?php endif; ?>	
</main>
