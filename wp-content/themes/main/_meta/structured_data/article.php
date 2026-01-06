{
  "@type": "Article",
  "@id": "<?php echo $nowurl ?>#article",
  "isPartOf": {
    "@id": "<?php echo $nowurl ?>#webpage"
  },
  "author": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#author",
    "name": "<?php echo esc_attr('インバウンドテクノロジー株式会社') ?>",
    "url": "<?php echo esc_url( home_url( '/' ) ); ?>"
  },
  "publisher": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#organization"
  },
  "headline": "<?php echo isset($meta_title) ? esc_attr($meta_title) : '' ?>",
  "datePublished": "<?php echo get_the_date(DATE_ISO8601); ?>",
  "dateModified": "<?php if ( get_the_date() != get_the_modified_time() ){ the_modified_date(DATE_ISO8601); } else { echo get_the_date(DATE_ISO8601); } ?>",
  "mainEntityOfPage": "<?php echo $nowurl ?>#webpage",
  "url": "<?php echo $nowurl ?>",
  "image": {
    "@id": "<?php echo $nowurl ?>#primaryimage"
  },
  "keywords": "<?php echo isset($meta_description) ? esc_attr($meta_description) : '' ?>"
}