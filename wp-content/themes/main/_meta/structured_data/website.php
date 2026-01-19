{
  "@type": "WebSite",
  "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#website",
  "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
  "name": "<?php echo esc_js( get_bloginfo('name', 'display') ); ?>",
  "description": "<?php echo esc_js( get_bloginfo('description', 'display') ); ?>",
  "inLanguage": "ja-JP",
  "publisher": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#organization"
  },
  "logo": {
    "@type": "ImageObject",
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#/schema/logo/image/",
    "url": "<?php echo esc_url( get_template_directory_uri() ); ?>/img/main_logo.svg",
    "contentUrl": "<?php echo esc_url( get_template_directory_uri() ); ?>/img/main_logo.svg",
    "width": 168,
    "height": 50
  },
  "potentialAction": {
    "@type": "SearchAction",
    "target": {
      "@type": "EntryPoint",
      "urlTemplate": "<?php echo esc_url( home_url( '/' ) ); ?>?s={search_term_string}"
    },
    "query-input": "required name=search_term_string"
  }
}