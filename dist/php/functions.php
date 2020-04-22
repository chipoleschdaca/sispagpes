<?php
function head($a)
{
  echo '
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="' . $a . 'dist/img/gapls.png">
	<title>SISPAGPES</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="' . $a . 'plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="' . $a . 'plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="' . $a . 'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="' . $a . 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="' . $a . 'plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="' . $a . 'plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="' . $a . 'dist/css/adminlte.min.css">
	<link rel="stylesheet" href="' . $a . 'dist/css/style_print_button.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="' . $a . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="' . $a . 'plugins/daterangepicker/daterangepicker.css">
	<!-- JQuery UI -->
	<link rel="stylesheet" href="' . $a . 'plugins/jquery-ui/jquery-ui.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="' . $a . 'plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Material Design-->
	<link href="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- SweetAlert2 -->
	<script src="' . $a . 'plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="' . $a . 'plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- Toastr -->
  <script src="' . $a . 'plugins/toastr/toastr.min.js"></script>';
}

function footer()
{
  echo '<strong>&copy; 2019-' . date("Y") . '<a href="#"> SISPAGPES</a></strong>. Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. <div class="float-right d-none d-sm-inline-block"><b>Versão</b> 1.0.0</div>';
}

function Alerta($type, $title, $msg, $location)
{
  echo "<script type='text/javascript'>
        Swal.fire({
          type: '$type',
          title: '$title',
          text: '$msg',
          showConfirmButton: false          
        });
        setTimeout(function() {          
          window.location='$location';
        }, 2000);
        </script>";
}

function AlertaConsulta($type, $title, $msg)
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

function AlertaExcluir($type, $title, $msg, $location)
{
  echo "<script type='text/javascript'>
        Swal.fire({
        title: '$title',
        text: '$msg',
        icon: '$type',
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
      },
       window.location='$location'
    )      
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

function Toast($type, $title)
{
  echo "<script>  
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });     
      Toast.fire({
        type: '$type',
        title: '$title'
      })
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
  return (strtotime($a) - strtotime($b)) / (60 * 60 * 24);
}
