// 汎用的な下からフェードインアニメーション
// .fade-upクラスを持つ要素を自動的に監視し、表示されたらアニメーションを適用
export function initFadeUp() {
  // 通常のfade-up（遅延なし）
  const fadeUpElements = document.querySelectorAll('.fade-up:not(.fade-up-stagger)');
  
  // 遅延付きfade-up-stagger
  const fadeUpStaggerElements = document.querySelectorAll('.fade-up-stagger');
  
  // Intersection Observerのオプション
  const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1 // 要素が10%見えたら発動
  };
  
  // 通常のfade-up用のObserver（遅延なし）
  if (fadeUpElements.length > 0) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // 要素が見えたらすぐにアニメーションを適用
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, options);
    
    fadeUpElements.forEach((element) => {
      observer.observe(element);
    });
  }
  
  // 遅延付きfade-up-stagger用のObserver
  if (fadeUpStaggerElements.length > 0) {
    const staggerObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // カスタム遅延がある場合はそれを使用、なければインデックスベースの遅延を使用
          const customDelay = entry.target.dataset.fadeDelay;
          let delay = 0;
          
          if (customDelay !== undefined) {
            // data-fade-delay属性で指定された遅延を使用（ミリ秒）
            delay = parseInt(customDelay, 10) || 0;
          } else {
            // インデックスに基づいて遅延を計算（100msずつ増加）
            const index = Array.from(fadeUpStaggerElements).indexOf(entry.target);
            delay = index * 100;
          }
          
          // 遅延後にアニメーションを適用
          setTimeout(() => {
            entry.target.classList.add('is-visible');
          }, delay);
          
          // 一度アニメーションが適用されたら監視を停止
          staggerObserver.unobserve(entry.target);
        }
      });
    }, options);
    
    fadeUpStaggerElements.forEach((element) => {
      staggerObserver.observe(element);
    });
  }
}
