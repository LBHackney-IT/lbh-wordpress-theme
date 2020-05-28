<section class="lbh-section lbh-social-blocks">
  <div class="lbh-container">
    <h2 class="lbh-heading-h1 lbh-section__title">Follow us</h2>
    <div class="lbh-section__list">
      <?php while(have_rows('social_block')): the_row(); ?>
        <?php $type = get_sub_field('type'); ?>
        <?php if ($type === 'googleplus'): ?>
          <div class="lbh-social-block lbh-social-block--google-plus lbh-section__listing">
            <div class="lbh-social-block__wrapper">
              <h3 class="lbh-social-block__title">
                <img class="lbh-social-block__title-image" src="<?php echo get_template_directory_uri() . '/img/lbh_logo_black.svg'; ?>"/>
                <span class="lbh-social-block__title-text"><?php the_sub_field('google_plus_username'); ?></span>
              </h3>
              <span class="lbh-social-block__icon-wrapper">
                <i class="fab fa-google-plus"></i>
              </span>
              <a href="<?php the_sub_field('google_plus_link'); ?>" target="_blank">
                <img src="<?php the_sub_field('google_plus_image'); ?>" style="margin-top: 35px;"/>
              </a>
            </div>
          </div>
        <?php elseif ($type === 'youtube') : ?>
          <div class="lbh-social-block lbh-social-block--youtube lbh-section__listing">
            <div class="lbh-social-block__wrapper">
              <h3 class="lbh-social-block__title">
                <img class="lbh-social-block__title-image" src="<?php echo get_template_directory_uri() . '/img/lbh_logo_black.svg'; ?>"/>
                <span class="lbh-social-block__title-text"><?php the_sub_field('youtube_username'); ?></span>
              </h3>
              <span class="lbh-social-block__icon-wrapper">
                <i class="fab fa-youtube"></i>
              </span>
              <?php while(have_rows('youtube_videos')): the_row(); ?>
                <?php the_sub_field('video'); ?>
              <?php endwhile; ?>
            </div>
          </div>
        <?php elseif ($type === 'twitter') : ?>
          <div class="lbh-social-block lbh-social-block--twitter lbh-section__listing">
            <div class="lbh-social-block__wrapper">
              <h3 class="lbh-social-block__title">
                <img class="lbh-social-block__title-image" src="<?php echo get_template_directory_uri() . '/img/lbh_logo_black.svg'; ?>"/>
                <span class="lbh-social-block__title-text">@<?php the_sub_field('twitter_username'); ?></span>
              </h3>
              <span class="lbh-social-block__icon-wrapper">
                <i class="fab fa-twitter"></i>
              </span>
              <a class="twitter-timeline" height="500" href="https://twitter.com/<?php the_sub_field('twitter_username'); ?>?ref_src=twsrc%5Etfw" style="margin-top:35px">Tweets by <?php the_sub_field('twitter_username'); ?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
          </div>
        <?php elseif ($type === 'facebook') : ?>
          <div class="lbh-social-block lbh-social-block--facebook lbh-section__listing">
            <div class="lbh-social-block__wrapper">
              <h3 class="lbh-social-block__title">
                <img class="lbh-social-block__title-image" src="<?php echo get_template_directory_uri() . '/img/lbh_logo_black.svg'; ?>"/>
                <span class="lbh-social-block__title-text"><?php the_sub_field('facebook_username'); ?></span>
              </h3>
              <span class="lbh-social-block__icon-wrapper">
                <i class="fab fa-facebook"></i>
              </span>
              <div>
                <iframe
                  src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php the_sub_field('facebook_username'); ?>&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=250143628337727"
                  width="340"
                  height="500"
                  style="border:none;overflow:hidden"
                  scrolling="no"
                  frameBorder="0"
                  allowTransparency="true"
                  allow="encrypted-media"
                ></iframe>
              </div>
            </div>
          </div>
        <?php elseif ($type === 'instagram') : ?>
          <div class="lbh-social-block lbh-social-block--instagram lbh-section__listing">
            <div class="lbh-social-block__wrapper">
              <h3 class="lbh-social-block__title">
                <img class="lbh-social-block__title-image" src="<?php echo get_template_directory_uri() . '/img/lbh_logo_black.svg'; ?>"/>
                <span class="lbh-social-block__title-text"><?php the_sub_field('instagram_username'); ?></span>
              </h3>
              <span class="lbh-social-block__icon-wrapper">
                <i class="fab fa-instagram"></i>
              </span>
              <div>
                <?php the_sub_field('instagram_embed'); ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  </div>
</section>
