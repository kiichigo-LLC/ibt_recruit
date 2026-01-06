<?php

	get_header();

	// SCF変数の読み込み
	include(get_template_directory() . '/utils/_scf.php');

	$thumbnail_id = get_post_thumbnail_id();
	$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
	$category = get_the_category();
	$cat_id   = !empty($category) ? $category[0]->cat_ID : null;
	$cat_name = !empty($category) ? $category[0]->cat_name : null;
	$cat_slug = !empty($category) ? $category[0]->category_nicename : null;
	
	// タグを取得
	$tags = get_the_tags();
	$tag_name = !empty($tags) ? $tags[0]->name : '';
	$tag_name = str_replace('採用｜', '', $tag_name);

?>

<?php while( have_posts() ) : the_post(); 
	$share_url = urlencode( get_permalink() );
	$share_title = urlencode( get_the_title() );
?>

<div class="recruit-btn-sns">
  <p>SHARE</p>
  <ol>
    <li>
      <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/sns/x.svg" alt="x" width="32" height="32">
      </a>
    </li>
    <li>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/sns/fb.svg" alt="facebook" width="32" height="32">
      </a>
    </li>
    <li>
      <a href="https://social-plugins.line.me/lineit/share?url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/sns/line.svg" alt="LINE" width="32" height="32">
      </a>
    </li>
    <li>
      <a href="https://b.hatena.ne.jp/entry/<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/sns/hatena.svg" alt="hatena" width="32" height="32">
      </a>
    </li>
  </ol>
</div>

<div class="recruit-btn-fix">
  <a href="#">
    <span>応募する</span>
  </a>
</div>

<?php include(get_template_directory() . '/_page/parts/recruit/svg-animation.php'); ?>

