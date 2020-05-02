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

function AlertaConsulta(tipo, titulo, msg) {

  Swal.fire({
    type: 'tipo',
    title: 'titulo',
    text: 'msg',
    showConfirmButton: false,
    timer: 2000
  });

}

function AlertaExcluir(tipo, titulo, msg, location) {

  Swal.fire({
    title: 'titulo',
    text: 'msg',
    icon: 'tipo',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        );
      }
    },
    window.location = 'location'
  )
}

function AlertaLocation(tipo, titulo, msg, location) {
  Swal.fire({
      type: 'tipo',
      title: 'titulo',
      text: 'msg',
      showConfirmButton: false,
      timer: 2000
    },
    function () {
      window.location.href = 'location';
    });
}

function Toast(tipo, titulo) {
  $(function () {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      type: 'tipo',
      title: 'titulo'
    });
  });
}