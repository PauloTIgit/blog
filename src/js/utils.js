// utils.js

export function smoothScrollToTop(duration = 600) {
  const start = window.scrollY;
  const startTime = performance.now();

  function step(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easeOut = 1 - Math.pow(1 - progress, 3);

    window.scrollTo(0, start * (1 - easeOut));

    if (progress < 1) requestAnimationFrame(step);
  }

  requestAnimationFrame(step);
}
