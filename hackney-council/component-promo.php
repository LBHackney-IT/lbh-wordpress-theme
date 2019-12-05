<section class="lbh-section">
	<div class="lbh-container">
		<div class="lbh-promo__wrapper lbh-section__list">
			<?php if( have_rows('mayor_intro', 'options') ): ?>
        <?php while ( have_rows('mayor_intro', 'options') ) : the_row(); ?>
          <div class="lbh-promo__half lbh-section__listing">
            <figure class="lbh-promo__image">
              <?php echo wp_get_attachment_image(get_sub_field('icon')); ?>
            </figure>
          </div>
					<div class="lbh-promo__half lbh-section__listing">
						<h2 class="lbh-heading-h1 lbh-promo__title"><?php the_sub_field('title'); ?></h2>
						<p class="lbh-body-m lbh-promo__excerpt">
							<?php the_sub_field('description'); ?>
            </p>
						<a href="<?php the_sub_field('cta_url'); ?>" class="lbh-button govuk-button">
							<?php the_sub_field('cta_url_text'); ?>
						</a>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
	</div>
</section>
