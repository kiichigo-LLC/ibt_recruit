{
  "@type": "WebPage",
  "@id": "<?php echo esc_url( $nowurl ); ?>#webpage",
  "url": "<?php echo esc_url( $nowurl ); ?>",
  "inLanguage": "ja-JP",
  "name": "<?php echo isset($meta_title) ? esc_js($meta_title) : esc_js( get_bloginfo('name', 'display') ); ?>",
  "description": "<?php echo isset($meta_description) ? esc_js($meta_description) : esc_js( get_bloginfo('description', 'display') ); ?>",
  "isPartOf": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#website"
  },
  "about": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#organization"
  },
  "primaryImageOfPage": {
    "@type": "ImageObject",
    "@id": "<?php echo esc_url( $nowurl ); ?>#primaryimage",
    "url": "<?php echo esc_url( $meta_ogp ); ?>",
    "caption": "<?php echo isset($meta_title) ? esc_js($meta_title) : ''; ?>"
  },
  "datePublished": "<?php if ( is_single() || is_page() ) { echo get_the_date('c'); } else { echo date('c'); } ?>",
  "dateModified": "<?php if ( is_single() || is_page() ) { echo get_the_modified_date('c'); } else { echo date('c'); } ?>",
  "breadcrumb": {
    "@id": "<?php echo esc_url( $nowurl ); ?>#breadcrumb"
  }
}