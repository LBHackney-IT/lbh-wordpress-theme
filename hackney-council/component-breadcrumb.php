<!-- breadcrumbs -->
<?php if (is_page()): ?>
  <?php $breadcrumbs = []; ?>
  <?php $term = get_the_terms($post->ID, 'service')[0]; ?>
  <?php if ($term->name !== 'Pages'): ?>
    <?php $breadcrumbs = get_term_hierarchy($term); ?>
    <div class="govuk-breadcrumbs lbh-breadcrumbs">
      <div class="lbh-container">
        <ol class="govuk-breadcrumbs__list">
          <li class="govuk-breadcrumbs__list-item">
            <a class="govuk-breadcrumbs__link" href="<?php echo home_url(); ?>">Home</a>
          </li>
          <?php foreach($breadcrumbs as $breadcrumb) { ?>
            <li class="govuk-breadcrumbs__list-item">
              <a class="govuk-breadcrumbs__link" href="<?php echo get_term_link($breadcrumb); ?>"><?php echo $breadcrumb->name; ?></a>
            </li>
          <?php } ?>
        </ol>
      </div>
    </div>
  <?php endif; ?>
<?php elseif (is_single()): ?>
  <div class="govuk-breadcrumbs lbh-breadcrumbs lbh-container">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="<?php echo home_url(); ?>">Home</a>
      </li>
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="<?php echo get_post_type_archive_link('post'); ?>">News</a>
      </li>
    </ol>
  </div>
<?php elseif (is_archive()): ?>
  <div class="govuk-breadcrumbs lbh-breadcrumbs lbh-container">
    <ol class="govuk-breadcrumbs__list">
      <li class="govuk-breadcrumbs__list-item">
        <a class="govuk-breadcrumbs__link" href="<?php echo home_url(); ?>">Home</a>
      </li>
    </ol>
  </div>
<?php endif; ?>
