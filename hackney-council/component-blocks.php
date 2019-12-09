<section class="lbh-section">
  <div class="lbh-container">
    <?php if (get_field('blocks_title')): ?>
      <h2 class="lbh-heading-h1 lbh-section__title"><?php the_field('blocks_title'); ?></h2>
    <?php endif; ?>
    <?php if( have_rows('blocks') ): ?>
      <div class="lbh-section__list">
        <?php	while ( have_rows('blocks') ) : the_row(); ?>
          <article class="lbh-block lbh-section__listing">
            <div class="lbh-block__wrapper" style="background-image: url('<?php the_sub_field('icon'); ?>)'">
              <?php if(get_sub_field('title')): ?>
                <h3 class="lbh-heading-h5 lbh-block__title"><?php the_sub_field('title'); ?></h3>
              <?php endif; ?>
              <?php if(get_sub_field('description')): ?>
                <p class="lbh-body-m lbh-block__excerpt"><?php the_sub_field('description'); ?></p>
              <?php endif; ?>
              <?php if(get_sub_field('cta_url') && get_sub_field('cta_url_text')): ?>
                <a href="<?php the_sub_field('cta_url'); ?>" class="lbh-button govuk-button lbh-button--secondary"><?php the_sub_field('cta_url_text'); ?></a>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
