<main>
  <header class="text-white text-center py-8 z-50">
    <h1 class="text-3xl font-bold">Programação para Iniciantes</h1>
    <p class="text-lg mt-2">Aprenda do zero com teoria, prática e casos reais</p>
  </header>
  <div id="mainNav" class="bg-white shadow-md sticky mx-auto px-4 sm:px-6 lg:px-8 nav">
    <div class="flex items-center justify-between py-4">

      <!-- Botão hamburguer (aparece apenas no mobile) -->
      <span id="menuToggle" class="md:hidden text-blue-600 text-2xl focus:outline-none">
        <i class="ph ph-list"></i>
      </span>

      <!-- Links do menu (desktop) -->
      <div class="hidden md:flex gap-6 text-blue-600 font-semibold ml-auto w-full justify-center">
        <a href="./" class="hover:underline">Início</a>
        <a href="logica" class="hover:underline">Lógica</a>
        <a href="html-css" class="hover:underline">HTML e CSS</a>
        <a href="javascript" class="hover:underline">JavaScript</a>
        <a href="projetos" class="hover:underline">Projetos</a>
        <a href="sobre" class="hover:underline">Sobre</a>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobileMenu" class="hidden md:hidden flex-col gap-4 pb-4 text-blue-600 font-semibold">
      <a href="./" class="block py-1 hover:underline">Início</a>
      <a href="logica" class="block py-1 hover:underline">Lógica</a>
      <a href="html-css" class="block py-1 hover:underline">HTML e CSS</a>
      <a href="javascript" class="block py-1 hover:underline">JavaScript</a>
      <a href="projetos" class="block py-1 hover:underline">Projetos</a>
      <a href="sobre" class="block py-1 hover:underline">Sobre</a>
    </div>
  </div>
</main>

<script>
  document.getElementById('menuToggle').addEventListener('click', () => {
    const mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.toggle('hidden');
  });
</script>