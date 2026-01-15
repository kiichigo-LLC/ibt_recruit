// benefits用の横フェードアニメーション
export function initBenefitsFadeIn() {
  const imgElements = document.querySelectorAll('.img-slide-fade');
  
  if (imgElements.length === 0) return;
  
  // figcaption内のspanを自動的に背景divで囲む
  const figcaptions = document.querySelectorAll('.caption-slide-fade');
  figcaptions.forEach((figcaption) => {
    const spans = figcaption.querySelectorAll('span');
    spans.forEach((span) => {
      // 既に処理済みの場合はスキップ
      if (span.parentElement.classList.contains('caption-slide-fade-bg')) {
        return;
      }
      
      // 背景divを作成
      const bgDiv = document.createElement('div');
      bgDiv.className = 'caption-slide-fade-bg';
      
      // spanを背景divで囲む
      span.parentNode.insertBefore(bgDiv, span);
      bgDiv.appendChild(span);
      
      // テキストにクラスを追加
      span.classList.add('caption-slide-fade-text');
    });
  });
  
  // Intersection Observerのオプション
  const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1 // 要素が10%見えたら発動
  };
  
  // 背景画像用のObserver
  const imgObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // 背景画像を表示
        entry.target.classList.add('is-visible');
        imgObserver.unobserve(entry.target);
        
        // 背景画像のアニメーションが終わった後、figcaptionの背景を表示
        const figure = entry.target.closest('figure');
        if (figure) {
          const bgDivs = figure.querySelectorAll('.caption-slide-fade-bg');
          if (bgDivs.length > 0) {
            // 背景画像のアニメーション終了後（0.4s）に各背景divを順番に表示
            bgDivs.forEach((bgDiv, bgIndex) => {
              setTimeout(() => {
                bgDiv.classList.add('is-visible');
                
                // 各背景divのアニメーション終了後（さらに0.3s）にその中のテキストを表示
                const textSpan = bgDiv.querySelector('.caption-slide-fade-text');
                if (textSpan) {
                  setTimeout(() => {
                    textSpan.classList.add('is-visible');
                  }, 300); // 背景divのアニメーション終了後
                }
              }, 400 + (bgIndex * 100)); // 背景画像のアニメーション終了後 + 各背景divを100msずつ遅延
            });
          }
        }
      }
    });
  }, options);
  
  // 各背景画像を監視
  imgElements.forEach((element) => {
    imgObserver.observe(element);
  });
}
