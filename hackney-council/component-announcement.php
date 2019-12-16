<?php if(get_field('show_sitewide_msg', 'option')) : ?>
  <section class="lbh-announcement lbh-announcement--site">
    <div class="lbh-container">
      <?php if (get_field('sitewide_message_title', 'option')) : ?>
        <h3 class="lbh-announcement__title"><?php the_field('sitewide_message_title', 'option'); ?></h3>
      <?php endif; ?>
      <div class="lbh-announcement__content lbh-content"><?php the_field('sitewide_message', 'option'); ?></div>
    </div>
  </section>
<?php endif; ?>

<!-- sectionwide announcements -->
<?php if (is_page()) : 
  global $post;
  $terms = get_the_terms( $post->ID, 'service' );
  if ($terms) {
    $announcement_sections = [];
    // check if the repeater field has rows of data
    if( have_rows('sectionwide_announcements', 'option') ):
      // loop through the rows of data
      while ( have_rows('sectionwide_announcements', 'option') ) : the_row();
        $message = new stdClass();
        $message->id = get_sub_field('sections', 'option');
        $message->content = get_sub_field('announcement', 'option');
        array_push($announcement_sections, $message);
      endwhile;
    endif;
    foreach($terms as $term) {
      foreach ($announcement_sections as $section) { 
        if (in_array($term->term_id, $section->id)) { ?>
          <section class="lbh-announcement ">
            <div class="lbh-container">
              <div class="lbh-announcement__content lbh-content"><?php echo $section->content; ?></div>
            </div>
          </section>
        <?php }
      }
    } 
  } 
endif; ?>
