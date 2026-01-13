// Splide.jsの初期化
import Splide from '../libs/splide.esm.min.js';

export function initSplide() {
  const element = document.getElementById('marquee-slide');
  if (!element) return;
  
  let splideInstance = null;
  let animationId = null;
  let position = 0;
  const speed = 0.5;
  
  // Splide.jsを初期化
  splideInstance = new Splide('#marquee-slide', {
    type: 'loop',
    autoWidth: true,
    gap: '24px',
    drag: false,
    arrows: false,
    pagination: false,
    speed: 0,
    breakpoints: {
      768: { gap: '16px' }
    }
  });
  
  splideInstance.mount();
  
  // マウント完了後にアニメーション開始
  setTimeout(() => {
    const list = element.querySelector('.splide__list');
    if (!list) return;
    
    const slides = list.querySelectorAll('.splide__slide');
    const originalCount = slides.length / 2;
    
    const getTotalWidth = () => {
      if (slides.length === 0) return 0;
      const gap = window.innerWidth <= 768 ? 16 : 24;
      let total = 0;
      for (let i = 0; i < originalCount; i++) {
        total += slides[i].offsetWidth + gap;
      }
      return total;
    };
    
    let totalWidth = getTotalWidth();
    
    const animate = () => {
      if (document.hidden) {
        animationId = requestAnimationFrame(animate);
        return;
      }
      
      position -= speed;
      if (Math.abs(position) >= totalWidth) {
        position = 0;
      }
      
      list.style.transform = `translateX(${position}px)`;
      list.style.transition = 'none';
      animationId = requestAnimationFrame(animate);
    };
    
    // リサイズ時に再計算
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        totalWidth = getTotalWidth();
        if (Math.abs(position) >= totalWidth) {
          position = 0;
        }
      }, 250);
    });
    
    animate();
  }, 500);
}
