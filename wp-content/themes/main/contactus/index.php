<?php

/* Template Name: お問い合わせ */

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
        
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>