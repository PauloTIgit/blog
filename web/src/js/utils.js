// utils.js

export function smoothScrollToTop(duration = 600) {
  const start = window.scrollY;
  const startTime = performance.now();

  function step(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easeOut = 1 - Math.pow(1 - progress, 3);

    window.scrollTo(0, start * (1 - easeOut));

    if (progress < 1) requestAnimationFrame(step);
  }

  requestAnimationFrame(step);
}

export function togglePassword(type) {
  $(document).ready(function () {
    $(type).on("click", function () {
      const inputId = $(this).data("target");
      const input = $("#" + inputId);
      const icon = $(this).find("i");

      const tipoAtual = input.attr("type");
      if (tipoAtual === "password") {
        input.attr("type", "text");
        icon.removeClass("ph-eye").addClass("ph-eye-slash");
      } else {
        input.attr("type", "password");
        icon.removeClass("ph-eye-slash").addClass("ph-eye");
      }
    });
  });

}

export function ajax({ url, method, contentType, data, onSuccess }) {
  $.ajax({
    url: url,
    type: method,
    contentType: contentType,
    data: JSON.stringify(data),
    success: function (response) {
      console.log("response", response);

      if (response.success) {

        if (onSuccess) {
          onSuccess(response)
        } else {
          toastr.success(response.msg);
        }

        if (response.data.url) {
          window.location.href = response.data.url ? response.data.url : '/login';
        }
      } else {
        toastr.warning(response.msg);
      }

    },
    error: function (xhr) {
      const resposta = xhr.responseJSON;
      console.error(xhr)
      toastr.error(resposta?.mensagem || "Erro interno. Contate o suporte.");
    }
  });
}


export function navAdmin(secionId, linkId) {
  document.addEventListener('DOMContentLoaded', function () {
    const secionAdmin = document.getElementById(secionId);
    const adminLink = document.getElementById(linkId);
    if (secionAdmin && secionAdmin.offsetParent !== null && adminLink) {
      adminLink.classList.add('text-blue-600');
      adminLink.classList.add('font-medium');
    }
  });
}