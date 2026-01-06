<?php

/* Template Name: News */

get_header();

$page = get_post();
$page_title = get_the_title();
  
?>

<div class="ibt-aboutus">
  <div class="ibt-aboutus-inr">

    <div class="ibt-aboutus-sec" id="press-release">
      <div class="ibt-aboutus-sec-inr">

        <h3 class="ibt-aboutus-sec-title">
          <small>ニュース</small>
          <strong>お知らせ/プレスリリース</strong>
        </h3>
        <div class="ibt-aboutus-sec-list">
          <ul>

            <?php

              $newslist = get_posts( array(
                'category_name' => 'press-release',
                'order' => 'DESC',
                'posts_per_page' => -1
              ));
              foreach( $newslist as $post ):
              setup_postdata( $post );

              $ctg = get_the_category();
              $ctg = $ctg[0];
              $cat_name = $ctg -> name;
              $cat_slug = $ctg -> slug;

            ?>

                <li><span class="list-date"><?php echo get_the_modified_date( 'Y年m月d日' ); ?></span><p class="list-link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></li>

            <?php
              endforeach;
              wp_reset_postdata();
            ?>

          </ul>
        </div>

      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>