import { togglePassword, ajax } from "./utils";

togglePassword('.toggle-senha-login');

$(document).ready(function () {
  $("#formLogin").on("submit", function (e) {
    e.preventDefault();

    const email = $("#email").val();
    const senha = $("#senha").val();
    const lembrar = $("#lembrar").val();

    if (senha.length < 6) {
      toastr.warning("Sua senha deve ter no mínimo 6 caracteres.");
      return;
    }

    const objetoAjax = {
      url: 'login',
      method: 'POST',
      contentType: 'json',
      data: {
        email,
        senha,
        lembrar
      }
    }

    ajax(objetoAjax);

  });
});