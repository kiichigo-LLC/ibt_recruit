<?php

	get_header();

  	// SCF変数の読み込み
	include(get_template_directory() . '/utils/_scf.php');

  $cat = get_queried_object();
  $cat_id = $cat -> cat_ID;
  $cat_name = $cat -> name;
  $cat_slug = $cat -> slug;

?>

<?php include(get_template_directory() . '/_page/parts/recruit/svg-animation.php'); ?>


<div class="ibt-contents recruit">
  <div class="ibt-contents-inr recruit-inr">
    
    <div class="ibt-contents-head recruit-head">
      <h1 class="recruit-head-ttl">
        募集一覧
      </h1>
    </div>

    <div class="ibt-contents-main recruit-main">

      <div class="recruit-archive">

        <div class="recruit-archive-box">
          <h2>新卒採用</h2>
          <div class="recruit-archive-box-list">
            <?php if(have_posts()): ?>
              <?php while(have_posts()):the_post();
                
                // 採用｜新卒タグがない場合はスキップ
                if (!has_tag('採用｜新卒')) {
                  continue;
                }
                
                $thumbnail_id = get_post_thumbnail_id();
                $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'learge' );

                // タグを取得
                $post_tags = get_the_tags();
                $tag_name = !empty($post_tags) ? $post_tags[0]->name : '';
                $tag_name = str_replace('採用｜', '', $tag_name);

              ?>

                <div class="recruit-archive-box-list-item <?php echo $cat_slug; ?>">
                  <a href="<?php the_permalink(); ?>">
                    <div class="recruit-archive-box-list-item-img">
                      <?php if($eye_img && $eye_img[0]) { ?>
                        <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="512" height="328">
                      <?php } else { ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/recruit/sample1.webp" alt="新卒" width="512" height="328">
                      <?php } ?>
                    </div>
                    <div class="recruit-archive-box-list-item-detail">
                      <?php if($tag_name) { ?>
                        <span class="recruit-archive-box-list-item-detail-tag"><?php echo esc_html($tag_name); ?></span>
                      <?php } ?>
                      <div class="recruit-archive-box-list-item-detail-title">
                        <span><?php the_title(); ?></span>
                      </div>

                      <div class="recruit-archive-box-list-item-detail-list">
                        <ol>
                          <?php
                            $recruit_point_role = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_role', true);
                            $recruit_point_type = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_type', true);
                            $recruit_point_area = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_area', true);
                          ?>
                          <?php if ($recruit_point_role) : ?>
                            <li>職種 ： <?php echo esc_html($recruit_point_role); ?></li>
                          <?php endif; ?>
                          <?php if ($recruit_point_type) : ?>
                            <li>雇用形態 ： <?php echo esc_html($recruit_point_type); ?></li>
                          <?php endif; ?>
                          <?php if ($recruit_point_area) : ?>
                            <li>エリア ： <?php echo esc_html($recruit_point_area); ?></li>
                          <?php endif; ?>
                        </ol>
                      </div>

                    </div>
                  </a>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="recruit-archive-box">
          <h2>中途採用</h2>
          <div class="recruit-archive-box-list">
            <?php if(have_posts()): ?>
              <?php while(have_posts()):the_post();
                
                // 採用｜中途タグがない場合はスキップ
                if (!has_tag('採用｜中途')) {
                  continue;
                }
                
                $thumbnail_id = get_post_thumbnail_id();
                $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'learge' );

                // タグを取得
                $post_tags = get_the_tags();
                $tag_name = !empty($post_tags) ? $post_tags[0]->name : '';
                $tag_name = str_replace('採用｜', '', $tag_name);

              ?>

                <div class="recruit-archive-box-list-item <?php echo $cat_slug; ?>">
                  <a href="<?php the_permalink(); ?>">
                    <div class="recruit-archive-box-list-item-img">
                      <?php if($eye_img && $eye_img[0]) { ?>
                        <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="512" height="328">
                      <?php } else { ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/recruit/sample1.webp" alt="新卒" width="512" height="328">
                      <?php } ?>
                    </div>
                    <div class="recruit-archive-box-list-item-detail">
                      <?php if($tag_name) { ?>
                        <span class="recruit-archive-box-list-item-detail-tag"><?php echo esc_html($tag_name); ?></span>
                      <?php } ?>
                      <div class="recruit-archive-box-list-item-detail-title">
                        <span><?php the_title(); ?></span>
                      </div>

                      <div class="recruit-archive-box-list-item-detail-list">
                        <ol>
                          <?php
                            $recruit_point_role = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_role', true);
                            $recruit_point_type = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_type', true);
                            $recruit_point_area = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_area', true);
                          ?>
                          <?php if ($recruit_point_role) : ?>
                            <li>職種 ： <?php echo esc_html($recruit_point_role); ?></li>
                          <?php endif; ?>
                          <?php if ($recruit_point_type) : ?>
                            <li>雇用形態 ： <?php echo esc_html($recruit_point_type); ?></li>
                          <?php endif; ?>
                          <?php if ($recruit_point_area) : ?>
                            <li>エリア ： <?php echo esc_html($recruit_point_area); ?></li>
                          <?php endif; ?>
                        </ol>
                      </div>

                    </div>
                  </a>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>

      </div>
      
      <?php
        // include(get_template_directory() . '/_page/parts/aboutus/vision.php');
        // include(get_template_directory() . '/_page/parts/aboutus/mission.php');
        // include(get_template_directory() . '/_page/parts/aboutus/value.php');
        // include(get_template_directory() . '/_page/parts/aboutus/dx.php');
      ?>

    </div>

  </div>
</div>

<?php get_footer(); ?>

