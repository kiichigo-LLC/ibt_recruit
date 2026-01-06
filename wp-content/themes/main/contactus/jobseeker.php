<?php

/* Template Name: お問い合わせ/求職者の方用 */

get_header();
  
?>

<div class="ibt-contactus top">
  <div class="ibt-contactus-inr">

    <div class="ibt-contactus-head">
      <h2 class="ibt-contactus-ttl ibt-ttl">
        CONTACT
      </h2>

      <div class="ibt-contactus-txt">
        <b>お仕事をお探しの方</b>はこちらのフォームよりお問い合わせください。<br>
        内容を確認の上、担当者よりご連絡させていただきます。
      </div>
    </div>

    <div class="ibt-contactus-main">
      <div class="ibt-contactus-main-inr">

        <div class="ibt-contactus-main-nav fix unpin">
          <div class="ibt-contactus-main-nav-btn fix">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/company/">
              <span>企業の方はこちら</span>
            </a>
          </div>
        </div>

        <div class="ibt-contactus-main-form">
          <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
          <script>
            hbspt.forms.create({
              region: "na1",
              portalId: "44737757",
              formId: "88001c51-bb3c-4dea-ade2-f52878dae013"
            });
          </script>
        </div>

      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>