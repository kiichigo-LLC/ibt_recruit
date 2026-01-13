<?php 

  get_header();

  // 変数を読み込む
  include(get_template_directory() . '/_utils/_var.php');
  
?>

<div class="home-sequence-3">
<?php include(get_template_directory() . '/_components/svg-animation.php'); ?>
</div>

<div class="ibt-contents recruit home">
  <div class="ibt-contents-inr recruit-inr">

    <?php
      
      //キーヴィジュアル 
      include(get_template_directory() . '/_sections/home/kv.php');
      
      //私たちについて
      include(get_template_directory() . '/_sections/home/about.php');

      //制度・環境・文化
      include(get_template_directory() . '/_sections/home/benefits.php');
    
    ?>

    <div class="recruit-middle">
      <?php

        //MEMBER INTERVIEW
        include(get_template_directory() . '/_sections/home/member_interview.php');
      
      ?>

      <div class="recruit-middle-svg">
        <?php include(get_template_directory() . '/_components/svg-animation.php'); ?>
      </div>

      <?php

        //募集職種
        include(get_template_directory() . '/_sections/home/job.php');
      
      ?>
    </div>

  </div>
</div>


<?php get_footer(); ?>