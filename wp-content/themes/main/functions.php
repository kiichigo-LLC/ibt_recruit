<?php

//メンテナンスモード
function maintenance_mode()
{
	if (!current_user_can('edit_themes') || !is_user_logged_in()) {
		wp_die('メンテナンス中');
	}
}
//add_action('get_header', 'maintenance_mode');


add_filter( 'big_image_size_threshold', '__return_false' );

// home.phpのページングで常に1ページ目が表示されるのを解消
add_action( 'parse_query', 'my_parse_query' );
function my_parse_query( $query ) {
  if ( ! isset( $query->query_vars['paged'] ) && isset( $query->query_vars['page'] ) )
    $query->query_vars['paged'] = $query->query_vars['page'];
}


//Lazy loadingを無効
add_filter('wp_lazy_loading_enabled', '__return_false');


add_action('wp_enqueue_scripts', 'remove_my_global_styles');
function remove_my_global_styles()
{
	wp_dequeue_style('global-styles');
}


//固定ページで抜粋を使えるようにする
add_post_type_support('page', 'excerpt');


//<link rel='dns-prefetch' href='//s.w.org' />を削除
function remove_dns_prefetch($hints, $relation_type)
{
	if ('dns-prefetch' === $relation_type) {
		return array_diff(wp_dependencies_unique_hosts(), $hints);
	}
	return $hints;
}
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);



// wp-block-library-css 削除
function dequeue_plugins_style()
{
	//プラグインIDを指定し解除する
	wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'dequeue_plugins_style', 9999);




// ログイン画面
function custom_login_logo()
{
	echo '<style type="text/css">body {background:#fff !important;} h1 a { background: url(' . get_bloginfo('template_directory') . '/img/loginlogo.png) 50% 50% no-repeat !important; background-size:70% !important; width:300px !important;" }</style>';
}
add_action('login_head', 'custom_login_logo');


// 管理バーの項目を非表示
function remove_admin_bar_menu($wp_admin_bar)
{
	$wp_admin_bar->remove_menu('wp-logo'); // WordPressシンボルマーク
	$wp_admin_bar->remove_menu('my-account'); // マイアカウント
}
add_action('admin_bar_menu', 'remove_admin_bar_menu', 70);


// 管理バーのヘルプメニューを非表示にする
function my_admin_head()
{
	echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
}
add_action('admin_head', 'my_admin_head');


// 管理バーにログアウトを追加
function add_new_item_in_admin_bar()
{
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(
		array(
			'id' => 'new_item_in_admin_bar',
			'title' => __('ログアウト'),
			'href' => wp_logout_url()
		)
	);
}
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');



/* ブロックエディターに適用するCSSとJSを登録 */
// add_action( 'enqueue_block_editor_assets', 'wt_add_block_editor_style' );
// function wt_add_block_editor_style() {
//     wp_enqueue_style( 'wt-block-editor-style', get_stylesheet_directory_uri() . '/css/editor-style.css', array( 'wp-edit-blocks' ), '1.0.0' );
// 		wp_enqueue_script( 'wt-block-editor-script', get_stylesheet_directory_uri() . '/js/script.min.js', array( 'wp-edit-blocks' ), '1.0.0' );
// }
function add_my_assets_to_block_editor() {
	wp_enqueue_style( 'my-gutenberg-style', get_stylesheet_directory_uri() . '/css/editor-style.css');
	wp_enqueue_script( 'my-gutenberg-script', get_stylesheet_directory_uri() . '/js/editor-script.js');
}
//add_action( 'enqueue_block_editor_assets', 'add_my_assets_to_block_editor' );


// 文字数制限を110から200に変更
add_filter( 'excerpt_length', function( $length ){
  return 999;
}, 999 );


