<section class="lbh-section">
  <div class="lbh-container">
    <?php if (get_field('headlines_title', 'option')): ?>
      <h2 class="lbh-heading-h1 lbh-section__title"><?php the_field('headlines_title', 'option'); ?></h2>
    <?php endif; ?>
    <?php if( have_rows('headline_cards', 'option') ): ?>
      <div class="lbh-section__list">
        <?php	while ( have_rows('headline_cards', 'option') ) : the_row(); ?>
          <article class="lbh-article lbh-section__listing">
            <a href="<?php the_sub_field('cta_url'); ?>" class="lbh-article__link">
              <figure class="lbh-article__image"><?php echo wp_get_attachment_image(get_sub_field('image')); ?></figure>
              <h3 class="lbh-heading-h5 lbh-article__title"><?php the_sub_field('title'); ?></h3>
              <p class="lbh-body-m lbh-article__excerpt"><?php the_sub_field('description'); ?></p>
              <div class="lbh-article__cta">
                <span class="lbh-article__cta-text"><?php the_sub_field('cta_url_text'); ?></span>
                <i class="fas fa-arrow-right"></i>
                <!-- <FontAwesomeIcon icon="faArrowRight} /> -->
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
