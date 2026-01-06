
<div class="pagenav">
  <div class="pagenav-inr">
    <div class="pagenav-prev">
      <?php
        $next_post = get_next_post(true, '', 'category');
        $next_post_title = $next_post->post_title;
        if ( mb_strlen( $next_post_title ) > 18 ) { $next_post_title = mb_substr( $next_post_title, 0, 18).'...'; }
          if ( !empty( $next_post ) ):
      ?>
        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo $next_post->post_title; ?>"><i class="fa fa-angle-left"></i> 前へ<?php //echo $next_post_title; ?> </a>
      <?php endif; ?>
    </div>
    <div class="pagenav-center"> ｜ </div>
    <div class="pagenav-next">
      <?php
        $previous_post = get_previous_post(true, '', 'category');
        $pre_post_title = $previous_post->post_title;
        if ( mb_strlen( $pre_post_title ) > 18 ) { $pre_post_title = mb_substr( $pre_post_title, 0, 18).'...'; }
        if ( !empty( $previous_post ) ):
      ?>
      <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" title="<?php echo $previous_post->post_title; ?>"><?php //echo $pre_post_title; ?>次へ <i class="fa fa-angle-right"></i></a>
      <?php endif; ?>
    </div>
  </div>
</div>
