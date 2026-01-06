<?php

	get_header();

  	// SCF変数の読み込み
	include(get_template_directory() . '/utils/_scf.php');

  $tag = get_queried_object();
  $tag_id = $tag->term_id;
  $tag_name = $tag->name;
  $tag_slug = $tag->slug;

?>

<?php include(get_template_directory() . '/_page/parts/recruit/svg-animation.php'); ?>


<div class="ibt-contents recruit">
  <div class="ibt-contents-inr recruit-inr">
    
    <div class="ibt-contents-head recruit-head">
      <h1 class="recruit-head-ttl">
      MEMBER <br class="nonepc">INTERVIEW
      </h1>
    </div>

    <div class="ibt-contents-main recruit-main">

      <div class="recruit-tag-archive">

        <?php if(have_posts()): ?>
          <?php while(have_posts()):the_post();
            
            // recruitカテゴリに属しているかチェック
            $category = get_the_category();
            $is_recruit = false;
            if (!empty($category)) {
              foreach ($category as $cat) {
                if ($cat->slug === 'recruit') {
                  $is_recruit = true;
                  break;
                }
              }
            }
            
            // recruitカテゴリに属していない場合はスキップ
            if (!$is_recruit) {
              continue;
            }
            
            // SCF変数の読み込み（ループ内で各投稿のIDを取得するため）
            include(get_template_directory() . '/utils/_scf.php');

          ?>

            <div class="recruit-tag-archive-box">
              <a href="<?php the_permalink(); ?>">
                <div class="recruit-tag-archive-box-head">
                  <div class="recruit-tag-archive-box-copy">
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
                  <div class="recruit-tag-archive-box-img">
                    <?php if($member_interview_thumnail) { ?>
                      <img src="<?php echo esc_url($member_interview_thumnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="348" height="454">
                    <?php } elseif($eye_img && $eye_img[0]) { ?>
                      <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="348" height="454">
                    <?php } else { ?>
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/recruit/sample1.webp" alt="新卒" width="348" height="454">
                    <?php } ?>
                  </div>
                </div>

                <div class="recruit-tag-archive-box-detail">
                  <div class="recruit-tag-archive-box-detail-group">
                    <?php if ($member_interview_panel_group) : ?>
                      <b><?php echo esc_html($member_interview_panel_group); ?></b>
                    <?php endif; ?>
                    <?php if ($member_interview_panel_post) : ?>
                      <?php echo esc_html($member_interview_panel_post); ?>
                    <?php endif; ?>
                  </div>
                  <div class="recruit-tag-archive-box-detail-name">
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

