<div class="ibt-news">
  <div class="ibt-news-inr">
    <div class="ibt-news-contents">
      <div class="ibt-news-ttl">
        <h2 class="ibt-ttl">
          NEWS
        </h2>
        <div class="ibt-news-btn">
          <a href="/news/" class="ibt-btn">
            <span>NEWS一覧</span>
          </a>
        </div>
      </div>
      <div class="ibt-news-list">
        <ul>
          <?php

          $newslist = get_posts( array(
            'category_name' => 'press-release',
            'order' => 'DESC',
            'posts_per_page' => 3
          ));
          foreach( $newslist as $post ):
          setup_postdata( $post );

          $ctg = get_the_category();
          $ctg = $ctg[0];
          $cat_name = $ctg -> name;
          $cat_slug = $ctg -> slug;

          ?>

            <li>
              <strong>
                <?php echo get_the_modified_date( 'Y.m.d' ); ?>
              </strong>
              <a href="<?php the_permalink(); ?>">
                <span>
                <?php the_title(); ?>
                </span>
              </a>
            </li>

          <?php
          endforeach;
          wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>