import { togglePassword, ajax } from "./utils";

togglePassword('.toggle-senha');

$(document).ready(function () {
  $("#formRegistro").on("submit", function (e) {
    e.preventDefault();

    const nome = $("#nome").val();
    const email = $("#email").val();
    const senha = $("#senha").val();

    if (senha.length < 6) {
      toastr.warning("Sua senha deve ter no mínimo 6 caracteres.");
      return;
    }

    const objetoAjax = {
      url: 'cadastro',
      method: 'POST',
      contentType: 'json',
      data: {
        nome,
        email,
        senha
      }
    }

    ajax(objetoAjax);

  });
});