<div class="ibt-contents recruit">
  <div class="ibt-contents-inr recruit-inr">
    
    <div class="ibt-contents-head recruit-head">
      <h1 class="recruit-head-ttl single">
        <?php if($tag_name) { ?>
          <span class="recruit-head-ttl-tag"><?php echo esc_html($tag_name); ?></span>
        <?php } ?>
        <?php if($recruit_title) { ?>
          <span class="typewriter-text" data-text="<?php echo esc_attr(strip_tags($recruit_title, '<br>')); ?>"></span>
        <?php } ?>
      </h1>
    </div>

    <div class="recruit-panel">
      <div class="recruit-panel-img">
        <?php if($eye_img && $eye_img[0]) { ?>
          <img src="<?php echo esc_url($eye_img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="512" height="328">
        <?php } else { ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new/recruit/sample1.webp" alt="新卒" width="512" height="328">
        <?php } ?>
      </div>
      <div class="recruit-panel-list">
        <dl>
          <?php
            $recruit_point_role = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_role', true);
            $recruit_point_type = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_type', true);
            $recruit_point_area = get_post_meta(get_the_ID(), 'recruit_point_0_recruit_point_area', true);
          ?>
          <?php if ($recruit_point_role) : ?>
            <div>
              <dt>職種</dt>
              <dd><?php echo esc_html($recruit_point_role); ?></dd>
            </div>
          <?php endif; ?>
          <?php if ($recruit_point_type) : ?>
            <div>
              <dt>雇用形態</dt>
              <dd><?php echo esc_html($recruit_point_type); ?></dd>
            </div>
          <?php endif; ?>
          <?php if ($recruit_point_area) : ?>
            <div>
              <dt>エリア</dt>
              <dd><?php echo esc_html($recruit_point_area); ?></dd>
            </div>
          <?php endif; ?>
        </dl>
      </div>
    </div>

    <div class="ibt-contents-main recruit-main">

      <div class="recruit-details">
        <div class="recruit-details-box">
          <h2>業務内容</h2>
          <div class="recruit-details-box-text">
            私たちインバウンドテクノロジーは、「多様な価値観と共存できる世界をつくる」というビジョンのもと、“日本創生”を軸に多角的な事業を展開する急成長中のグローバル企業です。<br>
            <br>
            今まさに成長期のこのフェーズでは、一人ひとりの挑戦が会社の成長そのもの。<br>
            まだ仕組みもルールも整っていない環境だからこそ、若手のアイデアと行動力が事業を動かし、組織を創っていきます。<br>
            <br>
            難易度は高い。でも、その分、得られる経験は圧倒的。必要なのは、経験でも知識でもなく――「やるか、やらないか」。<br>
            志ある仲間とぶつかり合いながら、理想のキャリアを自らの手で掴む。<br>
            そんな環境が、ここにあります。<br>
            
            <strong>事業部のご紹介</strong>
            ・グローバルタレント紹介事業<br>
            単に仕事を紹介するだけのエージェントではありません。候補者一人ひとりのキャリアやライフプラン、価値観まで深く理解し、一緒に次のステップを考える<br>
            ――そんな伴走型のサポートこそが、私たちの強み<br>
            <br>
            ・訪日観光事業<br>
            訪日旅行の“深さ”と“広がり”の両方を実現。非公開体験・文化人との出会い・完全オリジナルツアーの造成に加え、ホテル・飲食・交通を含むランドオペレーションも一貫して手配可能。<br>
            ――訪れる人すべてに、唯一無二の体験を<br>
            <br>
            ・社長室（マーケティング）／経営管理室／人財開発室<br>
            事業の拡大を支えるコア部門として、仕組みづくりや戦略立案。
          </div>
        </div>

        <div class="recruit-details-box">
          <h2>求める人物像</h2>
          <div class="recruit-details-box-text">
            ・人としての魅力・人間力を高めたい方<br>
            ・自らの力で組織を動かす経験を積みたい方<br>
            ・日本国内にとどまらず、世界で活躍できるスキルを身につけたい方<br>
            
            <strong>キャリアビジョン</strong>
            私たちは、月に1回の評価面談を通して、メンバー一人ひとりの特徴・スキル・描きたいキャリアと真剣に向き合っています。<br>
            どのような経験やステップが必要なのかを一緒に考え、着実にキャリアを積める環境を整えています。<br>
            頑張り次第では、20代からマネージャーを任されるチャンスもあります。<br>
            年齢や社歴に関係なく、実力で成長できるフィールドです。
          </div>
        </div>

        <div class="recruit-details-box">
          <h2>募集要項</h2>
          <div class="recruit-table">
            <table>
              <tr>
                <th>職種</th>
                <td>オープンポジション</td>
              </tr>
              <tr>
                <th>雇用形態</th>
                <td>正社員</td>
              </tr>
              <tr>
                <th>勤務体系</th>
                <td>フレックスタイム制度</td>
              </tr>
              <tr>
                <th>就業時間</th>
                <td>フレックスタイム制<br>休憩時間: 60分</td>
              </tr>
              <tr>
                <th>時間外</th>
                <td>あり　月平均20～30時間程度</td>
              </tr>
              <tr>
                <th>休日</th>
                <td>
                  年間休日122日以上<br>
                  完全週休2日制(土日)<br>
                  祝日<br>
                  冬季休暇<br>
                  有給休暇<br>
                  慶弔休暇<br>
                  フリー休暇（年に3回）<br>
                  バースデー休暇（誕生日月に1日取得）<br>
                  年間休日数: 年間休日122日以上
                </td>
              </tr>
              <tr>
                <th>給与</th>
                <td>
                  月給：280,000円 〜<br>
                  固定残業：あり<br>
                     固定残業時間：1ヶ月あたり 20.0時間<br>
                     固定残業代：1ヶ月あたり 37,434円<br>
                  賞与：ボーナス年2回（業績と本人の実績により支給）<br>
                  （支給項目の総額の20％相当分は前払退職金に相当する資産形成DB手当として基本給に含めて支給する）
                </td>
              </tr>
              <tr>
                <th>試用期間</th>
                <td>
                  試用期間：あり<br>
                  期間：3ヵ月<br>
                  月給：280,000円 〜<br>
                  固定残業：あり<br>
                     固定残業時間：1ヶ月あたり 20.0時間<br>
                     固定残業代：1ヶ月あたり 37,434円<br>
                  変更なし
                </td>
              </tr>
              <tr>
                <th>リモートワーク制度</th>
                <td>リモートワークなし</td>
              </tr>
              <tr>
                <th>通勤手当</th>
                <td>月額上限3万円</td>
              </tr>
              <tr>
                <th>待遇・福利厚生</th>
                <td>
                  ◆福利厚生<br>
                  ・Welcomeランチ：入社祝いランチ<br>
                  ・バースデー休暇：誕生月に1日付与<br>
                  ・オフィスグリコ：自由にお菓子を利用可能<br>
                  ・資格手当＋資格取得祝い金<br>
                  ・書籍購入手当<br>
                  <br>
                  ◆その他<br>
                  ・社会保険完備<br>
                  ・交通費支給（上限あり）<br>
                  ・産休／育休制度＋産後パパ育休<br>
                  ・はぐくみ年金：確定給付企業年金（DB）制度で、退職金制度も兼ね備えています
                </td>
              </tr>
              <tr>
                <th>加入保険</th>
                <td>健康保険あり・厚生年金あり・雇用保険あり・労災保険あり</td>
              </tr>
              <tr>
                <th>受動喫煙防止措置</th>
                <td>敷地内禁煙</td>
              </tr>
              <tr>
                <th>育児休業取得実績</th>
                <td>敷地内禁煙</td>
              </tr>
              <tr>
                <th>転勤</th>
                <td>なし</td>
              </tr>
              <tr>
                <th>定年齢</th>
                <td>60歳</td>
              </tr>
              <tr>
                <th>再雇用</th>
                <td>あり</td>
              </tr>
              <tr>
                <th>就業場所</th>
                <td class="map">
                  〒104-0045 東京都中央区築地2丁目10-2 JP-BASE築地駅前ビル8階
                  <div class="recruit-table-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12965.285535784109!2d139.7733917!3d35.6690878!3m2!1i1024!2i768!4f10!3m3!1m2!1s0x60188b50b95c2bc3%3A0xd55aabf9f7a73c06!2z44Kk44Oz44OQ44Km44Oz44OJ44OG44Kv44OO44Ot44K444O844ix!5e0!3m2!1sja!2sjp!4v1729063051034!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </td>
              </tr>
              <tr>
                <th>沿線・最寄駅</th>
                <td>日比谷線「築地」駅より徒歩30秒、有楽町線「新富町」駅より徒歩1分勤務先従業員数</td>
              </tr>
              <tr>
                <th>勤務先従業員数</th>
                <td>18名</td>
              </tr>
              <tr>
                <th>選考について</th>
                <td>カジュアル面談（WEB） ＞ 一次面接（WEB） ＞ 二次面接（WEB） ＞ 最終面接（対面）</td>
              </tr>
              <tr>
                <th>応募書類等</th>
                <td>カジュアル面談の段階では履歴書の提出は不要</td>
              </tr>
              <tr>
                <th>採用人数</th>
                <td>5 名</td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="recruit-company">

        <div class="recruit-company-box">
          <h2>会社情報</h2>
          <div class="recruit-table">
            <table>
              <tr>
                <th>企業名</th>
                <td>インバウンドテクノロジー株式会社</td>
              </tr>
              <tr>
                <th>業種</th>
                <td>人材派遣・人材紹介</td>
              </tr>
              <tr>
                <th>代表者名</th>
                <td>林 舟之輔</td>
              </tr>
              <tr>
                <th>所在地</th>
                <td>東京都中央区築地2-10-2 JP-BASE築地駅前ビル8階</td>
              </tr>
              <tr>
                <th>事業内容</th>
                <td>
                  ◆グローバルタレント紹介事業<br>
                  ◆訪日観光事業<br>
                  有料職業紹介事業<br>
                  許可番号 13-ユ-307699
                </td>
              </tr>
              <tr>
                <th>設立年月</th>
                <td>
                  2016年
                </td>
              </tr>
              <tr>
                <th>電話番号</th>
                <td>
                  03-6420-0580
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>


