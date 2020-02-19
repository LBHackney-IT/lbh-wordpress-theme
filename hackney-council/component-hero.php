<section class="lbh-hero">
  <div class="lbh-hero__wrapper" style="background-image:url(<?php echo $hero['hero_banner']; ?>)">
    <div class="lbh-hero__content">
      <div class="lbh-container">
        <div class="lbh-hero__copy">
          <h2 class="lbh-heading-h2"><?php echo $hero['hero_title']; ?></h2>
          <p class="lbh-body-m"><?php echo $hero['hero_intro_text']; ?></p>
        </div>
      </div>
    </div>
    <div class="lbh-container">
      <div class="lbh-hero__box">
        <h3 class="lbh-heading-h4 lbh-hero__box-title"><?php echo $hero['hero_box_title']; ?></h3>
        <ul class="lbh-list lbh-list--bullet lbh-hero__box-list">
          <?php if(count($hero['hero_box_items']) > 0): ?>
            <?php foreach ( $hero['hero_box_items'] as $item ) : the_row(); ?>
              <li><a href="<?php echo $item['cta_url']; ?>" class="lbh-hero__box-link lbh-link"><?php echo $item['cta_url_text']; ?></a></li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="lbh-hero__cta-bar">
    <?php if(count($hero['hero_bar_links']) > 0): ?>
      <div class="lbh-container">
        <nav class="lbh-hero__social">
          <?php foreach ( $hero['hero_bar_links'] as $item ) : the_row(); ?>
            <a 
              href="<?php echo $item['url']; ?>"
              class="lbh-hero__social-link"
              style="
                background-image:url('<?php echo $item['image']; ?>');
              "
              target="_blank"
              >
              <span class="lbh-hero__social-text"><?php echo $item['text']; ?></span>
            </a>
          <?php endforeach; ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
</section>