/***********************************************
wp_head削除
 ***********************************************/
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_footer', 'wp_oembed_add_host_js');
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
function my_delete_local_jquery()
{
	wp_deregister_script('jquery');
}
// Since 4.4
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'rest_output_link_wp_head');
/* インラインスタイル削除 */
function remove_recent_comments_style()
{
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');


// メインコンテンツの幅を指定
if (!isset($content_width))
	$content_width = 600;

// RSS2 の feed リンクを出力
add_theme_support('automatic-feed-links');


// カスタムメニューを有効化
add_theme_support('menus');

/* デフォルトの gallery ショートコードを削除 */
add_filter('use_default_gallery_style', '__return_false');


// ID を削除する 
add_filter('nav_menu_item_id', 'removeId', 10);
function removeId($id)
{
	return $id = array();
}


// カスタムメニューの「場所」を設定
register_nav_menu('header-navi', 'ヘッダーのナビゲーション');


// サイドバーウィジットを有効化
register_sidebar(
	array(
		'name' => 'サイドバーウィジット-1',
		'id' => 'sidebar-1',
		'description' => 'サイドバーのウィジットエリアです。',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	)
);

// バージョン非表示
remove_action('wp_head', 'wp_generator');


/* アイキャッチ画像 */
add_theme_support('post-thumbnails', array('post'));
set_post_thumbnail_size(400, 325, true);
add_image_size('thumb200', 200, 200, true);
add_image_size('thumb150', 150, 150, true);


/* アドミンバー非表示 */
function disable_admin_bar()
{
	return false;
}
add_filter('show_admin_bar', 'disable_admin_bar');


/* フッター文字変更 */
function remove_footer_admin()
{
	echo 'お問い合わせは<a href="mailto:info@kiichigo.work">合同会社キイチゴ</a>まで';
}
//add_filter('admin_footer_text', 'remove_footer_admin');


/* 不要なもの */
function hide_profile_fields($contactmethods)
{
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	return $contactmethods;
}
add_filter('user_contactmethods', 'hide_profile_fields');


//画像挿入時にリンク先が画像の時のみ、aタグに独自クラスを付与
//add_filter( 'image_send_to_editor', 'addClass' );
//function addClass( $html ) {
//    $class = 'trailer'; // ←付けたいクラス名が入ります。
//    if(preg_match('/<a href="https?:\/\/+[-_.\/a-zA-Z0-9]+(?:png|jpg|jpeg|gif)"><img/' , $html)){
//        $html = str_replace( '<a ', '<a class="'. $class. '" ', $html );
//    }
//    return $html;
//}
/**
 * 画像挿入時にwidthとheightを削除する
 */
function remove_width_attribute($html)
{
	$html = preg_replace('/(width|height)="\d*"\s/', "", $html);
	return $html;
}
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);


//pタグを消す
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


//WordPress5.5.0以降での画像タグのwidth、height属性の削除
add_filter( 'wp_img_tag_add_width_and_height_attr', '__return_false' );


//ビジュアルエディタのフォント変更
add_editor_style('css/editor_style.css');
function custom_editor_settings($initArray)
{
	$initArray['body_class'] = 'editor-area'; //オリジナルのクラスを設定する
	return $initArray;
}
add_filter('tiny_mce_before_init', 'custom_editor_settings');


function mysetup()
{
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mysetup');

//img secret 削除
add_filter('wp_calculate_image_srcset_meta', '__return_null');

function is_mobile()
{
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$m = stripos($_SERVER["HTTP_USER_AGENT"], 'mobile');
		$i = stripos($_SERVER["HTTP_USER_AGENT"], 'ipad');
		if (($m !== false) && ($i === false)) {
			return true;
		} else {
			return false;
		}
	}
}


// wp-blockクラスを削除するフィルターフックを追加
function remove_wp_block_class( $block_content ) {
	// wp-blockクラスを削除
	$block_content = preg_replace('/class="[^"]*\bwp-block\b[^"]*"/', '', $block_content);
	$block_content = preg_replace('/class="[^"]*\bwp-image\b[^"]*"/', '', $block_content);
	return $block_content;
}
//add_filter( 'render_block', 'remove_wp_block_class' );



// 月別アーカイブ一覧ソースカスタマイズ
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
	$output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/','</a><span>（$2）</span>',$output);
	return $output;
}


/***********************************************
人気記事出力用関数
***********************************************/
function post_view_count() {
  global $post;
  $post_id = $post->ID;
  $meta_key = 'post_views_count';
  $views = get_post_meta($post_id, $meta_key, true);

  if ($views === '') {
    delete_post_meta($post_id, $meta_key);
    add_post_meta($post_id, $meta_key, '0');
  } else {
    $views++;
    update_post_meta($post_id, $meta_key, $views);
  }
}




/**
 * Add prev and next links to a numbered page link list
 * ページング両方表示
 */
// add_filter('wp_link_pages_args','wp_link_pages_args_prevnext_add');
// function wp_link_pages_args_prevnext_add($args)
// {
// 	global $page, $numpages, $more, $pagenow;

// 	if (!$args['next_or_number'] == 'next_and_number') 
// 			return $args; # exit early

// 	$args['next_or_number'] = 'number'; # keep numbering for the main part
// 	if (!$more)
// 			return $args; # exit early

// 	if($page-1) # there is a previous page
// 			$args['before'] .= _wp_link_page($page-1)
// 					. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
// 			;

// 	if ($page<$numpages) # there is a next page
// 			$args['after'] = _wp_link_page($page+1)
// 					. $args['link_before'] . ' ' . $args['nextpagelink'] . $args['link_after'] . '</a>'
// 					. $args['after']
// 			;

// 	return $args;
// }


/***********************************************
人気記事出力用関数
***********************************************/
//クローラーのアクセス判別
// function is_bot() {
  
//   $ua = $_SERVER['HTTP_USER_AGENT'];
  
//   $bot = array(
//         "googlebot",
//         "msnbot",
//         "yahoo"
//   );
  
//   foreach( $bot as $bot ) {
//     if (stripos( $ua, $bot ) !== false){
//       return true;
//     }
//   }
  
//   return false;
  
