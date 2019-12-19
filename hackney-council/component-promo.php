<section class="lbh-section">
	<div class="lbh-container">
		<div class="lbh-promo__wrapper lbh-section__list">
			<div class="lbh-promo__half lbh-section__listing">
        <figure class="lbh-promo__image">
          <?php echo wp_get_attachment_image(get_sub_field('image'), 'promo-image'); ?>
        </figure>
      </div>
      <div class="lbh-promo__half lbh-section__listing">
        <h2 class="lbh-heading-h1 lbh-promo__title"><?php the_sub_field('title'); ?></h2>
        <?php if(get_sub_field('description')): ?>
          <p class="lbh-body-m lbh-promo__excerpt">
            <?php the_sub_field('description'); ?>
          </p>
        <?php endif; ?>
        <?php if(get_sub_field('cta_url') && get_sub_field('cta_url_text')): ?>
          <a href="<?php the_sub_field('cta_url'); ?>" class="lbh-button govuk-button">
            <?php the_sub_field('cta_url_text'); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
	</div>
</section>
