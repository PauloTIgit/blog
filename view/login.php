
<main class="min-h-screen flex items-center justify-center px-4">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md ">
    <h1 class="text-2xl font-bold text-center text-[var(--color-primary)] mb-6">Acesso ao Sistema</h1>

    <form action="login" method="POST" class="space-y-4">
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

      <div class="flex items-center justify-between">
        <label class="inline-flex items-center">
          <input type="checkbox" class="form-checkbox text-[var(--color-primary)]">
          <span class="ml-2 text-sm text-gray-600">Lembrar login</span>
        </label>
        <a href="#" class="text-sm text-[var(--color-primary)] hover:text-[var(--color-primary-dark)]">Esqueci a senha</a>
      </div>

      <button type="submit"
        class="w-full bg-[var(--color-primary)] hover:bg-[var(--color-primary-dark)] text-white py-2 px-4 rounded-lg transition duration-200">
        Entrar
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Não tem uma conta?
      <a href="cadastro" class="text-[var(--color-primary)] hover:text-[var(--color-primary-dark)] font-medium">Cadastre-se</a>
    </p>
  </div>
</main>