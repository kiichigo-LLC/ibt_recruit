<?php

	get_header();

	// SCF変数の読み込み
	include(get_template_directory() . '/_utils/_scf.php');

	$thumbnail_id = get_post_thumbnail_id();
	$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
	$category = get_the_category();
	$cat_id   = !empty($category) ? $category[0]->cat_ID : null;
	$cat_name = !empty($category) ? $category[0]->cat_name : null;
	$cat_slug = !empty($category) ? $category[0]->category_nicename : null;
	
	// タグを取得
	$tags = get_the_tags();
	$tag_name = !empty($tags) ? $tags[0]->name : '';
	$tag_name = str_replace('採用｜', '', $tag_name);

?>

<?php while( have_posts() ) : the_post(); ?>

<?php include(get_template_directory() . '/_components/svg-animation.php'); ?>

<div class="ibt-contents recruit">
  <div class="ibt-contents-inr recruit-member_interview-inr">
    
    <div class="ibt-contents-head recruit-head"></div>

    <div class="recruit-member_interview-panel">
      <div class="recruit-member_interview-panel-text">
        <div class="recruit-member_interview-panel-text-top fade-up-stagger">
          <?php echo nl2br(esc_html($member_interview_copy)); ?>
        </div>
        <div class="recruit-member_interview-panel-text-btm">
          <div class="recruit-member_interview-panel-text-btm-group">
            <?php if ($member_interview_panel_group) : ?>
              <b class="fade-up-stagger"><?php echo esc_html($member_interview_panel_group); ?></b>
            <?php endif; ?>
            <?php if ($member_interview_panel_post) : ?>
              <span class="fade-up-stagger"><?php echo esc_html($member_interview_panel_post); ?></span>
            <?php endif; ?>
          </div>
          <div class="recruit-member_interview-panel-text-btm-name">
            <?php if ($member_interview_panel_name) : ?>
              <strong class="fade-up-stagger"><?php echo esc_html($member_interview_panel_name); ?></strong>
            <?php endif; ?>
            <?php if ($member_interview_panel_join) : ?>
              <small class="fade-up-stagger"><?php echo esc_html($member_interview_panel_join); ?></small>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="recruit-member_interview-panel-img fade-up-stagger">
        <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="656" height="328">
      </div>
    </div>

    <div class="recruit-member_interview-profile">
      <div class="recruit-member_interview-profile-cap fade-up-stagger">
        <span><b>P</b>ROFILE</span>
      </div>
      <div class="recruit-member_interview-profile-text fade-up-stagger">
        <span>
          <?php echo nl2br(esc_html($member_interview)); ?>
        </span>
      </div>
    </div>

    <div class="ibt-contents-main recruit-main">

      <div class="recruit-member_interview-article">
        <?php
          // repeaterフィールドの行数を取得
          $article_count = 0;
          while (get_post_meta(get_the_ID(), 'member_interview_article_' . $article_count . '_member_interview_article_title', true)) {
            $article_title = get_post_meta(get_the_ID(), 'member_interview_article_' . $article_count . '_member_interview_article_title', true);
            $article_q = get_post_meta(get_the_ID(), 'member_interview_article_' . $article_count . '_member_interview_article_q', true);
            $article_a = get_post_meta(get_the_ID(), 'member_interview_article_' . $article_count . '_member_interview_article_a', true);
            
            if ($article_title || $article_q || $article_a) :
        ?>
          <div class="recruit-member_interview-article-box">
            <?php if ($article_title) : ?>
              <h2 class="fade-up"><?php echo esc_html($article_title); ?></h2>
            <?php endif; ?>
            <?php if ($article_q) : ?>
              <h3 class="fade-up"><?php echo esc_html($article_q); ?></h3>
            <?php endif; ?>
            <?php if ($article_a) : ?>
              <p class="fade-up"><?php echo wp_kses(nl2br($article_a), array('b' => array(), 'br' => array())); ?></p>
            <?php endif; ?>
          </div>
        <?php
            endif;
            $article_count++;
          }
        ?>
      </div>

    </div>

  </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>


