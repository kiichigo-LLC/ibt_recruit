{
  "@type": "WebPage",
  "@id": "<?php echo $nowurl ?>#webpage",
  "url": "<?php echo $nowurl ?>",
  "inLanguage": "jp",
  "name": "<?php echo isset($meta_title) ? esc_attr($meta_title) : '' ?>",
  "isPartOf": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#website"
  },
  "image": {
    "@type": "ImageObject",
    "@id": "<?php echo $nowurl ?>#primaryimage",
    "url": "<?php echo $meta_ogp ?>",
    "caption": "<?php echo esc_attr('インバウンドテクノロジー株式会社(英名：Inbound Technology Inc.)') ?>"
  },
  "primaryImageOfPage": {
    "@id": "<?php echo $nowurl ?>#primaryimage"
  },
  "datePublished": "<?php echo get_the_date(DATE_ISO8601); ?>",
  "dateModified": "<?php if ( get_the_date() != get_the_modified_time() ){ the_modified_date(DATE_ISO8601); } else { echo get_the_date(DATE_ISO8601); } ?>",
  "description": "<?php echo isset($meta_description) ? esc_attr($meta_description) : '' ?>",
  "breadcrumb": {
    "@id": "<?php echo $nowurl ?>#breadcrumb"
  }
}