<?php
  // 各フィールド取得
  $recruit_title = get_post_meta(get_the_ID(), 'recruit_title', true) ?: '';
  $recruit_point = get_post_meta(get_the_ID(), 'recruit_point', true) ?: '';
  $member_interview_copy = get_post_meta(get_the_ID(), 'member_interview_copy', true) ?: '';
  $member_interview_panel = get_post_meta(get_the_ID(), 'member_interview_panel', true) ?: '';
  $member_interview_panel_group = get_post_meta(get_the_ID(), 'member_interview_panel_0_member_interview_group', true) ?: '';
  $member_interview_panel_post = get_post_meta(get_the_ID(), 'member_interview_panel_0_member_interview_post', true) ?: '';
  $member_interview_panel_name = get_post_meta(get_the_ID(), 'member_interview_panel_0_member_interview_name', true) ?: '';
  $member_interview_panel_join = get_post_meta(get_the_ID(), 'member_interview_panel_0_member_interview_join', true) ?: '';
  $member_interview = get_post_meta(get_the_ID(), 'member_interview', true) ?: '';
  $member_interview_article = get_post_meta(get_the_ID(), 'member_interview_article', true) ?: '';
  $member_interview_thumnail_raw = get_post_meta(get_the_ID(), 'member_interview_thumnail', true) ?: '';
  // 画像IDの場合はURLに変換
  if ($member_interview_thumnail_raw && is_numeric($member_interview_thumnail_raw)) {
    $member_interview_thumnail = wp_get_attachment_url($member_interview_thumnail_raw) ?: $member_interview_thumnail_raw;
  } else {
    $member_interview_thumnail = $member_interview_thumnail_raw;
  }
?>

