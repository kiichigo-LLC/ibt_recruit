<?php

	get_header();

	$category = get_the_category();
	
	// recruitカテゴリの場合は専用テンプレートを使用
	$is_recruit = false;
	$is_member_interview = false;
	if( !empty($category) ) {
		foreach( $category as $cat ) {
			if( $cat->slug === 'recruit' ) {
				$is_recruit = true;
				break;
			}
		}
	}
	
	// member_interviewタグのチェック
	if( $is_recruit ) {
		$tags = get_the_tags();
		if( $tags ) {
			foreach( $tags as $tag ) {
				if( $tag->slug === 'member_interview' || $tag->name === 'member_interview' ) {
					$is_member_interview = true;
					break;
				}
			}
		}
		
		if( $is_member_interview ) {
			include( get_template_directory() . '/single-member_interview.php' );
			return;
		}
		
		include( get_template_directory() . '/single-recruit.php' );
		return;
	}

	$thumbnail_id = get_post_thumbnail_id();
	$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'learge' );
	$cat_id   = !empty($category) ? $category[0]->cat_ID : null;
	$cat_name = !empty($category) ? $category[0]->cat_name : null;
	$cat_slug = !empty($category) ? $category[0]->category_nicename : null;
	
	// タグを取得（タグ優先で表示）
	$tags = get_the_tags();
	$tag = null;
	if( !empty($tags) ) {
		// 優先タグ（例：「ブログ」）があればそれを優先、なければ最初のタグ
		$priority_tag_slug = 'blog'; // 優先したいタグのスラッグ
		foreach( $tags as $t ) {
			if( $t->slug === $priority_tag_slug ) {
				$tag = $t;
				break;
			}
		}
		// 優先タグが見つからない場合は最初のタグを使用
		if( !$tag ) {
			$tag = $tags[0];
		}
	}
	
	// 親ページを判別
	$parent_page = null;
	$parent_page_url = null;
	$parent_page_title = null;
	
	// カテゴリーで判別（採用企業様へ）
	if( !empty($category) ) {
		foreach( $category as $cat ) {
			if( in_array( $cat->slug, array( 'case-study', 'employment-of-foreigners' ) ) ) {
				$parent_page = 'hiring-companies';
				$parent_page_url = esc_url( home_url( '/hiring-companies/' ) );
				$parent_page_title = '採用企業様へ';
				break;
			}
		}
	}
	
	// タグで判別（候補者様へ）- カテゴリーで判別されていない場合のみ
	if( !$parent_page && $tag && $tag->slug === 'blog' ) {
		$parent_page = 'blog';
		$parent_page_url = esc_url( home_url( '/tag/blog/' ) );
		$parent_page_title = '候補者様へ';
	}

?>


<?php while( have_posts() ) : the_post(); ?>

<div class="ibt-single">
  <div class="ibt-single-inr flex flex-between flex-wrap">
    
    <div class="ibt-breadcrumb">
      <div class="ibt-breadcrumb-inr">
        <ol>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <?php if( $parent_page ) : ?>
            <li><a href="<?php echo $parent_page_url; ?>"><?php echo esc_html( $parent_page_title ); ?></a></li>
          <?php endif; ?>
          <li><?php the_title(); ?></li>
        </ol>
      </div>
    </div>


    <div class="ibt-single-main col-2">
      <div class="ibt-single-main-inr">

        <?php if(has_post_thumbnail()) { ?>
          <div class="ibt-single-img" style="background-image: url(<?php echo $eye_img[0] ?>);"></div>
        <?php } ?>
        
        <div class="ibt-single-main-content">
          <?php the_content(); ?>
        </div>

        <div class="ibt-single-main-pagenation">
          <div class="ibt-single-main-pagenation-inr">
            <div class="ibt-single-main-pagenation-prev">
              <?php previous_post_link( '%link', '<span>← 前へ</span><small>%title</small>', true); ?>
            </div>
            <div class="ibt-single-main-pagenation-next">
              <?php next_post_link( '%link', '<span>次へ →</span><small>%title</small>', true); ?>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php include('side.php'); ?>

  </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>