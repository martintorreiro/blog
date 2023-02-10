const getFotosNoticias = (idNoticia) => {
  $.post(`service/fotos-noticias.php?idNoticia=${idNoticia}`, function (data) {
    $("#listado-fotos").html(data);
    const boton = document.querySelectorAll(".borrar-foto");

    boton.forEach((btn) => {
      btn.addEventListener("click", (e) => {
        $.post(
          `service/borrar.php?id=${e.target.dataset.id}&foto=${e.target.dataset.foto}`,
          function (data) {
            data = JSON.parse(data);
            if (data["resultado"]) {
              getFotosNoticias(idNoticia);
            }
          }
        );
      });
    });
  });
};
