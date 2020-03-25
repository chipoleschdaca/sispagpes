<?php
function footer()
{
  echo '<strong>&copy; 2019-' . date("Y") . '<a href="#"> SISPAGPES</a></strong>. Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. <div class="float-right d-none d-sm-inline-block"><b>Versão</b> 1.0.0</div>';
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

function AlertaLocation($type, $title, $msg, $location)
{
  echo "<script type='text/javascript'>
        Swal.fire({
          type: '$type',
          title: '$title',
          text: '$msg',
          showConfirmButton: false,          
          timer: 2000
        },
        function (){
        window.location.href='$location'
        });
        </script>";
}

function AnoAtual()
{
  echo date("Y") . " ";
}

function data($data)
{
  return date("d/m/Y", strtotime($data));
}

function data_show($data)
{
  $data = implode('/', array_reverse(explode('-', $data)));
  echo $data;
}

function data_db($data)
{
  $data = implode('-', array_reverse(explode('/', $data)));
  echo $data;
}

function data2()
{
  // leitura das datas
  $dia = date('d');
  $mes = date('m');
  $ano = date('Y');

  // configuração mês

  switch ($mes) {

    case 1:
      $mes = "janeiro";
      break;
    case 2:
      $mes = "fevereiro";
      break;
    case 3:
      $mes = "março";
      break;
    case 4:
      $mes = "abril";
      break;
    case 5:
      $mes = "maio";
      break;
    case 6:
      $mes = "junho";
      break;
    case 7:
      $mes = "julho";
      break;
    case 8:
      $mes = "agosto";
      break;
    case 9:
      $mes = "setembro";
      break;
    case 10:
      $mes = "outubro";
      break;
    case 11:
      $mes = "novembro";
      break;
    case 12:
      $mes = "dezembro";
      break;
  }
  //Agora basta imprimir na tela...
  print("$dia de $mes de $ano");
}

function diferenca($a, $b)
{
  if (strtotime($a) - strtotime($b) > 0) {
    return (strtotime($a) - strtotime($b)) / (60 * 60 * 24);
  } else {
    return (strtotime($b) - strtotime($a)) / (60 * 60 * 24);
  }
}
