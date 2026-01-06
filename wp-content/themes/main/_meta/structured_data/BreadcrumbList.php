{
  "@type": "BreadcrumbList",
  "@id": "<?php echo $nowurl ?>#breadcrumb",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@type": "WebPage",
        "@id": "<?php echo esc_url( home_url( '/' ) ); ?>",
        "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
        "name": "インバウンドテクノロジー株式会社"
      }
    }
    <?php if(!(is_home() || is_front_page())) : ?>
      
      <?php if( is_category() || is_date() || is_page() ) : ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@type": "WebPage",
            "@id": "<?php echo $nowurl ?>",
            "url": "<?php echo $nowurl ?>",
            "name": "<?php echo $meta_title ?>"
          }
        }
      <?php endif; ?>

      <?php if( is_single() ) : ?>
        <?php
          $category = get_the_category();
          $cat = $category[0];
          
          //カテゴリー名
          $cat_name = $cat->name;
          
          //カテゴリーID
          $cat_id = $cat->cat_ID;
          
          //カテゴリースラッグ
          $cat_slug = $cat->slug;
        ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@type": "WebPage",
            "@id": "<?php echo esc_url( home_url( '/' ) ); ?><?php echo $cat_slug ?>",
            "url": "<?php echo esc_url( home_url( '/' ) ); ?><?php echo $cat_slug ?>",
            "name": "<?php echo $cat_name ?>"
          }
        },
        {
          "@type": "ListItem",
          "position": 3,
          "item": {
            "@type": "WebPage",
            "@id": "<?php echo $nowurl ?>",
            "url": "<?php echo $nowurl ?>",
            "name": "<?php echo $meta_title ?>"
          }
        }
      <?php endif; ?>
      
      
    <?php endif; ?>
  ]
}