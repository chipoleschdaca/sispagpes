<?php

include('../../../conexao.php');
$saram = $_GET['txtsaram'];
?>

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
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <div class="row">
      <div class="col-5"></div>
      <div class="col-2">
        <div class="inline-block">
          <label for="saram">SARAM:</label>
          <input type="text" class="form-control mr-2" id="txtsaram" name="txtsaram" placeholder="Digite o SARAM" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit" name="buttonPesquisar">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <a class="btn btn-info btn-sm" href="consultar_processo.php?func=consulta&id=<?php echo $id; ?>&saram=<?php echo $saram ?>"><i class="fas fa-eye"></i></a>
        </div>
      </div>
      <div class="col-5"></div>
      <div class="table-responsive" style="text-align: center;">
        <?php
        if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram'] != '') {
          $saram = $_GET['txtsaram'];

          $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.nup, e.direito_pleiteado, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, d.direito as dir_direito, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE r.saram = '$saram'";
        } else {
          $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.nup, e.direito_pleiteado, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, d.direito as dir_direito, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id ORDER BY e.id";
        }

        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        ?>
        <table class="table table-sm table-bordered table-striped">
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


            <thead class="text-primary">
              <th class="align-middle">Requerente</th>
              <th class="align-middle">NUP</th>
              <th class="align-middle">Direito Pleiteado</th>
              <th class="align-middle">Estado</th>
              <th class="align-middle">Seção Atual</th>
            </thead>
            <tbody>
              <tr>
                <td class="align-middle"><?php echo $requerente; ?></td>
                <td class="align-middle"><?php echo $nup; ?></td>
                <td class="align-middle"><?php echo $direito_pleiteado; ?></td>
                <td class="align-middle"><?php echo $estado; ?></td>
                <td class="align-middle"><?php echo $secao_atual; ?></td>
              </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
        if ($row == '') {
          echo "<h3> Sua pesquisa não retornou nenhum resultado! </h3>";
        }
        ?>
      </div>
    </div>
  </div>
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Mask -->
  <script src="../../../plugins/jQuery-Mask/dist/jquery.mask.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../../plugins/moment/moment.min.js"></script>
  <script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="../../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
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
  <style>
    .body {
      margin: 0;
      padding: 0;
    }

    .row {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      text-align: center;
    }

    .btn {
      display: inline-block;
      width: 70px;
      height: 70px;
      background-color: #f1f1f1;
      margin: 10px;
      border-radius: 50%;
      box-shadow: 0 5px 15px -5px #00000070;
      color: #007bff;
      overflow: hidden;
      position: relative;
    }

    .btn i {
      margin: 0px;
      font-size: 26px;
      transition: 0.2s linear;
    }

    .btn:hover i {
      transform: scale(1.5);
      color: #f1f1f1;
    }

    .btn::before {
      content: "";
      position: absolute;
      width: 130%;
      height: 130%;
      background: #007bff;
      transform: rotate(45deg);
      left: -110%;
      top: 90%;
    }

    .btn:hover::before {
      animation: aaa 1s 1;
      top: -10px;
      left: -10px;
    }

    /*
    @keyframes aaa {
      0% {
        left: -110%;
        top: 90%;
      }

      50% {
        left: 10%;
        top: -30%;
      }

      100% {
        left: -10%;
        top: -10%;
      }
    }
    */
  </style>
</body>