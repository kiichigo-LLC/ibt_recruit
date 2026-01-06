<div class="ibt-side">
  <div class="ibt-side-inr">

    <?php
      global $post;
      
      $current_parent_page = null;
      $side_title = '最新記事'; // デフォルトタイトル
      $exclude_post_id = null;
      
      // 読み込み元を判別
      // 1. 固定ページテンプレート「採用企業さまへ」の場合
      if( is_page() ) {
        $page_slug = get_post_field( 'post_name', get_the_ID() );
        $page_template = get_page_template_slug();
        if( $page_slug === 'hiring-companies' || 
            $page_template === '_page/hiring-companies.php' ||
            strpos( $_SERVER['REQUEST_URI'], '/hiring-companies' ) !== false ) {
          $current_parent_page = 'hiring-companies';
          $side_title = '採用企業様へ';
        }
      }
      // 2. タグアーカイブ「blog」の場合
      elseif( is_tag( 'blog' ) || ( is_tag() && get_queried_object() && get_queried_object()->slug === 'blog' ) ) {
        $current_parent_page = 'blog';
        $side_title = '候補者様へ';
      }
      // 3. 単一記事ページの場合
      elseif( is_single() && isset( $post->ID ) ) {
        $current_category = get_the_category( $post->ID );
        $current_tags = get_the_tags( $post->ID );
        $exclude_post_id = $post->ID;
        
        // カテゴリーで判別（採用企業様へ）
        if( !empty($current_category) ) {
          foreach( $current_category as $cat ) {
            if( in_array( $cat->slug, array( 'case-study', 'employment-of-foreigners' ) ) ) {
              $current_parent_page = 'hiring-companies';
              $side_title = '採用企業様へ';
              break;
            }
          }
        }
        
        // タグで判別（候補者様へ）- カテゴリーで判別されていない場合のみ
        if( !$current_parent_page && !empty($current_tags) ) {
          foreach( $current_tags as $t ) {
            if( $t->slug === 'blog' ) {
              $current_parent_page = 'blog';
              $side_title = '候補者様へ';
              break;
            }
          }
        }
      }
    ?>
    
    <div class="ibt-side-title">
      <span><?php echo esc_html( $side_title ); ?>の最新記事</span>
    </div>

    <div class="ibt-side-box">
      <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1 ; ?>
      <?php
      
      // 親ページに応じてクエリをフィルタリング
      $args = array(
        'paged' => $paged,
        'posts_per_page' => 5,
        'post_status' => 'publish'
      );
      
      // 単一記事ページの場合は現在の記事を除外
      if( $exclude_post_id ) {
        $args['post__not_in'] = array( $exclude_post_id );
      }
      
      if( $current_parent_page === 'hiring-companies' ) {
        // 採用企業様へ：カテゴリーでフィルタ
        $args['category_name'] = 'case-study,employment-of-foreigners';
      } elseif( $current_parent_page === 'blog' ) {
        // 候補者様へ：タグでフィルタ
        $args['tag'] = 'blog';
      }
      
      $the_query = new WP_Query( $args );
      ?>
      <?php if ($the_query->have_posts()): ?>
        <?php while($the_query->have_posts()): $the_query->the_post(); 

        $category = get_the_category();
        $cat_id   = !empty($category) ? $category[0]->cat_ID : null;
        $cat_name = !empty($category) ? $category[0]->cat_name : null;
        $cat_slug = !empty($category) ? $category[0]->category_nicename : null;

        $thumbnail_id = get_post_thumbnail_id();
        $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'learge' );

        ?>

          <div class="ibt-side-box-item">
            <a href="<?php the_permalink(); ?>">
              <div class="ibt-side-box-item-img"<?php if(has_post_thumbnail()) { ?> style="background-image: url(<?php echo $eye_img[0] ?>);"<?php } ?>></div>
              <div class="ibt-side-box-item-title">
                <span><?php the_title(); ?></span>
              </div>
            </a>
          </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else: ?>
        <p>投稿がありません。</p>   
      <?php endif; ?>

    </div>

  </div>
</div>