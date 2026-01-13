// ホームページの順番表示アニメーション
export function initHomeSequence() {
  // ホームページでない場合は何もしない
  if (!document.body.classList.contains('home') && window.location.pathname !== '/' && window.location.pathname !== '/index.php') {
    return;
  }
  
  // 要素が読み込まれるまで待つ（Splide.jsの初期化も待つ）
  function waitForElements() {
    var sequence1 = document.querySelector('.home-sequence-1');
    var sequence3 = document.querySelector('.home-sequence-3');
    if (!sequence1 || !sequence3) {
      setTimeout(waitForElements, 100);
      return;
    }
    
    // Splide.jsの初期化が完了するまで少し待つ
    setTimeout(function() {
      var sequences = [
        { selector: '.home-sequence-1', delay: 50 },
        { selector: '.home-sequence-2', delay: 0 },
        { selector: '.home-sequence-3', delay: 70 },
        { selector: '.home-sequence-4', delay: 1500 },
        { selector: '.home-sequence-5', delay: 2000 }
      ];
      
      sequences.forEach(function(item) {
        setTimeout(function() {
          var elements = document.querySelectorAll(item.selector);
          if (elements.length === 0) {
            console.warn('Element not found: ' + item.selector);
            return;
          }
          elements.forEach(function(el) {
            el.style.opacity = '1';
            
            // home-sequence-4とhome-sequence-5は横から入ってくるアニメーション
            if (item.selector === '.home-sequence-4' || item.selector === '.home-sequence-5') {
              el.style.transform = 'translateX(0)';
            }
          });
        }, item.delay);
      });
    }, 600); // Splide.jsの初期化を待つ
  }
  
  waitForElements();
}
