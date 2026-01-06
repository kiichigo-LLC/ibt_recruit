<?php

/* Template Name: お問い合わせ改修 */

get_header();
  
?>

<div class="ibt-contactus top">
  <div class="ibt-contactus-inr">

    <div class="ibt-contactus-head">
      <h2 class="ibt-contactus-ttl ibt-ttl">
        CONTACT
      </h2>

      <div class="ibt-contactus-txt">
        ご相談・ご質問について以下のフォームよりお問い合わせください。<br>
        内容を確認の上、担当者よりご連絡させていただきます。
      </div>
    </div>

    <div class="ibt-contactus-main">
      <div class="ibt-contactus-main-inr">

        <div class="ibt-contactus-main-nav top">
          <div class="ibt-contactus-main-nav-btn">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/company/">
              <span>企業の方はこちら</span>
            </a>
          </div>
          <div class="ibt-contactus-main-nav-btn">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact-us/jobseeker/">
              <span>求職者の方はこちら</span>
            </a>
          </div>
        </div>

        <!-- <div class="ibt-contactus-main-form">
          <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
          <script>
            hbspt.forms.create({
              region: "na1",
              portalId: "44737757",
              formId: "1c61e569-1c37-4658-be67-8d92ceb8ba6e"
            });
          </script>
        </div> -->
        
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>