// }
  
  
// //アクセス数を保存
// function set_post_views() {
  
//   if(!is_user_logged_in() && !is_bot()) {
  
//     if(is_single()) {
  
//       $post_id = get_the_ID();
  
//       $count_key = 'post_views_count';
//       $count = get_post_meta($post_id, $count_key, true);
  
//       if(empty($count)) {
  
//         delete_post_meta($post_id, $count_key);
//         add_post_meta($post_id, $count_key, 1);
  
//       } else {
  
//         $count = $count + 1;
  
//         update_post_meta($post_id, $count_key, $count);
  
//       }
  
//     }
  
//   }
  
// }
// add_action('wp_head', 'set_post_views');



/***********************************************
独自カスタムフィールド追加
 ***********************************************/
// // 固定カスタムフィールドボックス
// function add_book_fields() {
// 	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
// 	//第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
// 	//第5引数はnormalの他にsideとadvancedがあります。
// 	add_meta_box( 'book_setting', '本の情報', 'insert_book_fields', 'post', 'normal');
// }
// add_action('admin_menu', 'add_book_fields');


// // カスタムフィールドの入力エリア
// function insert_book_fields() {
// 	global $post;

// 	//下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
// 	echo '題名： <input type="text" name="book_name" value="'.get_post_meta($post->ID, 'book_name', true).'" size="50" /><br>';
// 	echo '作者： <input type="text" name="book_author" value="'.get_post_meta($post->ID, 'book_author', true).'" size="50" /><br>';
// 	echo '価格： <input type="text" name="book_price" value="'.get_post_meta($post->ID, 'book_price', true).'" size="50" />　<br>';

// 	if( get_post_meta($post->ID,'book_label',true) == "is-on" ) {
// 		$book_label_check = "checked";
// 	}//チェックされていたらチェックボックスの$book_label_checkの場所にcheckedを挿入
// 	echo 'ベストセラーラベル： <input type="checkbox" name="book_label" value="is-on" '.$book_label_check.' ><br>';
// }


// // カスタムフィールドの値を保存
// function save_book_fields( $post_id ) {
// 	if(!empty($_POST['book_name'])){ //題名が入力されている場合
// 		update_post_meta($post_id, 'book_name', $_POST['book_name'] ); //値を保存
// 	}else{ //題名未入力の場合
// 		delete_post_meta($post_id, 'book_name'); //値を削除
// 	}

// 	if(!empty($_POST['book_author'])){
// 		update_post_meta($post_id, 'book_author', $_POST['book_author'] );
// 	}else{
// 		delete_post_meta($post_id, 'book_author');
// 	}

// 	if(!empty($_POST['book_price'])){
// 		update_post_meta($post_id, 'book_price', $_POST['book_price'] );
// 	}else{
// 		delete_post_meta($post_id, 'book_price');
// 	}

// 	if(!empty($_POST['book_label'])){
// 		update_post_meta($post_id, 'book_label', $_POST['book_label'] );
// 	}else{
// 		delete_post_meta($post_id, 'book_label');
// 	}
// }
// add_action('save_post', 'save_book_fields');

// ヒーローアニメーション用JavaScriptを登録
function enqueue_hero_animation_scripts() {
    if (is_home() || is_front_page()) {
        wp_enqueue_script('hero-animation', get_template_directory_uri() . '/js/hero-animation.js', array(), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_hero_animation_scripts');

// ユーザー登録を無効化（シンプル版）
add_filter('option_users_can_register', '__return_false');

/**
 * 開発モード用のテンプレートディレクトリURI取得
 * URLパラメータに ?host=local がある場合はローカルホストのパスを返す
 */
$local_path_handler = function($dir_uri) {
	// URLパラメータで開発モードを判定
	if (isset($_GET['host']) && $_GET['host'] === 'local') {
		// テーマディレクトリの物理パスを取得
		$template_dir = get_template_directory();
		$doc_root = $_SERVER['DOCUMENT_ROOT'];
		
		// ドキュメントルートからの相対パスを取得
		if (strpos($template_dir, $doc_root) === 0) {
			$relative_path = str_replace($doc_root, '', $template_dir);
			// パスの区切り文字を統一（Windows対応）
			$relative_path = str_replace('\\', '/', $relative_path);
			// 先頭のスラッシュを削除（既に含まれている場合）
			$relative_path = ltrim($relative_path, '/');
			// ローカルホストからテーマディレクトリまでの完全なパスを返す
			return 'http://localhost/ibt/wp/' . $relative_path;
		}
		
		// フォールバック: デフォルトのローカルパス
		$relative_path = str_replace($doc_root, '', $template_dir);
		$relative_path = str_replace('\\', '/', $relative_path);
		$relative_path = ltrim($relative_path, '/');
		return 'http://localhost/ibt/wp/' . $relative_path;
	}
	
	// 通常のパスを返す
	return $dir_uri;
};

add_filter('template_directory_uri', $local_path_handler);
add_filter('stylesheet_directory_uri', $local_path_handler);
