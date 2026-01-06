<?php

	get_header();
  // $category = get_queried_object();
	// $cat_id   = $category[0]->cat_ID;
	// $cat_name = $category[0]->cat_name;
	// $cat_slug = $category[0]->category_nicename;

  $cat = get_queried_object();
  $cat_id = $cat -> cat_ID;
  $cat_name = $cat -> name;
  $cat_slug = $cat -> slug;

?>

<div class="ibt-title">
  <div class="ibt-title-inr">
    <h2><span><?php echo $cat_name; ?></span></h2>
  </div>
</div>

<div class="ibt-category">
  <div class="ibt-category-inr flex flex-between flex-wrap">

    <div class="ibt-category-main col-2">
      <div class="ibt-category-main-inr flex flex-between flex-wrap">

        <?php if(have_posts()): ?>
          <?php while(have_posts()):the_post();
            
            $thumbnail_id = get_post_thumbnail_id();
            $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'learge' );

          ?>

            <div class="col-2-item <?php echo $cat_slug; ?>">
              <a href="<?php the_permalink(); ?>">
                <div class="col-2-item-seal">
                  <?php echo $cat_name; ?>
                </div>
                <div class="col-2-item-img" style="background-image: url(<?php if(has_post_thumbnail()) { ?><?php echo $eye_img[0] ?><?php } else { ?><?php echo get_stylesheet_directory_uri(); ?>/img/none.png<?php } ?>);"></div>
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