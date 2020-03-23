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

function data2($n)
{
  // leitura das datas
  $dia = date('d');
  $mes = date('m');
  $ano = date('Y');

  // configuração mês

  switch ($mes) {

    case 1:
      $mes = "Janeiro";
      break;
    case 2:
      $mes = "Fevereiro";
      break;
    case 3:
      $mes = "Março";
      break;
    case 4:
      $mes = "Abril";
      break;
    case 5:
      $mes = "Maio";
      break;
    case 6:
      $mes = "Junho";
      break;
    case 7:
      $mes = "Julho";
      break;
    case 8:
      $mes = "Agosto";
      break;
    case 9:
      $mes = "Setembro";
      break;
    case 10:
      $mes = "Outubro";
      break;
    case 11:
      $mes = "Novembro";
      break;
    case 12:
      $mes = "Dezembro";
      break;
  }
  //Agora basta imprimir na tela...
  print("$dia de $mes de $ano");
}
