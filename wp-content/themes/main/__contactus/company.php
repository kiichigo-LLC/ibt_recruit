<?php

/* Template Name: お問い合わせ/企業の方用改修 */

get_header();
  
?>

<div class="ibt-contactus">
  <div class="ibt-contactus-inr">

    <div class="ibt-contactus-head">
      <h2 class="ibt-contactus-ttl ibt-ttl">
        CONTACT
      </h2>

      <div class="ibt-contactus-txt">
        <b>企業の方</b>はこちらのフォームよりお問い合わせください。<br>
        内容を確認の上、担当者よりご連絡させていただきます。
      </div>
    </div>

    <div class="ibt-contactus-main">
      <div class="ibt-contactus-main-inr">

        <div class="ibt-contactus-main-nav fix">
          <div class="ibt-contactus-main-nav-btn fix">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/jobseeker/">
              <span>求職者の方はこちら</span>
            </a>
          </div>
        </div>

        <div class="ibt-contactus-main-form">
          <script charset="utf-8" type="text/javascript" src="//js-na2.hsforms.net/forms/embed/v2.js"></script>
          <script>
            hbspt.forms.create({
              portalId: "44737757",
              formId: "1ba11fc5-0221-4216-8db2-970987f1a722",
              region: "na2"
            });
          </script>
        </div>
        
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>