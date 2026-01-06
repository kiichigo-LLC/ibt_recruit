<?php

	get_header();

  $cat = get_queried_object();
  $cat_id = $cat->term_id;
  $cat_name = $cat->name;
  $cat_slug = $cat->slug;

?>

<?php 
  // SVGアニメーション用のIDを設定
  $unique_id = $cat_id;
  include(get_template_directory() . '/_components/svg-animation.php'); 
?>


<div class="ibt-contents recruit">
  <div class="ibt-contents-inr recruit-inr">
    
    <div class="ibt-contents-head recruit-head">
      <h1 class="recruit-head-ttl">
      MEMBER <br class="nonepc">INTERVIEW
      </h1>
    </div>

    <div class="ibt-contents-main recruit-main">

      <div class="recruit-category-archive">

        <?php if(have_posts()): ?>
          <?php while(have_posts()):the_post();
            
            // member_interviewカテゴリに属しているかチェック
            $category = get_the_category();
            $is_member_interview = false;
            if (!empty($category)) {
              foreach ($category as $cat_item) {
                if ($cat_item->slug === 'member_interview') {
                  $is_member_interview = true;
                  break;
                }
              }
            }
            
            // member_interviewカテゴリに属していない場合はスキップ
            if (!$is_member_interview) {
              continue;
            }
            
            // SCF変数の読み込み（ループ内で各投稿のIDを取得するため）
            include(get_template_directory() . '/_utils/_scf.php');
            
            // アイキャッチ画像取得
            $thumbnail_id = get_post_thumbnail_id();
            $eye_img = wp_get_attachment_image_src($thumbnail_id, 'large');

          ?>

            <div class="recruit-category-archive-box">
              <a href="<?php the_permalink(); ?>">
                <div class="recruit-category-archive-box-head">
                  <div class="recruit-category-archive-box-copy">
                    <?php 
                      if ($member_interview_copy) {
                        $lines = explode("\n", $member_interview_copy);
                        foreach ($lines as $line) {
                          $line = trim($line);
                          if ($line) {
                            echo '<span>' . esc_html($line) . '</span>';
                          }
                        }
                      }
                    ?>
                  </div>
                  <div class="recruit-category-archive-box-img">
                    <?php if($member_interview_thumnail) { ?>
                      <img src="<?php echo esc_url($member_interview_thumnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="348" height="454">
                    <?php } elseif($eye_img && $eye_img[0]) { ?>
                      <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="348" height="454">
                    <?php } else { ?>
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/img/new/recruit/sample1.webp" alt="新卒" width="348" height="454">
                    <?php } ?>
                  </div>
                </div>

                <div class="recruit-category-archive-box-detail">
                  <div class="recruit-category-archive-box-detail-group">
                    <?php if ($member_interview_panel_group) : ?>
                      <b><?php echo esc_html($member_interview_panel_group); ?></b>
                    <?php endif; ?>
                    <?php if ($member_interview_panel_post) : ?>
                      <?php echo esc_html($member_interview_panel_post); ?>
                    <?php endif; ?>
                  </div>
                  <div class="recruit-category-archive-box-detail-name">
                    <?php if ($member_interview_panel_name) : ?>
                      <?php echo esc_html($member_interview_panel_name); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </a>
            </div>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
      
    </div>

  </div>
</div>

<?php get_footer(); ?>

