<section class="lbh-anchors">
  <h2 class="lbh-heading-h5">On this page:</h2>
  <ul class="lbh-list lbh-list--anchor">
    <?php if( have_rows('anchor_links') ): ?>
      <?php while ( have_rows('anchor_links') ) : the_row(); ?>
        <li class="lbh-list__item">
          <a href="<?php the_sub_field('anchor_link'); ?>" class="lbh-link"><?php the_sub_field('anchor_title'); ?></a>
        </li>
      <?php endwhile; ?>
    <?php endif; ?>
  </ul>
</section>
