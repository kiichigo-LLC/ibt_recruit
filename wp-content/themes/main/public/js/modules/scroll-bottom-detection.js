// スクロール最下部検知の制御
let scrollBottomInitialized = false;

export function initScrollBottomDetection() {
  if (scrollBottomInitialized) return; // 既に初期化済みの場合は何もしない
  
  // スマホのみに適用（768px以下）
  if (window.innerWidth > 768) return;
  
  // HubSpotフォームがあるページのみに適用
  const hubspotForm = document.querySelector('script[src*="hsforms.net"]');
  if (!hubspotForm) return;
  
  // ページの高さを強制的に増やす（HubSpotフォーム描画待機のため）
  document.body.style.height = '2000px';
  
  const bottomTargets = document.querySelectorAll('.unpin'); // 対象要素のクラス名を指定
  
  if (bottomTargets.length === 0) return;

  const checkBottomScroll = () => {
    const scrollPos = window.scrollY;
    const windowHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;
    const isBottom = (scrollPos + windowHeight) >= (documentHeight - 50); // 50pxの余裕を持たせる

    bottomTargets.forEach(el => {
      el.classList.toggle('true', isBottom);
    });
  };

  window.addEventListener('scroll', checkBottomScroll);
  scrollBottomInitialized = true; // 初期化済みフラグを設定
}

// HubSpotフォーム読み込み完了後にスクロール検知を再初期化
window.addEventListener('load', () => {
  setTimeout(() => {
    // スマホのみ再初期化
    if (window.innerWidth <= 768) {
      scrollBottomInitialized = false; // フラグをリセット
      // initScrollBottomDetectionはmain.jsから呼び出される
    }
  }, 2000); // HubSpotフォームの描画を待つ
});
