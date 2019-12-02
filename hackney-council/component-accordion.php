<?php if( have_rows('accordions') ): ?>
  <?php $accordion_row = 0; ?>
  <div class="govuk-accordion lbh-accordion" data-module="govuk-accordion" id="accordion-<?php echo $accordion_counter; ?>" data-attribute="value">
    <?php while ( have_rows('accordions') ) : the_row(); ?>
      <?php $accordion_row++; ?>
      <div class="govuk-accordion__section ">
        <div class="govuk-accordion__section-header">
          <h5 class="govuk-accordion__section-heading">
            <span class="govuk-accordion__section-button" id="accordion-heading-<?php echo $accordion_counter . '-' . $accordion_row; ?>">
              <?php the_sub_field('accordion_title'); ?>
            </span>
          </h5>
        </div>
        <div id="accordion-content-<?php echo $accordion_counter . '-' . $accordion_row; ?>" class="govuk-accordion__section-content" aria-labelledby="accordion-heading-<?php echo $accordion_counter . '-' . $accordion_row; ?>">
          <?php the_sub_field('accordion_content'); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
