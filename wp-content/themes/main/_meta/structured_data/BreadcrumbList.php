{
  "@type": "BreadcrumbList",
  "@id": "<?php echo esc_url( $nowurl ); ?>#breadcrumb",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "<?php echo esc_js( get_bloginfo('name', 'display') ); ?>",
      "item": "<?php echo esc_url( home_url( '/' ) ); ?>"
    }
    <?php if(!(is_home() || is_front_page())) : ?>
      
      <?php if( is_category() ) : ?>
        <?php
          $cat = get_queried_object();
          $cat_name = $cat->name;
          $cat_url = get_category_link($cat->term_id);
        ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "name": "<?php echo esc_js($cat_name); ?>",
          "item": "<?php echo esc_url( $cat_url ); ?>"
        }
      <?php elseif( is_page() ) : ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "name": "<?php echo esc_js( get_the_title() ); ?>",
          "item": "<?php echo esc_url( $nowurl ); ?>"
        }
      <?php elseif( is_single() ) : ?>
        <?php
          $category = get_the_category();
          if (!empty($category)) {
            $cat = $category[0];
            $cat_name = $cat->name;
            $cat_url = get_category_link($cat->term_id);
          }
        ?>
        <?php if (!empty($category)) : ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "name": "<?php echo esc_js($cat_name); ?>",
          "item": "<?php echo esc_url( $cat_url ); ?>"
        },
        <?php endif; ?>
        {
          "@type": "ListItem",
          "position": <?php echo !empty($category) ? '3' : '2'; ?>,
          "name": "<?php echo esc_js( get_the_title() ); ?>",
          "item": "<?php echo esc_url( $nowurl ); ?>"
        }
      <?php elseif( is_tag() ) : ?>
        <?php
          $tag = get_queried_object();
          $tag_name = $tag->name;
          $tag_url = get_tag_link($tag->term_id);
        ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "name": "<?php echo esc_js($tag_name); ?>",
          "item": "<?php echo esc_url( $tag_url ); ?>"
        }
      <?php elseif( is_404() ) : ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "name": "404 NOT FOUND",
          "item": "<?php echo esc_url( $nowurl ); ?>"
        }
      <?php endif; ?>
      
    <?php endif; ?>
  ]
}