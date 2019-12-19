<section class="lbh-section">
  <div class="lbh-container">
    <?php if (get_sub_field('article_listings_title')): ?>
      <h2 class="lbh-heading-h1 lbh-section__title"><?php the_sub_field('article_listings_title'); ?></h2>
    <?php endif; ?>
    <?php if( have_rows('article_listings') ): ?>
      <div class="lbh-section__list">
        <?php	while ( have_rows('article_listings') ) : the_row(); ?>
          <article class="lbh-article lbh-section__listing">
            <a href="<?php the_sub_field('cta_url'); ?>" class="lbh-article__link">
              <figure class="lbh-article__image"><?php echo wp_get_attachment_image(get_sub_field('image'), 'other-width'); ?></figure>
              <h3 class="lbh-heading-h5 lbh-article__title"><?php the_sub_field('title'); ?></h3>
              <?php if(get_sub_field('description')): ?>
                <p class="lbh-body-m lbh-article__excerpt"><?php the_sub_field('description'); ?></p>
              <?php endif; ?>
              <div class="lbh-article__cta">
                <span class="lbh-article__cta-text"><?php the_sub_field('cta_url_text'); ?></span>
                <i class="fas fa-arrow-right"></i>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
