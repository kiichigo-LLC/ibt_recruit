<?php

/* Template Name: トップページ改修 */

get_header();
  
?>

<div class="ibt-contents">
  <div class="ibt-contents-inr">

    <?php
      include(get_template_directory() . '/__renewal/home/hero-sample.php');
      include(get_template_directory() . '/__renewal/home/vision.php');
      include(get_template_directory() . '/__renewal/home/service.php');
      include(get_template_directory() . '/__renewal/home/news.php');
      include(get_template_directory() . '/__renewal/home/ban.php');
      include(get_template_directory() . '/__renewal/home/recruit.php');
      include(get_template_directory() . '/__renewal/home/cta.php');
    ?>

  </div>
</div>

<?php get_footer(); ?>