<?php

/* Template Name: Company Info */

get_header();
  
?>

<div class="ibt-contents">
  <div class="ibt-contents-inr">

    <div class="ibt-contents-head">
      <h2 class="ibt-contents-ttl ibt-ttl">
        COMPANY&thinsp;INFO
      </h2>
    </div>

    <div class="ibt-contents-main">
      
      <?php
        include(get_template_directory() . '/_page/parts/companyinfo/profile.php');
        include(get_template_directory() . '/_page/parts/companyinfo/boardmembers.php');
      ?>

    </div>

  </div>
</div>

<?php get_footer(); ?>