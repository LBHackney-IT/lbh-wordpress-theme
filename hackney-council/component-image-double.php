<section class="lbh-image__wrapper">
  <?php foreach([get_sub_field('image_one'), get_sub_field('image_two')] as $image): ?>
    <figure class="lbh-image lbh-image--double">
      <?php include( locate_template( 'component-image.php', false, false ) ); ?>
    </figure>
  <?php endforeach; ?>
</section>
