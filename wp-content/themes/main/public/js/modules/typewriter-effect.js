// タイプライターエフェクトの初期化
export function initTypewriterEffect() {
  const typewriterElements = document.querySelectorAll('.typewriter-text');
  
  if (typewriterElements.length === 0) {
    return;
  }
  
  // 各要素の高さを事前に確保
  typewriterElements.forEach(function(element) {
    // data-text属性があればそれを使い、なければ要素のテキストを使用
    let text = element.getAttribute('data-text');
    if (!text) {
      text = element.textContent.trim();
      // テキストをdata-text属性に保存してから、要素の内容を空にする
      if (text) {
        element.setAttribute('data-text', text);
        element.textContent = '';
      }
    } else {
      // data-textがある場合も、要素の内容を空にする（念のため）
      element.textContent = '';
    }
    
    if (text) {
      // 最終的なテキストを非表示で配置して高さを確保
      const tempElement = document.createElement('span');
      tempElement.style.visibility = 'hidden';
      tempElement.style.position = 'absolute';
      tempElement.style.opacity = '0';
      tempElement.style.pointerEvents = 'none';
      tempElement.style.whiteSpace = 'pre-wrap';
      tempElement.style.wordWrap = 'break-word';
      tempElement.innerHTML = text.replace(/<br\s*\/?>/gi, '<br>');
      
      // 元の要素のスタイルを一時的に保存
      const originalDisplay = element.style.display;
      const originalVisibility = element.style.visibility;
      
      // 要素を一時的に表示状態にして高さを正確に測定
      element.style.display = 'block';
      element.style.visibility = 'visible';
      element.appendChild(tempElement);
      
      // 高さを取得して固定
      const height = tempElement.offsetHeight;
      element.style.minHeight = height + 'px';
      
      // 元のスタイルに戻す
      element.style.display = originalDisplay;
      element.style.visibility = originalVisibility;
      
      // 一時要素を削除
      tempElement.remove();
      
      // 要素の内容を完全に空にする（カーソルも表示しない）
      element.innerHTML = '';
    }
  });
  
  // Intersection Observerで要素が表示されたときに発火
  const observerOptions = {
    threshold: 0.3, // 要素の30%が見えたら発火
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting && !entry.target.classList.contains('typewriter-started')) {
        entry.target.classList.add('typewriter-started');
        // すべての要素を同じタイミングで発火させるため、少し遅延
        setTimeout(function() {
          startTypewriter(entry.target);
        }, 100);
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  // タイプライターエフェクトを開始する関数
  function startTypewriter(el) {
    // data-text属性があればそれを使い、なければ要素のテキストを使用
    let text = el.getAttribute('data-text');
    if (!text) {
      text = el.textContent.trim();
    }
    
    if (!text) {
      return;
    }
    
    // <br>タグを特殊マーカーに変換（後でinnerHTMLで復元するため）
    const brMarker = '___BR___';
    text = text.replace(/<br\s*\/?>/gi, brMarker);
    
    // テキストを文字配列に変換（マーカーも1文字として扱う）
    const textArray = [];
    for (let i = 0; i < text.length; i++) {
      // マーカーの開始位置を検出
      if (text.substring(i, i + brMarker.length) === brMarker) {
        textArray.push(brMarker);
        i += brMarker.length - 1;
      } else {
        textArray.push(text[i]);
      }
    }
    
    // 初期状態でカーソルを表示して点滅させる
    const cursor = document.createElement('span');
    cursor.className = 'typewriter-cursor';
    cursor.textContent = '|';
    cursor.style.animation = 'blink 1s infinite';
    el.appendChild(cursor);
    
    let currentIndex = 0;
    const typingSpeed = 80; // 1文字あたりの表示速度（ミリ秒）
    
    function typeCharacter() {
      if (currentIndex < textArray.length) {
        // カーソルを一時的に削除
        const cursor = el.querySelector('.typewriter-cursor');
        if (cursor) {
          cursor.remove();
        }
        
        // 現在の文字までを表示
        let currentHTML = '';
        for (let i = 0; i <= currentIndex; i++) {
          if (textArray[i] === brMarker) {
            currentHTML += '<br>';
          } else {
            currentHTML += textArray[i];
          }
        }
        el.innerHTML = currentHTML;
        
        // カーソルを再追加（アニメーションも設定）
        const newCursor = document.createElement('span');
        newCursor.className = 'typewriter-cursor';
        newCursor.textContent = '|';
        newCursor.style.animation = 'blink 1s infinite';
        el.appendChild(newCursor);
        
        currentIndex++;
        
        // 次の文字を表示
        setTimeout(typeCharacter, typingSpeed);
      } else {
        // タイピング完了後、カーソルを点滅させる
        const cursor = el.querySelector('.typewriter-cursor');
        if (cursor) {
          cursor.style.animation = 'blink 1s infinite';
        }
      }
    }
    
    // カーソルを点滅させてからタイピング開始
    const blinkDuration = 1300; // カーソル点滅時間（ミリ秒）
    setTimeout(function() {
      typeCharacter();
    }, blinkDuration);
  }
  
  // 各要素を監視対象に追加（すべてIntersection Observerで統一）
  typewriterElements.forEach(function(element) {
    observer.observe(element);
  });
}
