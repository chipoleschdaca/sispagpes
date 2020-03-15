<?php
include('../../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="../../../dist/img/gapls.png">
  <title>SISPAGPES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../dist/css/style_print_button.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
  .hold-transition {
    padding: 100px;
    top: 50%;
    left: 50%;
  }

  .form-control {
    border-radius: 3%;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <section class="content">
    <div class="container-fluid">
      <br>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <label for="txtsaram" style="margin-right: 10px">SARAM:</label>
                <input type="search" class="form-control" id="txtsaram" name="txtsaram" placeholder="Digite o SARAM" style="border-radius: 5%" autocomplete="off">
                <button class="btn btn-navbar" type="submit" name="buttonPesquisar">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <a type="button" class="btn btn-primary btn-sm" href="consultar_processo.php" id="novapesquisa" name="button" style="text-transform: capitalize;"><i class="fas fa-check"></i> Nova Pesquisa</a>
            </form>
            <div class="table-responsive" style="text-align: center;">
              <?php
              if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram'] != '') {
                $saram = $_GET['txtsaram'];
                $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.nup, e.direito_pleiteado, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, d.direito as dir_direito, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE r.saram LIKE '$saram'";

                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
              ?>
                <table class="table table-sm table-bordered table-striped">
                  <thead class="text-primary">
                    <th class="align-middle">Requerente</th>
                    <th class="align-middle">NUP</th>
                    <th class="align-middle">Direito Pleiteado</th>
                    <th class="align-middle">Estado</th>
                    <th class="align-middle">Seção Atual</th>
                  </thead>
                  <?php
                  while ($res_1 = mysqli_fetch_array($result)) {
                    $id = $res_1["id"];
                    $id_req = $res_1["id_req"];
                    $requerente = $res_1["req_nome"];
                    $nup = $res_1["nup"];
                    $direito_pleiteado = $res_1["dir_direito"];
                    $estado = $res_1["est_estado"];
                    $secao_atual = $res_1['sec_atual'];
                  ?>
                    <tbody>
                      <tr>
                        <td class="align-middle"><?php echo $requerente; ?></td>
                        <td class="align-middle"><?php echo $nup; ?></td>
                        <td class="align-middle"><?php echo $direito_pleiteado; ?></td>
                        <td class="align-middle"><?php echo $estado; ?></td>
                        <td class="align-middle"><?php echo $secao_atual; ?></td>
                      </tr>
                    </tbody>
                  <?php } ?>
                </table>
              <?php
              } else if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram'] == '') {
                echo "<h3> Sua pesquisa não retornou nenhum resultado! </h3>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- jQuery -->
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Mask -->
  <script src="../../../plugins/jQuery-Mask/dist/jquery.mask.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Select2 -->
  <script src="../../../plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="../../../plugins/jqvmap/maps/jquery.vmap.brazil.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../../plugins/moment/moment.min.js"></script>
  <script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../../dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../../dist/js/demo.js"></script>
  <script>
    $(document).ready(function() {
      $('#txtsaram').mask('000.000-0', {
        reverse: true
      });
    });
  </script>
</body>

</html>