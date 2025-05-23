import { smoothScrollToTop } from './utils.js';

document.addEventListener('DOMContentLoaded', () => {
  const scrollBtn = document.getElementById('scrollTopBtn');
  if (!scrollBtn) return;

  // Exibe/oculta o botão com classe 'show'
  window.addEventListener('scroll', () => {
    const shouldShow = window.scrollY > 300;
    scrollBtn.classList.toggle('show', shouldShow);
    scrollBtn.classList.toggle('hidden', !shouldShow);
  });

  // Rolagem suave universal
  scrollBtn.addEventListener('click', () => smoothScrollToTop(600));
});