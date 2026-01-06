<?php

/* Template Name: 採用企業さまへ */

get_header();

$page = get_post();
$page_title = get_the_title();
  
?>

<div class="ibt-title">
  <div class="ibt-title-inr">
    <h2><span><?php echo $page_title; ?></span></h2>
  </div>
</div>

<div class="ibt-category">
  <div class="ibt-category-inr flex flex-between flex-wrap">

    <div class="ibt-category-main col-2">
      <div class="ibt-category-main-inr flex flex-between flex-wrap">

        <?php

          $newslist = get_posts( array(
            'category_name' => 'case-study, employment-of-foreigners',
            'order' => 'DESC',
            'posts_per_page' => -1
          ));
          foreach( $newslist as $post ):
          setup_postdata( $post );
          $thumbnail_id = get_post_thumbnail_id();
          $eye_img_m = wp_get_attachment_image_src( $thumbnail_id , 'learge' );

          $ctg = get_the_category();
          $ctg = $ctg[0];
          $cat_name = $ctg -> name;
          $cat_slug = $ctg -> slug;

        ?>

          <div class="col-2-item <?php echo $cat_slug; ?>">
            <a href="<?php the_permalink(); ?>">
              <div class="col-2-item-seal">
                <?php echo $cat_name; ?>
              </div>
              <div class="col-2-item-img" style="background-image: url(<?php if(has_post_thumbnail()) { ?><?php echo $eye_img_m[0] ?><?php } else { ?><?php echo get_stylesheet_directory_uri(); ?>/img/none.png<?php } ?>);"></div>
              <div class="col-2-item-detail">
                <div class="col-2-item-detail-date">
                  <?php echo get_the_modified_date( 'Y.m.d' ); ?>
                </div>
                <div class="col-2-item-detail-title">
                  <span><?php the_title(); ?></span>
                </div>
                <div class="col-2-item-detail-next">
                  続きを読む →
                </div>
              </div>
            </a>
          </div>

        <?php
          endforeach;
          wp_reset_postdata();
        ?>

      </div>
    </div>

    <?php include(get_template_directory() . '/side.php'); ?>

  </div>
</div>

<?php get_footer(); ?>