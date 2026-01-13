// メニュー開閉の制御
export function initMenuControl() {
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
