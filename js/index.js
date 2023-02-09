$(".form-comentarios input, .form-comentarios textarea").focus(function () {
  $(".form-comentarios").addClass("form-comentarios-focus");
});

$(".form-comentarios input, .form-comentarios textarea").focusout(function () {
  $(".form-comentarios").removeClass("form-comentarios-focus");
});
