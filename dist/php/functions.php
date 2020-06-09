<?php
date_default_timezone_set('America/Sao_paulo');

function head($diretorio)
{ ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="<?= $diretorio ?>dist/img/gapls.png">
  <title>SISPAGPES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>dist/css/btn-table.css">
  <link rel="stylesheet" href="<?= $diretorio ?>dist/css/style_print_button.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="<?= $diretorio ?>plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="<?= $diretorio ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= $diretorio ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?= $diretorio ?>plugins/toastr/toastr.min.js"></script>
<?php
}

function navbar()
{ ?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <?php
    if ($_SESSION['perfil_usuario'] == 'ADMIN') { ?>
      <ul class="navbar-nav ml-auto" style="float: right;">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a class="dropdown-item" href="../exercicioanterior/painel_exant.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Sacador</a>
            <a class="dropdown-item" href="../tesoureiro/painel_tesouraria.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Tesouraria</a>
            <a class="dropdown-item" href="../admin/painel_admin.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Administrador</a>
          </div>
        </li>
      </ul>
    <?php
    }
    ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-bars"></i>
          <?= $_SESSION['nome_usuario'] ?>
          <span class="d-lg-none d-md-block">Some Actions</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Perfil
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Configurações
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Atividade
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../../logout.php" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Sair
          </a>
        </div>
      </li>
    </ul>
  </nav>
<?php
}

function footer()
{ ?>
  <span>&copy; 2019-<?= date("Y") ?> <a href="#"> SISPAGPES</a></span> - Desenvolvido por DANIEL ANGELO <span style="text-decoration: underline;"><b>CHIPOLESCH</b></span> DE ALMEIDA <b>1º Ten Int</b>
  <div class="float-right d-none d-sm-inline-block">v1.0.2</div>
<?php
}

function javascript($diretorio)
{ ?>
  <script src="<?= $diretorio ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= $diretorio ?>dist/js/adminlte.js"></script>
  <script src="<?= $diretorio ?>plugins/jquery-mask/dist/jquery.mask.js"></script>
  <script src="<?= $diretorio ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="<?= $diretorio ?>plugins/select2/js/select2.full.min.js"></script>
  <script src="<?= $diretorio ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $diretorio ?>plugins/chart.js/Chart.min.js"></script>
  <script src="<?= $diretorio ?>plugins/sparklines/sparkline.js"></script>
  <script src="<?= $diretorio ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= $diretorio ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="<?= $diretorio ?>plugins/jqvmap/maps/jquery.vmap.brazil.js"></script>
  <script src="<?= $diretorio ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="<?= $diretorio ?>plugins/moment/moment.min.js"></script>
  <script src="<?= $diretorio ?>plugins/daterangepicker/daterangepicker.js"></script>
  <script src="<?= $diretorio ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?= $diretorio ?>plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?= $diretorio ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?= $diretorio ?>dist/js/pages/dashboard.js"></script>
  <script src="<?= $diretorio ?>dist/js/demo.js"></script>
  <script src="<?= $diretorio ?>dist/js/myCharts.js"></script>
  <script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script type="text/javascript" charset="utf8" src="<?= $diretorio ?>plugins/datatables/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="<?= $diretorio ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

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
    $("[data-toggle=tooltip]").tooltip({
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
  $dia = date('d');
  $mes = date('m');
  $ano = date('Y');

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

function tempoMedioSecao($conn)
{
  function diferenca2($a, $b)
  {
    return (strtotime($a) - strtotime($b)) / (60 * 60 * 24);
  }
  $queryTempoMedio = "SELECT h.id, h.data_anterior AS old_data, h.data_novo AS new_data, h.secao_anterior, s.id AS id_secao, s.secao AS nome_secao FROM tb_historico_exant_estado_secao AS h LEFT JOIN tb_secoes_exant AS s ON h.secao_anterior = s.id WHERE s.id = '1'";
  $resultTempoMedio = mysqli_query($conn, $queryTempoMedio);
  $countRows = mysqli_num_rows($resultTempoMedio);
  if ($countRows == 0) {
    echo 'Não existem dados para serem exibidos';
  } else {
    $i = 0;
    $sumDif = 0;
    while ($resTempoMedio = mysqli_fetch_array($resultTempoMedio)) {
      $idSecao = $resTempoMedio['id_secao'];
      $nomeSecao = $resTempoMedio['nome_secao'];
      $oldData = $resTempoMedio['old_data'];
      $newData = $resTempoMedio['new_data'];
      $sumDif += diferenca2($newData, $oldData);
      $i++;
    }
    $tempoMedioSecao = number_format($sumDif / $i, 0);
    echo $nomeSecao . ': ' . $tempoMedioSecao . ' dias';
  }
}
