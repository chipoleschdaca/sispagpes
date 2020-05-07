<?php
date_default_timezone_set('America/Sao_paulo');

function head($diretorio)
{ ?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="<?php echo $diretorio ?>dist/img/gapls.png">
  <title>SISPAGPES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo $diretorio ?>dist/css/style_print_button.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/daterangepicker/daterangepicker.css">
  <!-- JQuery UI -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/jquery-ui/jquery-ui.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $diretorio ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Material Design-->
  <link href="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- SweetAlert2 -->
  <script src="<?php echo $diretorio ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo $diretorio ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Toastr -->
  <script src="<?php echo $diretorio ?>plugins/toastr/toastr.min.js"></script>

<?php
}

function footer()
{ ?>
  <strong>&copy; 2019-<?php echo date("Y") ?> <a href="#"> SISPAGPES</a></strong>. Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. <div class="float-right d-none d-sm-inline-block"><b>Versão</b> 1.0.0</div>
<?php
}

function javascript($diretorio)
{ ?>

  <!-- jQuery -->
  <script src="<?php echo $diretorio ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Mask -->
  <script src="<?php echo $diretorio ?>plugins/jquery-mask/dist/jquery.mask.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo $diretorio ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Select2 -->
  <script src="<?php echo $diretorio ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo $diretorio ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo $diretorio ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo $diretorio ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo $diretorio ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo $diretorio ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="<?php echo $diretorio ?>plugins/jqvmap/maps/jquery.vmap.brazil.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo $diretorio ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo $diretorio ?>plugins/moment/moment.min.js"></script>
  <script src="<?php echo $diretorio ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo $diretorio ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?php echo $diretorio ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo $diretorio ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo $diretorio ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo $diretorio ?>dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo $diretorio ?>dist/js/demo.js"></script>
  <!-- Material Design-->
  <script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>
  <!--IonIcon-->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <!--DataTables-->
  <script type="text/javascript" charset="utf8" src="<?php echo $diretorio ?>plugins/datatables/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo $diretorio ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <script>
    $(document).ready(function() {
      $('#txtsaram').mask('000.000-0', {
        reverse: true
      });
      $('#txtcpf').mask('000.000.000-00', {
        reverse: true
      });
      $('#txtnup').mask('00000.000000/0000-00', {
        reverse: true
      });
      $('#txtsaram2').mask('000.000-0', {
        reverse: true
      });
      $('#txtcpf2').mask('000.000.000-00', {
        reverse: true
      });
      $('#txtnup2').mask('00000.000000/0000-00', {
        reverse: true
      });
      $('#txtsaram3').mask('000.000-0', {
        reverse: true
      });
      $('#txtcpf3').mask('000.000.000-00', {
        reverse: true
      });
      $('#txtdtnascimento').mask('00/00/0000', {
        reverse: true
      });
      $('#txtdtnascimento2').mask('00/00/0000', {
        reverse: true
      });
    });
  </script>
  <script>
    $(function() {
      $("#datepicker").datepicker({

        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior',
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true,
        selectOtherMonths: true
      });
    });
  </script>
  <script>
    $('[data-toggle="popover"]').popover({
      placement: 'auto',
      trigger: 'hover'
    });
  </script>
  <script>
    $("[data-tt=tooltip]").tooltip({
      placement: 'auto'
    });
  </script>
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Initialize Select2 Elements
      $('.select2').select2()
    });
  </script>
<?php
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
        }, 1500);
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
          timer: 1500          
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
          timer: 1500
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
        timer: 2000
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
  return date("Y") . " ";
}

function data($data)
{
  return date("d/m/Y", strtotime($data));
}

function data_show($data)
{
  $data = implode('/', array_reverse(explode('-', $data)));
  return $data;
}

function data_db($data)
{
  $data = implode('-', array_reverse(explode('/', $data)));
  return $data;
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

function descobrirIdade($dataNascimento)
{
  $dn = new DateTime($dataNascimento);
  $agora = new DateTime();

  $idade = date_diff($agora, $dn);
  return $idade->y;
}
