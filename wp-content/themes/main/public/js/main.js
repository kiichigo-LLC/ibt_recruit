// メインファイル - 全てのモジュールをまとめる
import { initMenuControl } from './modules/menu-control.js';
import { initScrollBottomDetection } from './modules/scroll-bottom-detection.js';
import { initRecruitSvgAnimation } from './modules/recruit-svg-animation.js';
import { initTypewriterEffect } from './modules/typewriter-effect.js';
import { initHomeSequence } from './modules/home-sequence.js';
import { initSplide } from './modules/splide-init.js';
import { initBenefitsFadeIn } from './modules/benefits-fade-in.js';
import { initFadeUp } from './modules/fade-up.js';

// DOM読み込み完了後の処理（統合版）
document.addEventListener('DOMContentLoaded', function() {
  // 1. メニュー開閉の制御
  initMenuControl();
  
  // 3. スクロール最下部検知の初期化（スマホのみ）
  initScrollBottomDetection();
  
  // 4. リクルートSVGアニメーションの初期化
  initRecruitSvgAnimation();
  
  // 5. タイプライターエフェクトの初期化
  initTypewriterEffect();
  
  // 6. ホームページの順番表示アニメーション
  initHomeSequence();
  
  // 7. Splide.jsの初期化
  initSplide();
  
  // 8. benefits用の横フェードアニメーションの初期化
  initBenefitsFadeIn();
  
  // 9. 汎用的な下からフェードインアニメーションの初期化
  initFadeUp();
});

// HubSpotフォーム読み込み完了後にスクロール検知を再初期化
window.addEventListener('load', () => {
  setTimeout(() => {
    // スマホのみ再初期化
    if (window.innerWidth <= 768) {
      initScrollBottomDetection();
    }
  }, 2000); // HubSpotフォームの描画を待つ
});
