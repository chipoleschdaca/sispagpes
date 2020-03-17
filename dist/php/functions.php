<?php
function footer()
{
  echo '<strong><a href="#">SISPAGPES </a>&copy; 2019-' . date("Y") . '</strong>. Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. <div class="float-right d-none d-sm-inline-block"><b>Versão</b> 1.0.0</div>';
}
function Alerta($type, $title, $msg)
{
  echo "<script type='text/javascript'>
        Swal.fire({
          type: '$type',
          title: '$title',
          text: '$msg',
          showConfirmButton: false,
          timer: 2000
        });
        </script>";
}
function AlertaExcluir($type, $title, $msg)
{
  echo "<script type='text/javascript'>
        Swal.fire({
        title: 'Tem certeza?',
        text: 'You wont be able to revert this!',
        icon: 'warning',
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
          )
        }
      })
      </script>";
}
