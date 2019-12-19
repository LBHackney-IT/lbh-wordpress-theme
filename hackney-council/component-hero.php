<section class="lbh-hero">
  <div class="lbh-hero__wrapper" style="background-image:url(<?php the_sub_field('hero_banner'); ?>)">
    <div class="lbh-hero__content">
      <div class="lbh-container">
        <div class="lbh-hero__copy">
          <h2 class="lbh-heading-h2"><?php the_sub_field('hero_title'); ?></h2>
          <p class="lbh-body-m"><?php the_sub_field('hero_intro_text'); ?></p>
        </div>
      </div>
    </div>
    <div class="lbh-container">
      <div class="lbh-hero__box">
        <h3 class="lbh-heading-h4 lbh-hero__box-title"><?php the_sub_field('hero_box_title'); ?></h3>
        <ul class="lbh-list lbh-list--bullet govuk-list govuk-list--bullet lbh-hero__box-list">
          <?php if( have_rows('hero_box_items') ): ?>
            <?php while ( have_rows('hero_box_items') ) : the_row(); ?>
              <li><a href="<?php the_sub_field('cta_url'); ?>" class="lbh-hero__box-link lbh-link"><?php the_sub_field('cta_url_text'); ?></a></li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="lbh-hero__cta-bar">
    <div class="lbh-container">
      <nav class="lbh-hero__social">
        <a 
          href="https://drive.google.com/"
          class="lbh-hero__social-link"
          style="
            background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/drive.png');
          "
          target="_blank"
          >
            <span class="lbh-hero__social-text">Google Drive</span>
          </a>
          <a 
            href="https://plus.google.com/"
            class="lbh-hero__social-link" 
            style="background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/official-google-plus-logo-900x900.jpg');"									
            target="_blank"
            >
          </a>
            <span class="lbh-hero__social-text">G+ Communities</span>
          <a 
            href="https://contacts.google.com/"
            class="lbh-hero__social-link" 
            style="background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/google-plus-profile-2.png');"									
            target="_blank"
            >
            <span class="lbh-hero__social-text">Google Contacts</span>
          </a>
          <a 
            href="https://mail.google.com/"
            class="lbh-hero__social-link"
            style="background-image:url('https://intranet.hackney.gov.uk/wp-content/uploads/gmail.png');"									
            target="_blank"
            >
            <span class="lbh-hero__social-text">Gmail</span>
          </a>
        </nav>
      </div>
    </div>
  </div>
</section>
