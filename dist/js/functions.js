function Alerta(tipo, titulo, msg, location) {
  Swal.fire({
    type: 'tipo',
    title: 'titulo',
    text: 'msg',
    showConfirmButton: false
  });
  setTimeout(function () {
    window.location = 'location';
  }, 2000);
}