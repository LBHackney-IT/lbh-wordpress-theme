<section class="lbh-section lbh-social-blocks">
  <div class="lbh-container">
    <h2 class="lbh-heading-h1 lbh-section__title">Follow us</h2>
    <div class="lbh-section__list">
      <div class="lbh-social-block lbh-social-block--google-plus lbh-section__listing">
        <div class="lbh-social-block__wrapper">
          <h3 class="lbh-social-block__title">
            <img class="lbh-social-block__title-image" src="https://web-content-api.hackney.gov.uk/wp-content/uploads/Screen-Shot-2019-09-26-at-12.20.21.png"/>
            <span class="lbh-social-block__title-text">@hackneycouncil</span>
          </h3>
          <span class="lbh-social-block__icon-wrapper">
            <i class="fab fa-google-plus"></i>
          </span>
          <a href="https://plus.google.com/communities/111335090618317296762" target="_blank">
            <img src="https://intranet.hackney.gov.uk/wp-content/uploads/image-1.png" style="margin-top: 35px;"/>
          </a>
        </div>
      </div>
      <div class="lbh-social-block lbh-social-block--youtube lbh-section__listing">
        <div class="lbh-social-block__wrapper">
          <h3 class="lbh-social-block__title">
            <img class="lbh-social-block__title-image" src="https://web-content-api.hackney.gov.uk/wp-content/uploads/Screen-Shot-2019-09-26-at-12.20.21.png"/>
            <span class="lbh-social-block__title-text">hackneycouncil</span>
          </h3>
          <span class="lbh-social-block__icon-wrapper">
            <i class="fab fa-youtube"></i>
          </span>
          <?php if(have_rows('youtube_videos')): ?>
            <?php while(have_rows('youtube_videos')): the_row(); ?>
              <?php the_sub_field('video'); ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="lbh-social-block lbh-social-block--twitter lbh-section__listing">
        <div class="lbh-social-block__wrapper">
          <h3 class="lbh-social-block__title">
            <img class="lbh-social-block__title-image" src="https://web-content-api.hackney.gov.uk/wp-content/uploads/Screen-Shot-2019-09-26-at-12.20.21.png"/>
            <span class="lbh-social-block__title-text">@hackneycouncil</span>
          </h3>
          <span class="lbh-social-block__icon-wrapper">
            <i class="fab fa-twitter"></i>
          </span>
          <a class="twitter-timeline" height="500" href="https://twitter.com/hackneycouncil?ref_src=twsrc%5Etfw" style="margin-top:35px">Tweets by hackneycouncil</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
  </div>
</section>
