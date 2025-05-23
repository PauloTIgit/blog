document.addEventListener('DOMContentLoaded', () => {
  const overlay = document.getElementById('loadingOverlay');
  const main = document.querySelector("main");

  overlay.classList.remove('hidden');
  main.classList.add('desactive');

  setInterval(() => {
    overlay.classList.add('hidden');
    main.classList.remove('desactive');
  }, 1000)

  document.querySelectorAll('a[href]:not([target="_blank"])').forEach(link => {
    link.addEventListener('click', (e) => {
      const href = link.getAttribute('href');

      // Evita loading em âncoras ou páginas externas
      if (href.startsWith('#') || href.startsWith('http')) return;

      // Ativa o overlay e espera o navegador redirecionar
      overlay.classList.remove('hidden');
      main.classList.remove('desactive');
    });
  });
});

