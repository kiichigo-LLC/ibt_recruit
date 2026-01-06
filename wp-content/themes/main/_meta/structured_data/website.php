{
  "@type": "WebSite",
  "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#website",
  "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
  "name": "<?php echo esc_attr('インバウンドテクノロジー株式会社(英名：Inbound Technology Inc.)') ?>",
  "publisher": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#organization"
  },
  "logo": {
    "@type": "ImageObject",
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#/schema/logo/image/",
    "url": "https://ib-tec.co.jp/wp-content/themes/main/img/main_logo.svg",
    "contentUrl": "https://ib-tec.co.jp/wp-content/themes/main/img/main_logo.svg",
    "width": 168,
    "height": 50
  },
  "potentialAction": {
    "@type": "SearchAction",
    "target": "<?php echo esc_url( home_url( '/' ) ); ?>?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}