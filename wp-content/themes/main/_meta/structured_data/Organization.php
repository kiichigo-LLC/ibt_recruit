{
  "@type": [
    "Organization",
    "Brand"
  ],
  "@id": "https://ib-tec.co.jp/#organization",
  "name": "<?php echo isset($meta_title) ? esc_js($meta_title) : '' ?>",
  "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
  "logo": {
    "@type": "ImageObject",
    "inLanguage": "jp",
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#/schema/logo/image/",
    "url": "https://ib-tec.co.jp/wp-content/themes/main/img/main_logo.svg",
    "contentUrl": "https://ib-tec.co.jp/wp-content/themes/main/img/main_logo.svg",
    "width": 168,
    "height": 50,
    "caption": "<?php echo esc_attr('インバウンドテクノロジー株式会社') ?>"
  },
  "image": {
    "@id": "<?php echo esc_url( home_url( '/' ) ); ?>#/schema/logo/image/"
  },
  "sameAs": [
    "https://www.facebook.com/we.are.inbound.technology",
    "https://www.linkedin.com/company/inboundtechnology"
  ],
  "founder": {
    "@type": "Person",
    "name": "<?php echo esc_attr('インバウンドテクノロジー') ?>",
    "url": "https://ib-tec.co.jp/",
    "sameAs": "https://ib-tec.co.jp/"
  },
  "foundingDate": "2003-06-20",
  "numberOfEmployees": 108,
  "slogan": "WORK WITHOUT BORDERS",
  "description": "<?php echo isset($meta_description) ? esc_attr($meta_description) : '' ?>",
  "legalName": "<?php echo esc_attr('インバウンドテクノロジー株式会社') ?>",
  "parentOrganization": {
    "@type": "Organization",
    "name": "<?php echo esc_attr('インバウンドテクノロジー株式会社') ?>",
    "description": "<?php echo esc_attr('外国人にとって、なくてはならないインフラサービスを起こす。外国人向けの住まいの提供・ホテル・投資・クレジットカードの発行・携帯の発行・SIMの取得など、外国人に必要なインフラを当社がすべて提供できる、プラットフォーム事業を展開しています。') ?>",
    "url": "https://ib-tec.co.jp/",
    "sameAs": [
      "https://ib-tec.co.jp/"
    ],
    "logo": "https://ib-tec.co.jp/images/ob_logo.svg"
  },
  "memberOf": {
    "@type": "Organization",
    "name": "<?php echo esc_attr('インバウンドテクノロジー株式会社') ?>",
    "description": "<?php echo esc_attr('外国人にとって、なくてはならないインフラサービスを起こす。外国人向けの住まいの提供・ホテル・投資・クレジットカードの発行・携帯の発行・SIMの取得など、外国人に必要なインフラを当社がすべて提供できる、プラットフォーム事業を展開しています。') ?>",
    "url": "https://ib-tec.co.jp/",
    "sameAs": [
      "https://ib-tec.co.jp/"
    ],
    "logo": "https://ib-tec.co.jp/wp-content/themes/main/img/main_logo.svg"
  }
}