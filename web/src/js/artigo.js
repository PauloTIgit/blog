import { carregarArtigos, renderizarArtigos } from "./renderArtigos.js";

carregarArtigos({ onSuccess: (data) => renderizarArtigos(data.data) });