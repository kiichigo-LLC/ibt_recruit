// リクルートSVGアニメーションの初期化
export function initRecruitSvgAnimation() {
  const svgContainers = document.querySelectorAll('.recruit-svg-animation');
  if (svgContainers.length === 0) return;
  
  svgContainers.forEach(function(container) {
    const drawPath = container.querySelector('.draw-path');
    if (!drawPath) return;
    
    // アニメーション実行関数
    function startAnimation() {
      // 既にアニメーションが開始されている場合はスキップ
      if (drawPath.hasAttribute('data-animated')) return;
      drawPath.setAttribute('data-animated', 'true');
      
      // 初期状態を設定
      var length = drawPath.getTotalLength();
      if (length === 0) {
        // SVGがまだ読み込まれていない場合は少し待つ
        setTimeout(startAnimation, 100);
        return;
      }
      
      drawPath.setAttribute('stroke-dasharray', length);
      drawPath.setAttribute('stroke-dashoffset', length);
      drawPath.style.strokeDasharray = length + 'px';
      drawPath.style.strokeDashoffset = length + 'px';
      
      // 初期状態を設定したら表示する
      container.classList.add('is-ready');
      
      setTimeout(function() {
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
    }
    
    // Intersection Observerで要素が見えるか監視
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          startAnimation();
          // 一度アニメーションが開始されたら監視を停止
          observer.unobserve(container);
        }
      });
    }, {
      threshold: 0.1, // 10%が見えたら開始
      rootMargin: '0px'
    });
    
    observer.observe(container);
  });
}
