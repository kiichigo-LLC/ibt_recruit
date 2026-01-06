<div class="ibt-header<?php if (is_home()): ?> home<?php endif; ?>">
  <div class="ibt-header-inr">
    <div class="bgr"><span></span></div>
    <div class="ibt-header-logo">
      <a href="<?php echo $home_url; ?>">
        <?php if (is_home()): ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/logo_w.svg" alt="インバウンドテクノロジー" width="176" height="40">
        <?php else: ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/logo.svg" alt="インバウンドテクノロジー" width="176" height="40">
        <?php endif; ?>
      </a>
    </div>

    <div class="ibt-header-nav<?php if (has_category('recruit')): ?> recruit<?php else: ?> plusnav opn<?php endif; ?><?php if (is_home()): ?> home<?php endif; ?>">
      <?php if (has_category('recruit')): ?>
        <?php include(get_template_directory() . '/_page/parts/recruit/nav.php'); ?>
      <?php else: ?>
        <?php include(get_template_directory() . '/__renewal/nav.php'); ?>
      <?php endif; ?>
    </div>

  </div>
</div>