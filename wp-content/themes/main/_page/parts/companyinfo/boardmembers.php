<div id="boardmembers" class="ibt-companyinfo-boardmembers ibt-section">
  <div class="ibt-section-head">
    <h3 class="ibt-section-head-ttl">
      <div class="ibt-section-head-ttl-strong">
        <span>B</span>
      </div>
      <div class="ibt-section-head-ttl-b">
        <span>OARD MEMBERS</span>
      </div>
    </h3>
  </div>

  <div class="ibt-companyinfo-boardmembers-main">
    <div class="ibt-companyinfo-boardmembers-list">
      <?php
      $board_members = [
        [
          'image' => 'img1',
          'position' => '代表取締役',
          'name_ja' => '林 秀乃佑(舟之輔)',
          'name_en' => 'Shunosuke Hayashi',
          'career' => [
            ['year' => '2009年', 'description' => '日本大学 卒業'],
            ['year' => '2008年', 'description' => '通信系ベンチャーを3人で創業'],
            ['year' => '2011年', 'description' => '子会社の代表取締役就任（飲食、ネイル、リラクゼーション、不動産賃貸10店舗）'],
            ['year' => '2014年', 'description' => '当社 創業']
          ]
        ],
        [
          'image' => '',
          'position' => '取締役',
          'name_ja' => '髙田 直紀',
          'name_en' => 'Naoki Takada',
          'career' => [
            ['year' => '2015年', 'description' => '関西学院大学 卒業'],
            ['year' => '2015年', 'description' => '株式会社アクセスヒューマネクスト(現 株式会社アクセスネクステージ)'],
            ['year' => '2019年', 'description' => 'インバウンドテクノロジー株式会社　'],
            ['year' => '2023年', 'description' => 'インバウンドテクノロジー株式会社　執行役員（現任）'],
          ]
        ],
        [
          'image' => 'img2',
          'position' => '取締役',
          'name_ja' => '加藤 涼',
          'name_en' => 'Ryo Kato',
          'career' => [
            ['year' => '2004年', 'description' => '東京大学 卒業'],
            ['year' => '2004年', 'description' => '中央青山監査法人'],
            ['year' => '2005年', 'description' => 'モルガン・スタンレー証券株式会社'],
            ['year' => '2009年', 'description' => 'フォートラベル株式会社 取締役'],
            ['year' => '2010年', 'description' => 'バークレイズ証券株式会社'],
            ['year' => '2012年', 'description' => 'コーチ・ジャパン合同会社'],
            ['year' => '2014年', 'description' => 'S-team合同会社 CIO'],
            ['year' => '2016年', 'description' => 'ユナイテッド＆コレクティブ株式会社 取締役'],
            ['year' => '2019年', 'description' => '当社 取締役（現任）'],
            ['year' => '2020年', 'description' => '株式会社デジタルプラス 執行役員CFO 兼 グループ本部長'],
            ['year' => '2022年', 'description' => '株式会社デジタルプラス 取締役CFO 兼 グループ本部長（現任）'],
          ]
        ],
        [
          'image' => 'img3',
          'position' => '社外取締役',
          'name_ja' => '山中 諭',
          'name_en' => 'Satoru Yamanaka',
          'career' => [
            ['year' => '2004年', 'description' => '東京学芸大学卒業'] ,
            ['year' => '2004年', 'description' => '日本ケンタッキーフライドチキン'],
            ['year' => '2004年', 'description' => '株式会社株式会社ウィルゲート　執行役員'],
            ['year' => '2004年', 'description' => '株式会社FCRP　代表取締役社長（現任）'],
            ['year' => '2004年', 'description' => '当社 執行役員（現任）'],
            ['year' => '2004年', 'description' => '株式会社Hajimari　執行役員（現任）'],
          ]
        ],
        [
          'image' => 'img5',
          'position' => '社外監査役',
          'name_ja' => '西本 俊介',
          'name_en' => 'Shunsuke Nishimoto',
          'career' => [
            ['year' => '2006年', 'description' => '東京大学 卒業'],
            ['year' => '2012年', 'description' => '日本弁護士連合会 弁護士登録（第一東京弁護士会所属）'],
            ['year' => '2012年', 'description' => '新生綜合法律事務所 入所'],
            ['year' => '2015年', 'description' => 'JOES SHANGHAI JAPAN　社外取締役'],
            ['year' => '2018年', 'description' => 'シェアリングテクノロジー株式会社　社外監査役'],
            ['year' => '2019年', 'description' => '当社　社外監査役（現任）'],
            ['year' => '2021年', 'description' => '株式会社フォトシンス　社外監査役（現任）'],
            ['year' => '2021年', 'description' => '株式会社ピカパカ　社外取締役（現任）'],
            ['year' => '2022年', 'description' => 'POSTPRIME株式会社　社外監査役（現任）'],
            ['year' => '2022年', 'description' => '株式会社ユナイテッドウィル　社外監査役（現任）'],
            ['year' => '2022年', 'description' => '株式会社Cake.jp　社外監査役（現任）'],
          ]
        ]
      ];

      $index = 0;
      foreach ($board_members as $member) :
        $modal_id = 'boardmember-modal-' . $index;
        $index++;
      ?>
      <div class="ibt-companyinfo-boardmembers-list-box">
        <div class="ibt-companyinfo-boardmembers-list-box-img">
          <?php if ($member['image']) : ?>
            <picture> 
              <source srcset="<?php echo get_template_directory_uri(); ?>/img/companyinfo/boardmembers/<?php echo esc_attr($member['image']); ?>_sp.webp" media="(min-width: 768px)">
              <img src="<?php echo get_template_directory_uri(); ?>/img/companyinfo/boardmembers/<?php echo esc_attr($member['image']); ?>.webp" alt="<?php echo esc_attr($member['name_ja']); ?>">
            </picture>
          <?php else : ?>
            <span>COMMING<br>SOON</span>
          <?php endif; ?>
        </div>
        <div class="ibt-companyinfo-boardmembers-list-box-txt">
          <div class="ibt-companyinfo-boardmembers-list-box-txt-name">
            <b><?php echo esc_html($member['position']); ?></b>
            <span>
              <?php echo esc_html($member['name_ja']); ?>
              <small><?php echo esc_html($member['name_en']); ?></small>
            </span>
          </div>
          <div class="ibt-companyinfo-boardmembers-list-box-txt-btn">
            <button type="button" class="modal-open" data-modal="<?php echo esc_attr($modal_id); ?>">
              <svg class="icon-plus">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/plus.svg#plus"></use>
              </svg>
            </button>
          </div>
        </div>
      </div>
      
      <div class="ibt-companyinfo-boardmembers-modal modal" id="<?php echo esc_attr($modal_id); ?>">
        <div class="ibt-companyinfo-boardmembers-modal-overlay modal-overlay"></div>
        <div class="ibt-companyinfo-boardmembers-modal-content">
          <button type="button" class="ibt-companyinfo-boardmembers-modal-close modal-close" aria-label="閉じる">
            <span></span>
            <span></span>
          </button>

          <div class="ibt-companyinfo-boardmembers-modal-content-inr">
            <div class="ibt-companyinfo-boardmembers-modal-body">
              <div class="ibt-companyinfo-boardmembers-modal-img">
                <?php if ($member['image']) : ?>
                  <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/img/companyinfo/boardmembers/<?php echo esc_attr($member['image']); ?>.webp" media="(min-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/companyinfo/boardmembers/<?php echo esc_attr($member['image']); ?>_sp.webp" alt="<?php echo esc_attr($member['name_ja']); ?>">
                  </picture>
                <?php else : ?>
                  <span>COMMING<br>SOON</span>
                <?php endif; ?>
              </div>
              <div class="ibt-companyinfo-boardmembers-modal-profile">
                <div class="ibt-companyinfo-boardmembers-modal-name">
                  <b><?php echo esc_html($member['position']); ?></b>
                  <span>
                    <?php echo esc_html($member['name_ja']); ?>
                    <small><?php echo esc_html($member['name_en']); ?></small>
                  </span>
                </div>
                <?php if (!empty($member['career'])) : ?>
                  <dl class="ibt-companyinfo-boardmembers-modal-career">
                    <?php foreach ($member['career'] as $career_item) : ?>
                      <div>
                        <dt><?php echo esc_html($career_item['year']); ?></dt>
                        <dd><?php echo esc_html($career_item['description']); ?></dd>
                      </div>
                    <?php endforeach; ?>
                  </dl>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>

<script>
(function() {
  const modalOpenBtns = document.querySelectorAll('.modal-open');
  const modalCloseBtns = document.querySelectorAll('.modal-close');
  const modalOverlays = document.querySelectorAll('.modal-overlay');

  modalOpenBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const modalId = this.getAttribute('data-modal');
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  modalCloseBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const modal = this.closest('.modal');
      if (modal) {
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
      }
    });
  });

  modalOverlays.forEach(overlay => {
    overlay.addEventListener('click', function() {
      const modal = this.closest('.modal');
      if (modal) {
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
      }
    });
  });
})();
</script>