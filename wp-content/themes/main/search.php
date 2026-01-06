<?php

	get_header();

  //ACF変数受け渡し
  include('_common/_acf.php');

?>

<div class="rakutentv-news-breadcrumb">
  <div class="rakutentv-news-breadcrumb-inr">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
			<li>"<?php the_search_query() ?>"の検索結果</li>
    </ol>
  </div>
</div>

<main>

  <div class="rakutentv-news-main">

    <div class="rakutentv-news-main-l">

      <div class="rakutentv-news-list">
        <div class="rakutentv-news-list-inr">

          <div class="rakutentv-news-list-tag">
            <div class="rakutentv-news-list-tag-title">
              <span>"<?php the_search_query() ?>"について<?php echo $wp_query->found_posts; ?>件見つかりました</span>
            </div>

            <div class="rakutentv-news-list-tag-list">

              <?php if(have_posts()): while(have_posts()):the_post(); ?>

                <div class="rakutentv-news-list-tag-item">
                  <a href="<?php the_permalink() ?>">
                    <div class="rakutentv-news-list-tag-item__label"><?php the_title(); ?></div>
                  </a>
                </div>

              <?php endwhile; endif; ?>

            </div>

            <div class="rakutentv-news-pagenation">
              <div class="rakutentv-news-pagenation-inr">
                <?php
                  $args = array(
                    'mid_size' => 1,
                    'prev_text' => '前へ',
                    'next_text' => '次へ',
                    'screen_reader_text' => ' ',
                  );
                  the_posts_pagination($args);
                ?>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>

    <div class="rakutentv-news-main-r">

      <!-- <$mt:Include module="- サイドバー"$> -->
      <?php include('_common/sidebar.php'); ?>

    </div>

  </div>
  
</main>

<?php get_footer(); ?>