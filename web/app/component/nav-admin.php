<!-- Sidebar -->
<aside class="w-64 bg-white shadow-md">
  <div class="p-6 border-b">
    <h1 class="text-2xl font-bold text-blue-600">Painel Admin</h1>
    <p class="text-sm text-gray-500">Bem-vindo, <?= $_SESSION['usuario']['nome'] ?? 'Admin' ?>!</p>
  </div>
  <nav class="p-4">
    <ul class="space-y-2 text-gray-700">
      <li><a href="./admin" id="admin" class="flex items-center gap-2 p-2 rounded hover:bg-blue-100"><i class="ph ph-gauge text-xl"></i> Dashboard</a></li>
      <li><a href="./admin-artigos" id="artigos" class="flex items-center gap-2 p-2 rounded hover:bg-blue-100"><i class="ph ph-note-pencil text-xl"></i> Artigos</a></li>
      <li><a href="./admin-usuarios" id="usuarios" class="flex items-center gap-2 p-2 rounded hover:bg-blue-100"><i class="ph ph-users text-xl"></i> Usuários</a></li>
      <li><a href="./admin-logs" id="logs" class="flex items-center gap-2 p-2 rounded hover:bg-blue-100"><i class="ph ph-scroll text-xl"></i> Logs</a></li>
      <li><a href="sair" class="flex items-center gap-2 p-2 rounded text-red-600 hover:bg-red-100"><i class="ph ph-sign-out text-xl"></i> Sair</a></li>
    </ul>
  </nav>
</aside>