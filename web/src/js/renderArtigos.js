import { ajax } from "./utils.js";

export function carregarArtigos({ onSuccess }) {
  ajax({
    url: "./artigo",
    method: "POST",
    contentType: "json",
    data: { acao: "listar" },
    onSuccess
  });
}

export function renderizarArtigos(artigos) {
  const container = document.getElementById("artigos-container");
  container.innerHTML = ""; // limpa conteúdo anterior

  artigos.forEach(artigo => {
    const card = document.createElement("article");
    card.className = "bg-white shadow rounded-2xl p-5 hover:shadow-lg transition duration-300";

    card.innerHTML = `
      <img src="${artigo.imagem}" alt="Capa do artigo" class="rounded-lg mb-4 h-48 w-full object-cover">
      <h3 class="text-xl font-bold text-gray-800 mb-2">${artigo.titulo}</h3>
      <p class="text-sm text-gray-600 mb-4">${artigo.descricao}</p>
      <a href="${artigo.link}" class="text-blue-600 hover:underline font-medium">Ler mais →</a>
    `;

    container.appendChild(card);
  });
}
