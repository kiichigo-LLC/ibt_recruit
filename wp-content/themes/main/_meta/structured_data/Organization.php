{
  "@type": "Organization",
  "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#organization",
  "name": "インバウンドテクノロジー株式会社",
  "legalName": "インバウンドテクノロジー株式会社",
  "alternateName": "Inbound Technology Inc.",
  "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
  "logo": {
    "@type": "ImageObject",
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#/schema/logo/image/",
    "url": "<?php echo esc_url( get_template_directory_uri() ); ?>/img/main_logo.svg",
    "contentUrl": "<?php echo esc_url( get_template_directory_uri() ); ?>/img/main_logo.svg",
    "width": 168,
    "height": 50,
    "caption": "インバウンドテクノロジー株式会社"
  },
  "image": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#/schema/logo/image/"
  },
  "foundingDate": "2016",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "JP",
    "addressRegion": "東京都",
    "addressLocality": "中央区",
    "streetAddress": "築地2-10-2 JP-BASE築地駅前ビル8階"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+81-3-6420-0580",
    "contactType": "customer service"
  },
  "sameAs": [
    "https://www.facebook.com/we.are.inbound.technology",
    "https://www.linkedin.com/company/inboundtechnology"
  ],
  "founder": {
    "@type": "Person",
    "name": "林 舟之輔"
  },
  "description": "<?php echo isset($meta_sitedescription) ? esc_js($meta_sitedescription) : esc_js('人材派遣・人材紹介事業を展開するインバウンドテクノロジー株式会社の採用サイトです。') ?>"
}