// DOM読み込み完了後の処理（統合版）
document.addEventListener('DOMContentLoaded', function() {
  // 1. メニュー開閉の制御
  initMenuControl();
  
  // 2. リクルートカルーセルの初期化
  initRecruitCarousel();
  
  // 3. ヒーローパララックスの初期化
  initHeroParallax();
  
  // 4. スクロール最下部検知の初期化（スマホのみ）
  initScrollBottomDetection();
  
  // 5. リクルートSVGアニメーションの初期化
  initRecruitSvgAnimation();
  
  // 6. タイプライターエフェクトの初期化
  initTypewriterEffect();
});

// メニュー開閉の制御
function initMenuControl() {
  const target = document.querySelector('.bgr');
  const target2 = document.querySelectorAll('.ibt, .ibt-header-main, .ibt-header-main-r, .opn');
  const target3 = document.querySelectorAll('.nav ul li');
  
  if (target) {
    target.addEventListener('click', function () {
      if (this.classList.contains("active")) {
        this.classList.remove("active");
        target2.forEach(function(el) {
          el.classList.remove("active");
          el.classList.add("close");
        });
        target3.forEach(function(el) {
          el.classList.remove("movein");
        });
      } else {
        this.classList.add("active");
        target2.forEach(function(el) {
          el.classList.add("active");
          el.classList.remove("close");
        });
        target3.forEach(function(el) {
          el.classList.add("movein");
        });
      }
    });
  }
}

// ローディング表示の制御
function initLoadShow() {
  const loadshowElement = document.querySelector('.loadshow');
  if (loadshowElement) {
    loadshowElement.classList.add('loaded');
  }
}

// リクルートカルーセルの制御
function initRecruitCarousel() {
  const slideContainer = document.querySelector('.marquee-slide');
  if (!slideContainer) return;
  
  // 既存の画像を取得
  const existingImages = slideContainer.querySelectorAll('img');
  const originalCount = existingImages.length;
  
  // 2セット目を動的に追加（より滑らかなループのため）
  for (let i = 0; i < originalCount; i++) {
    const clone = existingImages[i].cloneNode(true);
    slideContainer.appendChild(clone);
  }
  
  // アニメーション最適化のためのwill-changeを設定
  slideContainer.style.willChange = 'transform';
  
  let position = 0;
  const speed = 1;
  
  function animate() {
    position -= speed;
    
    // 1セット分スクロールしたら自然にループ
    if (position <= -slideContainer.scrollWidth / 3) {
      position = 0;
    }
    
    slideContainer.style.transform = `translateX(${position}px)`;
    requestAnimationFrame(animate);
  }
  
  animate();
}

// テキストアニメーションの初期化
function initTextAnimations() {
  const textElements = document.querySelectorAll('.ibt-ttl');
  
  if (textElements.length === 0) return;
  
  // ファーストビューの要素を特定（ページ上部にある要素）
  const firstViewElements = Array.from(textElements).filter(element => {
    const rect = element.getBoundingClientRect();
    // スマホでも確実に判定できるよう、より緩い条件に
    return rect.top < window.innerHeight * 1.5;
  });
  
  // ページ判定
  const isHomePage = window.location.pathname === '/' || 
                     window.location.pathname === '/index.php' ||
                     document.body.classList.contains('home');
  
  if (isHomePage) {
    // トップページのみ：3秒後にアニメーション開始
    firstViewElements.forEach(function(element) {
      setTimeout(function() {
        if (!element.classList.contains('animation-started')) {
          element.classList.add('animation-started');
          startTextAnimation(element);
        }
      }, 3000); // ヒーローアニメーション（500ms）より遅く
    });
  } else {
    // その他のページ：即座にアニメーション開始
    firstViewElements.forEach(function(element) {
      if (!element.classList.contains('animation-started')) {
        element.classList.add('animation-started');
        startTextAnimation(element);
      }
    });
  }
  
  // スクロールで表示される要素はIntersection Observerで監視
  const scrollElements = Array.from(textElements).filter(element => {
    const rect = element.getBoundingClientRect();
    return rect.top >= window.innerHeight;
  });
  
  if (scrollElements.length > 0) {
    const observerOptions = {
      threshold: 0.3,
      rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          if (!entry.target.classList.contains('animation-started')) {
            entry.target.classList.add('animation-started');
            startTextAnimation(entry.target);
          }
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);
    
    scrollElements.forEach(function(element) {
      observer.observe(element);
    });
  }
}

// テキストアニメーション実行関数
function startTextAnimation(element) {
  // まず要素全体の透明度を解除
  element.style.opacity = '1';
  
  // テキストを一文字ずつに分割
  const text = element.textContent.trim();
  element.innerHTML = '';
  
  // 各文字をspanで囲む
  for (let i = 0; i < text.length; i++) {
    const charSpan = document.createElement('span');
    charSpan.textContent = text[i];
    charSpan.style.display = 'inline-block';
    charSpan.style.opacity = '0';
    charSpan.style.transform = 'translateY(20px)';
    charSpan.style.transition = 'all 0.6s ease-out';
    element.appendChild(charSpan);
  }
  
  // 一文字ずつフェードイン（同時にクラス追加で色変更）
  const chars = element.querySelectorAll('span');
  chars.forEach(function(char, index) {
    setTimeout(function() {
      char.style.opacity = '1';
      char.style.transform = 'translateY(0)';
      char.classList.add('text-highlight');
    }, index * 100);
  });
  
  // フェードイン完了後にクラスを削除
  setTimeout(function() {
    chars.forEach(function(char, index) {
      setTimeout(function() {
        char.classList.remove('text-highlight');
      }, index * 50);
    });
  }, chars.length * 100 + 300);
}

