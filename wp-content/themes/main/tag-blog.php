<?php

  //「ブログ」タグページ
  
	get_header();

?>

<div class="ibt-title">
  <div class="ibt-title-inr">
    <h2><span>候補者様へ</span></h2>
  </div>
</div>

<div class="ibt-tag">
  <div class="ibt-tag-inr flex flex-between flex-wrap">

    <div class="ibt-tag-main col-2">
      <div class="ibt-tag-main-inr flex flex-between flex-wrap">

        <?php if(have_posts()): ?>
          <?php while(have_posts()):the_post();
            
            $thumbnail_id = get_post_thumbnail_id();
            $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'learge' );
            $cat = get_the_category();
            $cat = $cat[0];
            $cat_id = $cat->cat_ID;
            $cat_name = $cat->cat_name;
            $cat_slug = $cat->slug;

          ?>

            <div class="col-2-item <?php echo $cat_slug; ?>">
              <a href="<?php the_permalink(); ?>">
                <div class="col-2-item-seal">
                  <?php echo $cat_name; ?>
                </div>
                <div class="col-2-item-img"<?php if(has_post_thumbnail()) { ?> style="background-image: url(<?php echo $eye_img[0] ?>);"<?php } ?>></div>
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

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>

    <?php include('side.php'); ?>

  </div>
</div>

<?php get_footer(); ?>