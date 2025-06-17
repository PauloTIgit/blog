<body class="bg-gray-100 font-sans">

  <div class="flex min-h-screen">

    <?php component('nav-admin') ?>

    <!-- Conteúdo principal -->
    <main class="flex-1 p-6" id="secion-admin">
      <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <p class="text-gray-500">Total de Artigos</p>
          <h3 class="text-2xl font-bold text-blue-600">12</h3>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <p class="text-gray-500">Usuários Registrados</p>
          <h3 class="text-2xl font-bold text-green-600">5</h3>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
          <p class="text-gray-500">Logs Recentes</p>
          <h3 class="text-2xl font-bold text-yellow-600">38</h3>
        </div>
      </div>

    </main>

  </div>

</body>