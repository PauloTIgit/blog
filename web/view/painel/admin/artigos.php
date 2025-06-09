<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen">
    <?php component('nav-admin') ?>

    <section class="w-full p-6" id="secion-artigos">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Artigos</h2>
        <a href="admin-artigos-novo" class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          <i class="ph ph-plus"></i> Novo Artigo
        </a>
      </div>

      <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full table-auto">
          <thead class="bg-gray-100 text-left">
            <tr class="text-sm text-gray-600">
              <th class="px-4 py-3">Título</th>
              <th class="px-4 py-3">Autor</th>
              <th class="px-4 py-3">Data</th>
              <th class="px-4 py-3">Ações</th>
            </tr>
          </thead>
          <tbody class="text-sm text-gray-700">
            <!-- Loop PHP aqui -->
            <tr class="border-t hover:bg-gray-50">
              <td class="px-4 py-3">Título Exemplo</td>
              <td class="px-4 py-3">João Silva</td>
              <td class="px-4 py-3">07/06/2025</td>
              <td class="px-4 py-3 flex gap-2">
                <a href="#" class="text-blue-600 hover:underline"><i class="ph ph-pencil-simple"></i></a>
                <a href="#" class="text-red-600 hover:underline"><i class="ph ph-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

  </div>
</body>