// ヒーローセクションに500ms後にクラスを付与
function initHeroClass() {
  const heroElement = document.querySelector('.ibt-hero');
  if (heroElement) {
    // Google検索からのアクセスでも確実に動作するよう、より強力な初期化チェック
    function checkAndAddLoaded() {
      // 要素が完全に読み込まれているか複数チェック
      if (heroElement.offsetHeight > 0 && 
          heroElement.offsetWidth > 0 && 
          heroElement.getBoundingClientRect().width > 0) {
        heroElement.classList.add('loaded');
        return true;
      }
      return false;
    }
    
    // 基本500ms後にチェック
    setTimeout(function() {
      if (!checkAndAddLoaded()) {
        // まだ準備できていない場合は100ms間隔で再試行
        const retryInterval = setInterval(function() {
          if (checkAndAddLoaded()) {
            clearInterval(retryInterval);
          }
        }, 100);
        
        // 最大3秒でタイムアウト
        setTimeout(function() {
          clearInterval(retryInterval);
          // 強制的にクラスを付与
          heroElement.classList.add('loaded');
        }, 3000);
      }
    }, 500);
  }
}

// フェードインアニメーション用のクラス付与
function initFadeInAnimations() {
  const fadeElements = document.querySelectorAll('.fade-in');
  
  if (fadeElements.length === 0) return;
  
  // ページ判定
  const isHomePage = window.location.pathname === '/' || 
                     window.location.pathname === '/index.php' ||
                     document.body.classList.contains('home');
  
  const observerOptions = {
    threshold: 0.1, // より低い閾値で発火しやすく
    rootMargin: '0px 0px -30px 0px' // マージンを削除して発火しやすく
  };
  
  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        if (isHomePage) {
          // トップページの場合：vision.phpの要素かどうか判定
          if (entry.target.closest('.ibt-vision')) {
            // vision.phpの要素：遅延付与
            // スマホでは要素が画面内に入りきらない場合があるので、より短い遅延に
            const delay = window.innerWidth <= 768 ? 500 : 3500;
            setTimeout(() => {
              entry.target.classList.add('is-visible');
            }, delay);
          } else {
            // その他の要素：即座にクラス付与
            setTimeout(() => {
              entry.target.classList.add('is-visible');
            }, 500);
          }
        } else {
          // その他のページ：即座にクラス付与
          setTimeout(() => {
            entry.target.classList.add('is-visible');
          }, 500);
        }
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  fadeElements.forEach(function(element) {
    observer.observe(element);
  });
}

// ヒーローセクションのパララックス効果
function initHeroParallax() {
  const heroElement = document.querySelector('.ibt-hero');
  if (!heroElement) return;
  
  // パララックス用の疑似要素を作成（既存アニメーションを邪魔しない）
  const parallaxLayer = document.createElement('div');
  parallaxLayer.className = 'hero-parallax-layer';
  
  // パララックス効果の強度（0.2 = スクロール量の20%分移動）
  const parallaxIntensity = 0.15;
  
  function updateParallax() {
    const scrolled = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
    const rate = scrolled * parallaxIntensity;
    
    // 疑似要素の位置をスクロールに応じて移動
    parallaxLayer.style.transform = `translateY(${rate}px)`;
  }
  
  // requestAnimationFrameで継続的に監視
  function animateParallax() {
    updateParallax();
    requestAnimationFrame(animateParallax);
  }
  
  // 疑似要素を追加
  heroElement.appendChild(parallaxLayer);
  
  // アニメーション開始
  animateParallax();
}

// スクロール最下部検知の制御
let scrollBottomInitialized = false;

function initScrollBottomDetection() {
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
      initScrollBottomDetection();
    }
  }, 2000); // HubSpotフォームの描画を待つ
});

// リクルートSVGアニメーションの初期化
function initRecruitSvgAnimation() {
  const drawPath = document.querySelector('.recruit-svg-animation .draw-path');
  if (!drawPath) return;
  
  window.addEventListener('load', function() {
    setTimeout(function() {
      var length = drawPath.getTotalLength();
      drawPath.setAttribute('stroke-dasharray', length);
      drawPath.setAttribute('stroke-dashoffset', length);
      drawPath.style.strokeDasharray = length + 'px';
      drawPath.style.strokeDashoffset = length + 'px';
      
      var startTime = null;
      var duration = 1500;
      
      function easeInOut(t) {
        return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
      }
      
      function animate(currentTime) {
        if (!startTime) startTime = currentTime;
        var elapsed = currentTime - startTime;
        var progress = Math.min(elapsed / duration, 1);
        var eased = easeInOut(progress);
        drawPath.style.strokeDashoffset = length * (1 - eased) + 'px';
        drawPath.setAttribute('stroke-dashoffset', drawPath.style.strokeDashoffset);
        
        if (progress < 1) {
          requestAnimationFrame(animate);
        }
      }
      
      requestAnimationFrame(animate);
    }, 200);
  });
}

// タイプライターエフェクトの初期化
function initTypewriterEffect() {
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