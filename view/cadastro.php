<main class="min-h-screen flex items-center justify-center px-4">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold text-center text-[var(--color-primary)] mb-6">Criar uma Conta</h1>

    <form action="cadastro" method="POST" class="space-y-4">
      <div>
        <label for="nome" class="block text-sm font-medium text-gray-700">Nome completo</label>
        <input type="text" name="nome" id="nome" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[var(--color-primary)] focus:border-[var(--color-primary)]">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" name="email" id="email" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[var(--color-primary)] focus:border-[var(--color-primary)]">
      </div>

      <div>
        <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
        <input type="password" name="senha" id="senha" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[var(--color-primary)] focus:border-[var(--color-primary)]">
      </div>

      <div>
        <label for="confirmar_senha" class="block text-sm font-medium text-gray-700">Confirmar senha</label>
        <input type="password" name="confirmar_senha" id="confirmar_senha" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[var(--color-primary)] focus:border-[var(--color-primary)]">
      </div>

      <button type="submit"
        class="w-full bg-[var(--color-primary)] hover:bg-[var(--color-primary-dark)] text-white py-2 px-4 rounded-lg transition duration-200">
        Cadastrar
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Já tem uma conta?
      <a href="login" class="text-[var(--color-primary)] hover:text-[var(--color-primary-dark)] font-medium">Entrar</a>
    </p>
  </div>
</main>