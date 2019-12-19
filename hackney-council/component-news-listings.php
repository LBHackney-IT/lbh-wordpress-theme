<section class="lbh-section">
  <div class="lbh-container">
    <?php if (get_sub_field('news_section_title')): ?>
      <h2 class="lbh-heading-h1 lbh-section__title"><?php the_sub_field('news_section_title'); ?></h2>
    <?php endif; ?>
    <?php if( have_rows('news_listings') ): ?>
      <div class="lbh-section__list">
        <?php	while ( have_rows('news_listings') ) : the_row(); ?>
          <article class="lbh-section__listing lbh-news">
            <a href="<?php the_sub_field('cta_url'); ?>" class="lbh-article__link">
              <div class="lbh-news__front">
                <figure class="lbh-article__image"><?php echo wp_get_attachment_image(get_sub_field('image'), 'other-width'); ?></figure>
                <h3 class="lbh-heading-h5 lbh-article__title"><?php the_sub_field('title'); ?></h3>
                <div class="lbh-article__cta">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="lbh-article__cta-text"><?php the_sub_field('cta_url_text'); ?></span>
                  <i class="fas fa-arrow-right"></i>
                </div>
              </div>
              <div class="lbh-news__back">
                <h3 class="lbh-heading-h5 lbh-article__title"><?php the_sub_field('title'); ?></h3>
                <?php if (get_sub_field('description')) : ?>
                  <p class="lbh-body-s lbh-article__excerpt"><?php the_sub_field('description'); ?></p>
                <?php endif; ?>
                <div class="lbh-article__cta">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="lbh-article__cta-text"><?php the_sub_field('cta_url_text'); ?></span>
                  <i class="fas fa-arrow-right"></i>
                </div>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <a href="https://intranet.hackney.gov.uk/news" class="lbh-button govuk-button lbh-news__all-link">Read all news about Hackney Council</a>
  </div>
</section>
