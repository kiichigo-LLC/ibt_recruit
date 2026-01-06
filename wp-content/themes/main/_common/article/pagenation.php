<?php
  // the_post_navigation(
  //   array(
  //     'prev_text' => '<span class="nav-subtitle">' . esc_html__( '前の記事へ:', 'nomal' ) . '</span> <span class="nav-title">%title</span>',
  //     'next_text' => '<span class="nav-subtitle">' . esc_html__( '次の記事へ:', 'nomal' ) . '</span> <span class="nav-title">%title</span>',
  //   )
  // ); 
?>

<div class="rakutentv-news-pagenation-article">
  <div class="rakutentv-news-pagenation-article-inr">
    <div class="rakutentv-news-pagenation-article-prev">
      <?php previous_post_link( '%link', '<span>前へ</span>' ); ?>
      <?php previous_post_link('←%link', '%title'); ?>

    </div>
    <div class="rakutentv-news-pagenation-article-next">
      <?php next_post_link( '%link', '<span>次へ</span>' ); ?>
      <?php next_post_link('%link→', '%title'); ?>
    </div>
  </div>
</div>