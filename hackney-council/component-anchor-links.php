<div class="lbh-content">
  <h2 class="lbh-heading-h5">On this page:</h2>
  <ul class="lbh-list">
    <?php if( have_rows('anchor_links') ): ?>
      <?php while ( have_rows('anchor_links') ) : the_row(); ?>
        <li>
          <a href="<?php the_sub_field('anchor_link'); ?>" class="lbh-link"><?php the_sub_field('anchor_title'); ?></a>
        </li>
      <?php endwhile; ?>
    <?php endif; ?>
  </ul>
</div>
