<?php

/* Template Name: お問い合わせ */

	get_header();

  	// SCF変数の読み込み
	include(get_template_directory() . '/_utils/_scf.php');

?>

<?php include(get_template_directory() . '/_components/svg-animation.php'); ?>


<div class="ibt-contents recruit">
  <div class="ibt-contents-inr recruit-inr">
    
    <div class="ibt-contents-head recruit-head">
      <h1 class="recruit-head-ttl">
        応募フォーム
      </h1>
    </div>

    <div class="recruit-apply">

      <script charset="utf-8" type="text/javascript" src="//js-na2.hsforms.net/forms/embed/v2.js"></script>
      <script>
        hbspt.forms.create({
          portalId: "44737757",
          formId: "9efa2d70-47cd-46f4-94f8-85b9ad68ec46",
          region: "na2"
        });
      </script>

    </div>

  </div>
</div>

<?php get_footer(); ?>

