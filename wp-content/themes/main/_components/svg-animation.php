<?php
// カテゴリーページまたはシングルページで使用するSVGアニメーション
// カテゴリーページの場合はカテゴリーID、シングルページの場合は投稿IDを使用
$unique_id = is_category() ? get_queried_object_id() : get_the_ID();
?>
<div class="recruit-svg-animation">
  <?php
    $svg_path = get_stylesheet_directory() . '/public/img/recruit-svg-animation.svg';
    if (file_exists($svg_path)) {
      $svg_content = file_get_contents($svg_path);
      $svg_content = str_replace('{{POST_ID}}', $unique_id, $svg_content);
      echo $svg_content;
    }
  ?>
</div>

