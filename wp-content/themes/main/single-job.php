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

<?php while( have_posts() ) : the_post(); 
	$share_url = urlencode( get_permalink() );
	$share_title = urlencode( get_the_title() );
?>

<div class="recruit-btn-sns fade-up-stagger">
  <p>SHARE</p>
  <ol>
    <li>
      <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/img/sns/li.svg" alt="LinkedIn" width="32" height="32">
      </a>
    </li>
    <li>
      <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/img/sns/x.svg" alt="x" width="32" height="32">
      </a>
    </li>
    <li>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/img/sns/fb.svg" alt="facebook" width="32" height="32">
      </a>
    </li>
    <li>
      <a href="https://social-plugins.line.me/lineit/share?url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/img/sns/line.svg" alt="LINE" width="32" height="32">
      </a>
    </li>
  </ol>
</div>

<div class="recruit-btn-fix">
  <a href="/apply/<?php echo $recruit_app_source ? '?application_position=' . urlencode($recruit_app_source) : ''; ?>">
    <span>応募する</span>
  </a>
</div>

<?php include(get_template_directory() . '/_components/svg-animation.php'); ?>

<div class="ibt-contents recruit">
  <div class="ibt-contents-inr recruit-inr">
    
    <div class="ibt-contents-head recruit-head">
      <h1 class="recruit-head-ttl single">
        <?php if($tag_name) { ?>
          <span class="recruit-head-ttl-tag"><?php echo esc_html($tag_name); ?></span>
        <?php } ?>
        <?php if($recruit_title) { ?>
          <span class="typewriter-text" data-text="<?php echo esc_attr(strip_tags($recruit_title, '<br>')); ?>"></span>
        <?php } ?>
      </h1>
    </div>

    <div class="recruit-panel">
      <div class="recruit-panel-img fade-up-stagger">
        <?php if($eye_img && $eye_img[0]) { ?>
          <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="512" height="328">
        <?php } else { ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/img/new/recruit/sample1.webp" alt="新卒" width="512" height="328">
        <?php } ?>
      </div>
      <div class="recruit-panel-list fade-up-stagger">
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

    <div class="ibt-contents-main recruit-main">

      <div class="recruit-details">
        <div class="recruit-details-box">
          <h2 class="fade-up-stagger">業務内容</h2>
          <div class="recruit-details-box-text fade-up-stagger">
            <?php 
              $recruit_sec1 = get_post_meta(get_the_ID(), 'recruit_sec1', true);
              if ($recruit_sec1) {
                $allowed_html = array(
                  'div' => array('class' => array()),
                  'iframe' => array(
                    'src' => array(),
                    'width' => array(),
                    'height' => array(),
                    'style' => array(),
                    'allowfullscreen' => array(),
                    'loading' => array(),
                    'referrerpolicy' => array()
                  ),
                  'p' => array(),
                  'br' => array(),
                  'strong' => array(),
                  'em' => array(),
                  'ul' => array(),
                  'ol' => array(),
                  'li' => array(),
                  'a' => array('href' => array(), 'target' => array(), 'rel' => array()),
                  'span' => array('class' => array()),
                  'h1' => array(),
                  'h2' => array(),
                  'h3' => array(),
                  'h4' => array(),
                  'h5' => array(),
                  'h6' => array(),
                );
                echo wp_kses(nl2br($recruit_sec1), $allowed_html);
              }
            ?>
          </div>
        </div>

        <div class="recruit-details-box">
          <h2 class="fade-up">求める人物像</h2>
          <div class="recruit-details-box-text fade-up">
          <?php 
              $recruit_sec2 = get_post_meta(get_the_ID(), 'recruit_sec2', true);
              if ($recruit_sec2) {
                $allowed_html = array(
                  'div' => array('class' => array()),
                  'iframe' => array(
                    'src' => array(),
                    'width' => array(),
                    'height' => array(),
                    'style' => array(),
                    'allowfullscreen' => array(),
                    'loading' => array(),
                    'referrerpolicy' => array()
                  ),
                  'p' => array(),
                  'br' => array(),
                  'strong' => array(),
                  'em' => array(),
                  'ul' => array(),
                  'ol' => array(),
                  'li' => array(),
                  'a' => array('href' => array(), 'target' => array(), 'rel' => array()),
                  'span' => array('class' => array()),
                  'h1' => array(),
                  'h2' => array(),
                  'h3' => array(),
                  'h4' => array(),
                  'h5' => array(),
                  'h6' => array(),
                );
                echo wp_kses(nl2br($recruit_sec2), $allowed_html);
              }
            ?>
          </div>
        </div>

        <div class="recruit-details-box">
          <h2 class="fade-up">募集要項</h2>
          <div class="recruit-table fade-up">
            <table>
              <?php
                // recruit_details繰り返しフィールドの表示
                $details_count = 0;
                while (get_post_meta(get_the_ID(), 'recruit_details_' . $details_count . '_recruit_details_label', true) || get_post_meta(get_the_ID(), 'recruit_details_' . $details_count . '_recruit_details_disp', true)) {
                  $details_label = get_post_meta(get_the_ID(), 'recruit_details_' . $details_count . '_recruit_details_label', true);
                  $details_disp = get_post_meta(get_the_ID(), 'recruit_details_' . $details_count . '_recruit_details_disp', true);
                  
                  if ($details_label || $details_disp) :
              ?>
                <tr>
                  <?php if ($details_label) : ?>
                    <th>
                      <?php echo esc_html($details_label); ?>
                    </th>
                  <?php endif; ?>
                  <?php if ($details_disp) : ?>
                    <td>
                      <?php 
                        $allowed_html = array(
                          'div' => array('class' => array()),
                          'iframe' => array(
                            'src' => array(),
                            'width' => array(),
                            'height' => array(),
                            'style' => array(),
                            'allowfullscreen' => array(),
                            'loading' => array(),
                            'referrerpolicy' => array()
                          ),
                          'p' => array(),
                          'br' => array(),
                          'strong' => array(),
                          'em' => array(),
                          'ul' => array(),
                          'ol' => array(),
                          'li' => array(),
                          'a' => array('href' => array(), 'target' => array(), 'rel' => array()),
                          'span' => array('class' => array()),
                        );
                        echo wp_kses(nl2br($details_disp), $allowed_html);
                      ?>
                    </td>
                  <?php endif; ?>
                </tr>
              <?php
                  endif;
                  $details_count++;
                }
              ?>
              <tr>
                <th>受動喫煙防止措置</th>
                <td>敷地内禁煙</td>
              </tr>
              <tr>
                <th>育児休業取得実績</th>
                <td>あり</td>
              </tr>
              <tr>
                <th>転勤</th>
                <td>なし</td>
              </tr>
              <tr>
                <th>定年齢</th>
                <td>60歳</td>
              </tr>
              <tr>
                <th>再雇用</th>
                <td>あり</td>
              </tr>
              <?php
                // recruit_details2繰り返しフィールドの表示
                $details2_count = 0;
                while (get_post_meta(get_the_ID(), 'recruit_details2_' . $details2_count . '_recruit_details2_label', true) || get_post_meta(get_the_ID(), 'recruit_details2_' . $details2_count . '_recruit_details2_disp', true)) {
                  $details2_label = get_post_meta(get_the_ID(), 'recruit_details2_' . $details2_count . '_recruit_details2_label', true);
                  $details2_disp = get_post_meta(get_the_ID(), 'recruit_details2_' . $details2_count . '_recruit_details2_disp', true);
                  
                  if ($details2_label || $details2_disp) :
              ?>
                <tr>
                  <?php if ($details2_label) : ?>
                    <th>
                      <?php echo esc_html($details2_label); ?>
                    </th>
                  <?php endif; ?>
                  <?php if ($details2_disp) : ?>
                    <td>
                      <?php 
                        $allowed_html = array(
                          'div' => array('class' => array()),
                          'iframe' => array(
                            'src' => array(),
                            'width' => array(),
                            'height' => array(),
                            'style' => array(),
                            'allowfullscreen' => array(),
                            'loading' => array(),
                            'referrerpolicy' => array()
                          ),
                          'p' => array(),
                          'br' => array(),
                          'strong' => array(),
                          'em' => array(),
                          'ul' => array(),
                          'ol' => array(),
                          'li' => array(),
                          'a' => array('href' => array(), 'target' => array(), 'rel' => array()),
                          'span' => array('class' => array()),
                        );
                        echo wp_kses(nl2br($details2_disp), $allowed_html);
                      ?>
                    </td>
                  <?php endif; ?>
                </tr>
              <?php
                  endif;
                  $details2_count++;
                }
              ?>
            </table>
          </div>
        </div>
      </div>

      <div class="recruit-company">

        <div class="recruit-company-box">
          <h2 class="fade-up">会社情報</h2>
          <div class="recruit-table fade-up">
            <table>
              <tr>
                <th>企業名</th>
                <td>インバウンドテクノロジー株式会社</td>
              </tr>
              <tr>
                <th>業種</th>
                <td>人材派遣・人材紹介</td>
              </tr>
              <tr>
                <th>代表者名</th>
                <td>林 舟之輔</td>
              </tr>
              <tr>
                <th>所在地</th>
                <td>東京都中央区築地2-10-2 JP-BASE築地駅前ビル8階</td>
              </tr>
              <tr>
                <th>事業内容</th>
                <td>
                  ◆グローバルタレント紹介事業<br>
                  ◆訪日観光事業<br>
                  有料職業紹介事業<br>
                  許可番号 13-ユ-307699
                </td>
              </tr>
              <tr>
                <th>設立年月</th>
                <td>
                  2016年
                </td>
              </tr>
              <tr>
                <th>電話番号</th>
                <td>
                  03-6420-0580
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>