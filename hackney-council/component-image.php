<?php echo wp_get_attachment_image($image); ?>
<?php if (wp_get_attachment_caption($image)) : ?>
  <figcaption class="lbh-image__caption"><?php echo wp_get_attachment_caption($image); ?></figcaption>
<?php endif; ?>
