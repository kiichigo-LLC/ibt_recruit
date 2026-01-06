<?php 

  //変数受け渡し
  include('_common/_var.php');

  get_header();

?>

<div class="ibt-title">
  <div class="ibt-title-inr">
    <h2><span><?php the_title(); ?></span></h2>
  </div>
</div>

<div class="ibt-page">
  <div class="ibt-page-inr">

    <div class="ibt-page-main">
      <div class="ibt-page-main-inr">
        
        <div class="ibt-page-main-content">
          <?php the_content(); ?>
        </div>

      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>