const guardarFotos = () => {
  const formulario = document.getElementById("formulario-fotos");
  formulario.addEventListener("submit", (e) => {
    const formData = new FormData(e.target);
    e.preventDefault();
    console.log(formData);
    $.post(`service/guardar-fotos.php?`, formData, function (data) {});
  });
};
