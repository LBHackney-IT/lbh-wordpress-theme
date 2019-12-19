<?php if (get_field('show_phase_banner', 'option')) : ?>
  <div class="govuk-phase-banner  lbh-phase-banner">
    <div class="lbh-container">
      <div class="govuk-phase-banner__content">
        <strong class="govuk-tag govuk-phase-banner__content__tag  lbh-tag">
          <?php the_field('phase_banner_tag', 'option'); ?>
        </strong>
        <span class="govuk-phase-banner__text">
          <?php the_field('phase_banner_message', 'option'); ?>
        </span>
      </div>
    </div>
  </div>
<?php endif; ?>
