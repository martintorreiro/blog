const guardarFotos = () => {
  const form = document.querySelectorAll("#formulario-fotos");
  form.addEventListener("submit", () => {
    e.preventDefault();
    const formData = new FormData(e.target);
    $.post(`service/guardar-fotos.php?`, formData, function (data) {});
  });
};
