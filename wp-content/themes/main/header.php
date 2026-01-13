<?php
// エラーを出力する
ini_set('display_errors', "On");
?>
<?php ob_start(); ?>
<!doctype html>
<html class="is-loading">
	<head>
	
		<meta charset="utf-8">

		<!-- FOUC回避用スタイル -->
		<style>
			html.is-loading {
				visibility: hidden;
				opacity: 0;
				will-change: opacity, visibility;
				backface-visibility: hidden;
				transform: translateZ(0);
			}
		</style>

		<!-- Googleフォント非同期読込 -->
		<script>
			if ( typeof WebFontConfig === "undefined" ) {
				WebFontConfig = new Object();
			}
			WebFontConfig['google'] = {families: ['Barlow:300,400,500,600,700','Noto+Sans:300,400,500,600,700']};

			(function() {
				var wf = document.createElement( 'script' );
				wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'true';
				var s = document.getElementsByTagName( 'script' )[0];
				s.parentNode.insertBefore( wf, s );
			})();
		</script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-D8M48VM6NS"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-D8M48VM6NS');
		</script>
		
		<?php 

			// 変数を読み込む
			include(get_template_directory() . '/_utils/_var.php');

			//現在のURL取得
			$http = is_ssl() ? 'https' : 'http';
			$nowurl = $http . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

			//メタ情報
			$meta_sitetitle = get_bloginfo('name', 'display');
			$meta_sitedescription = get_bloginfo('description', 'display');
			$article_title = get_the_title();
			$article_date_jp = get_the_time('Y年m月d日');

			$meta_ogp = get_template_directory_uri() . '/img/ogp.jpg';

			//メタ情報生成
			if (is_home()) {
				$meta_title  = $meta_sitetitle;
				$meta_description  = $meta_sitedescription;
			} elseif (is_single()) {
				if (get_the_excerpt()) {
					$meta_sitedescription = get_the_excerpt();
				}
				if (has_post_thumbnail()) { //アイキャッチ画像を設定している場合
					$img_id = get_post_thumbnail_id ();
					$img_url = wp_get_attachment_image_src ($img_id, true);
					if ($img_url && isset($img_url[0])) {
					$meta_ogp = $img_url[0];
					} else {
						$meta_ogp = get_template_directory_uri() . '/img/ogp.jpg';
					}
				} else { //アイキャッチ画像を設定していない場合
					$meta_ogp = get_template_directory_uri() . '/img/ogp.jpg';
				}
				$meta_title  = $article_title . '｜' . $meta_sitetitle;
				$meta_description  = $meta_sitedescription;
			} elseif (is_category()) {
				$cat = get_queried_object();
				$cat_name = $cat -> name;
				$meta_title  = $cat_name . '｜' . $meta_sitetitle;
				$meta_description  = $meta_sitedescription;
			} elseif (is_tag()) {
				$article_title = single_tag_title( '' , false );;
				$meta_title  = $article_title . '｜' . $meta_sitetitle;
				$meta_description  = $meta_sitedescription;
			} elseif (is_page()) {
				$meta_title  = $article_title . '｜' . $meta_sitetitle;
				$meta_description  = $meta_sitedescription;
			} elseif(is_404()) {
				$meta_title  = '404 NOT FOUND' . $meta_sitetitle;
				$meta_description  = 'お探しのページは見つかりませんでした。';
			} else {
				$meta_title  = $meta_sitetitle;
				$meta_description  = $meta_sitedescription;
			}

		?>

		<!-- タイトル -->
		<title><?php echo $meta_title ?></title>

		<!-- ディスクリプション -->
		<meta name="description" content="<?php echo $meta_description ?>">

		<!-- viewport -->
		<meta name="viewport" content="width=device-width">

		<!-- Google対策 -->
		<meta name="google" content="notranslate">
		<meta name="robots" content="index, follow, noodp">

		<!-- Facebook用 -->
		<meta property="og:title" content="<?php echo $meta_title ?>">
		<meta property="og:description" content="<?php echo $meta_description ?>">
		<meta property="og:site_name" content="<?php echo $meta_sitetitle ?>">
		<meta property="og:type" content="article">
		<meta property="og:url" content="<?php echo $nowurl ?>">
		<meta property="og:image" content="<?php echo $meta_ogp ?>">

		<!-- Twitter用 -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@Kiichigo_llc">
		<meta name="twitter:title" content="<?php echo $meta_title ?>">
		<meta name="twitter:description" content="<?php echo $meta_description ?>">
		<meta name="twitter:image:src" content="<?php echo $meta_ogp ?>">
		<meta name="twitter:url" content="<?php echo $nowurl ?>">

		<!-- ファビコン -->
		<link rel="icon" type="image/x-icon" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon.ico">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon-16x16.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon-192x192.png">
		<link rel="shortcut icon" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon.ico">

		<!-- IOS用 -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/appHomeIcon.png">

		<!-- URL正規化 -->
		<link rel="canonical" href="<?php echo esc_url( $nowurl ); ?>">

		<!-- thumbnail -->
		<meta name="thumbnail" content="<?php echo $meta_ogp ?>">

		<!-- スタイル -->
		<link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<!-- Splide.js CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

		<!-- スタイル -->
		<link rel="stylesheet" href="http://localhost/ibt/wp/wp-content/themes/main/css/newstyle.css?v<?php echo $vcash ?>">
    <link rel="stylesheet" href="http://localhost/ibt/recruit/wp-content/themes/main/public/css/style.css?v<?php echo $vcash ?>">
		<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/public/css/style.css?v<?php echo $vcash ?>"> -->
		
		<?php //wp_head(); ?>

		<!-- 構造化データ -->
		<?php include('_meta/structured_data.php'); ?>

		<script>
			window.addEventListener("load", function(){
				setTimeout(() => {
					document.documentElement.classList.remove("is-loading");
				}, 200);
			});
		</script>

	</head>

	<body class="ibt">
		<div class="ibt-wrap<?php if (is_home()): ?> home<?php endif; ?>">
			
			<header>

				<?php include(get_template_directory() . '/_common/header.php'); ?>

			</header>

			<main>