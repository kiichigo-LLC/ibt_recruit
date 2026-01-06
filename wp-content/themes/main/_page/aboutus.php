<?php

/* Template Name: About Us */

get_header();
  
?>

<div class="ibt-contents">
  <div class="ibt-contents-inr">

    <div class="ibt-contents-head">
      <h2 class="ibt-contents-ttl ibt-ttl">
        ABOUT&thinsp;US
      </h2>
    </div>

    <div class="ibt-contents-main">
      
      <?php
        include(get_template_directory() . '/_page/parts/aboutus/vision.php');
        include(get_template_directory() . '/_page/parts/aboutus/mission.php');
        include(get_template_directory() . '/_page/parts/aboutus/value.php');
        include(get_template_directory() . '/_page/parts/aboutus/dx.php');
      ?>

    </div>

  </div>
</div>

<?php get_footer(); ?>