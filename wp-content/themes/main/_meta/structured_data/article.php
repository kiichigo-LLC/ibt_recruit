{
  "@type": "Article",
  "@id": "<?php echo esc_url( $nowurl ); ?>#article",
  "headline": "<?php echo isset($article_title) ? esc_js($article_title) : esc_js( get_the_title() ); ?>",
  "description": "<?php echo isset($meta_description) ? esc_js($meta_description) : ''; ?>",
  "url": "<?php echo esc_url( $nowurl ); ?>",
  "datePublished": "<?php echo get_the_date('c'); ?>",
  "dateModified": "<?php echo get_the_modified_date('c'); ?>",
  "author": {
    "@type": "Organization",
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#organization",
    "name": "インバウンドテクノロジー株式会社"
  },
  "publisher": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#organization"
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo esc_url( $nowurl ); ?>#webpage"
  },
  "image": {
    "@type": "ImageObject",
    "@id": "<?php echo esc_url( $nowurl ); ?>#primaryimage",
    "url": "<?php echo esc_url( $meta_ogp ); ?>",
    "caption": "<?php echo isset($article_title) ? esc_js($article_title) : ''; ?>"
  },
  "inLanguage": "ja-JP"
}