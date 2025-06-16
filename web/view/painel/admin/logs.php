<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen">
    <?php component('nav-admin') ?>

    <section class="w-full p-6" id="secion-logs">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Logs do Sistema</h2>

      <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full table-auto">
          <thead class="bg-gray-100 text-left">
            <tr class="text-sm text-gray-600">
              <th class="px-4 py-3">Data</th>
              <th class="px-4 py-3">Usuário</th>
              <th class="px-4 py-3">Ação</th>
              <th class="px-4 py-3">IP</th>
            </tr>
          </thead>
          <tbody class="text-sm text-gray-700">
            <!-- Loop PHP -->
            <tr class="border-t hover:bg-gray-50">
              <td class="px-4 py-3">07/06/2025 15:24</td>
              <td class="px-4 py-3">admin</td>
              <td class="px-4 py-3">Atualizou artigo #15</td>
              <td class="px-4 py-3">192.168.0.1</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</body>