<div class="recruit-home-section">

  <h2 class="recruit-home-section-ttl">
    <span>募集職種</span>
  </h2>

  <div class="recruit-home-job">

    <?php
      // member_interviewカテゴリの新着順3件を取得
      $job_query = new WP_Query(array(
        'category_name' => 'job',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC'
      ));
      
      if($job_query->have_posts()): ?>
      <?php while($job_query->have_posts()): $job_query->the_post();
        
        // SCF変数の読み込み（ループ内で各投稿のIDを取得するため）
        include(get_template_directory() . '/_utils/_scf.php');
        
        // アイキャッチ画像取得
        $thumbnail_id = get_post_thumbnail_id();
        $eye_img = wp_get_attachment_image_src($thumbnail_id, 'large');
        
        $category = get_the_category();
        $cat_id   = !empty($category) ? $category[0]->cat_ID : null;
        $cat_name = !empty($category) ? $category[0]->cat_name : null;
        $cat_slug = !empty($category) ? $category[0]->category_nicename : null;
        
        // タグを取得
        $tags = get_the_tags();
        $tag_name = !empty($tags) ? $tags[0]->name : '';
        $tag_name = str_replace('採用｜', '', $tag_name);

      ?>

        <div class="recruit-home-job-item">

          <div class="recruit-home-job-item-img">
            <?php if($eye_img && $eye_img[0]) { ?>
              <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="512" height="328">
            <?php } else { ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/img/new/recruit/sample1.webp" alt="新卒" width="512" height="328">
            <?php } ?>
          </div>  

          <div class="recruit-home-job-item-ttl">
            <?php if($tag_name) { ?>
              <span class="recruit-home-job-item-ttl-tag"><?php echo esc_html($tag_name); ?></span>
            <?php } ?>
            <?php if($recruit_title) { ?>
              <span class="recruit-home-job-item-ttl-main"><?php echo preg_replace('/<br\s*\/?>/i', ' ', $recruit_title); ?></span>
            <?php } ?>
          </div>

          <div class="recruit-home-job-item-detail">
            <dl>
              <?php
                $recruit_point_role = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_role', true);
                $recruit_point_type = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_type', true);
                $recruit_point_area = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_area', true);
              ?>
              <?php if ($recruit_point_role) : ?>
                <div>
                  <dt>職種</dt>
                  <dd><?php echo esc_html($recruit_point_role); ?></dd>
                </div>
              <?php endif; ?>
              <?php if ($recruit_point_type) : ?>
                <div>
                  <dt>雇用形態</dt>
                  <dd><?php echo esc_html($recruit_point_type); ?></dd>
                </div>
              <?php endif; ?>
              <?php if ($recruit_point_area) : ?>
                <div>
                  <dt>エリア</dt>
                  <dd><?php echo esc_html($recruit_point_area); ?></dd>
                </div>
              <?php endif; ?>
            </dl>
          </div>

        </div>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    
  </div>

  <div class="recruit-home-section-btn">
    <a href="/job/" class="ibt-btn">
      <span>募集職種一覧をみる</span>
    </a>
  </div>

</div>