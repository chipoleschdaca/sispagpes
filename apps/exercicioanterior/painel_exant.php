<?php
session_start();
include('../../verificar_login.php');
include('../../conexao.php');
include('../../dist/php/functions.php');
login('EXANT', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php head('../../') ?>
</head>
<style>
  #tabcharts {
    display: flex;
    justify-content: space-between
  }

  #filter {
    position: relative;
    text-align: center;
  }
</style>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Este é a tag que faz aparecer o nome aparece no menu direito superior. -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars"></i>
            <?= $_SESSION['nome_usuario'] ?>
            <span class="d-lg-none d-md-block">Some Actions</span>
          </a>
          <!-- Dropdown - User Information -->
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_exant.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="painel_exant.php" class="nav-link active">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Exercício Anterior</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="requerentes.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>
                      Requerentes
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="processos_exant.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Processos</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <br>
          <div class="row">
            <section class="col-md-12 connectedSortable">
              <form class="form-inline">
                <div class="card col-md-12">
                  <div class="card-body" style="padding-left: 5px">
                    <div class="input-group input-group-sm" id="tabcharts">
                      <label for="txtpesquisar">Filtrar:
                      </label>
                      <div style="width: 22%;">
                        <select class="form-control select2" name="txtposto" style="border-radius:3px; margin-right:20px; width: 100%;">
                          <option value="" selected>POSTO/GRAD.</option>
                          <?php
                          $query_posto = "SELECT r.posto as id_posto, p.posto as nome_posto FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto GROUP BY r.posto";
                          $result_posto = mysqli_query($conexao, $query_posto);
                          while ($res_p = mysqli_fetch_array($result_posto)) {
                            $id = $res_p['id_posto'];
                            $posto = $res_p['nome_posto'];
                          ?>
                            <option value="<?= $id ?>"><?= $posto ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>
                      <div style="width: 22%;">
                        <select class="form-control select2" id="txtdireitopleiteado" name="txtdireitopleiteado" placeholder="DIREITO PLEITEADO" style="border-radius:3px; margin-right:20px; width: 100%;">
                          <option value="">DIREITO PLEITEADO</option>
                          <?php
                          $query_direito = "SELECT d.id as id_direito, d.direito as direito_pleiteado, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON d.id = e.direito_pleiteado GROUP BY e.direito_pleiteado";
                          $result_direito = mysqli_query($conexao, $query_direito);
                          while ($res_dir = mysqli_fetch_array($result_direito)) {
                            $id = $res_dir['id_direito'];
                            $direito = $res_dir['direito_pleiteado'];
                            $count_direito = $res_dir['COUNT(e.direito_pleiteado)'];
                          ?>
                            <option value="<?= $id ?>"><?= $direito . " | " . $count_direito ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>
                      <div style="width: 22%;">
                        <select class="form-control select2" id="txtestado" name="txtestado" style="border-radius:3px; margin-right:20px; width: 100%;">
                          <option value="" selected>ESTADO DO PROCESSO</option>
                          <?php
                          $query_est = "SELECT est.id as id_estado, est.estado as estado_processo, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON est.id = e.estado GROUP BY e.estado";
                          $result_est = mysqli_query($conexao, $query_est);
                          while ($res_est = mysqli_fetch_array($result_est)) {
                            $id_est_2 = $res_est['id_estado'];
                            $estado_est = $res_est['estado_processo'];
                            $count_estado = $res_est['COUNT(e.estado)'];
                          ?>
                            <option value="<?= $id_est_2 ?>"><?= $estado_est . " | " . $count_estado ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>
                      <div style="width: 22%;">
                        <select class="form-control select2" id="txtsecao" name="txtsecao" style="border-radius:3px; margin-left:10px; width: 100%;">
                          <option value="" selected>SEÇÃO ATUAL</option>
                          <?php
                          $query_sec = "SELECT s.id as id_secao, s.secao as secao_atual, COUNT(e.secao_atual) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON s.id = e.secao_atual GROUP BY e.secao_atual";
                          $result_sec = mysqli_query($conexao, $query_sec);
                          while ($res_sec = mysqli_fetch_array($result_sec)) {
                            $id_sec_2 = $res_sec['id_secao'];
                            $secao_sec = $res_sec['secao_atual'];
                            $count_secao = $res_sec['COUNT(e.secao_atual)'];
                          ?>
                            <option value="<?= $id_sec_2 ?>"><?= $secao_sec . " | " . $count_secao ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>
                      <button class="btn btn-primary btn-sm" type="submit" id="filter" name="buttonPesquisar" style="width: 36px; height: 36px;">
                        <i class="fas fa-search" style="padding: 0px; margin:0px;"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </section>
          </div>
          <div class="row">
            <section class="col-md-6 connectedSortable">
              <div class="card">
                <div class="card-body">
                  <canvas id="pieChart" style="height:150px; width: 400px;"></canvas>
                </div>
              </div>
            </section>
            <section class="col-md-6 connectedSortable">
              <div class="card">
                <div class="card-body">
                  <canvas id="donutChart" style="height:150px; width: 400px;"></canvas>
                </div>
              </div>
            </section>
          </div>
          <div class="row">
            <section class="col-md-6 connectedSortable">
              <div class="card">
                <div class="card-body">
                  <canvas id="myChart2" style="height:150px; width: 400px;"></canvas>
                </div>
              </div>
            </section>
            <section class="col-md-6 connectedSortable">
              <div class="card">
                <div class="card-body">
                  <canvas id="myChart" style="height:150px; width: 400px;"></canvas>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <?php footer() ?>
    </footer>
    <?php

    $id = "";
    $id_req = "";
    $direito_pleiteado = "";
    $estado = "";
    $secao = "";
    $posto = "";
    $count_direito = "";
    $count_estado = "";
    $count_secao = "";
    $count_posto = "";

    // Filtro para POSTO
    if (isset($_GET['buttonPesquisar']) and $_GET['txtposto'] != '') {

      $nome = $_GET['txtposto'];

      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, r.posto, p.posto, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, r.posto, p.posto, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, r.posto, p.posto, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }

      // Filtro para DIREITO PLEITEADO
    } elseif (isset($_GET['buttonPesquisar']) and $_GET['txtdireitopleiteado'] != '') {

      $nome = $_GET['txtdireitopleiteado'];

      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE direito_pleiteado = '$nome' GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id WHERE direito_pleiteado = '$nome' GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE direito_pleiteado = '$nome' GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id WHERE direito_pleiteado = '$nome' GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
      // Filtro para ESTADO
    } elseif (isset($_GET['buttonPesquisar']) and $_GET['txtestado'] != '') {

      $nome = $_GET['txtestado'];

      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE estado = '$nome' GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id WHERE estado = '$nome' GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE e.estado = '$nome' GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id WHERE estado = '$nome' GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }

      // Filtro para SEÇÃO ATUAL
    } elseif (isset($_GET['buttonPesquisar']) and $_GET['txtsecao'] != '') {

      $nome = $_GET['txtsecao'];

      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE secao_atual = '$nome' GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id WHERE secao_atual = '$nome' GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE secao_atual = '$nome' GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id WHERE secao_atual = '$nome' GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    } else {
      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    }
    ?>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  <?= javascript('../../') ?>
  <script src="../../dist/js/functions.js"></script>
  <script>
    var donutChartCanvas = document.getElementById('pieChart');
    var donutData = {
      labels: [
        <?= $direito_pleiteado ?>
      ],
      datasets: [{
        data: [<?= $count_direito ?>],
        backgroundColor: ['#f56954', '#00a65a', 'red', '#f39c12', 'green', '#00c0ef', 'orange', '#3c8dbc', 'blue', '#d2d6de', '#9C0060', 'yellow', 'pink'],
      }]
    }
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: {
        tooltips: {
          callbacks: {
            title: function(tooltipItem, data) {
              return data['labels'][tooltipItem[0]['index']];
            },
            label: function(tooltipItem, data) {
              return data['datasets'][0]['data'][tooltipItem['index']];
            },
            afterLabel: function(tooltipItem, data) {
              var dataset = data['datasets'][0];
              var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100);
              return '(' + percent + '%)';
            }
          },
          //backgroundColor: '#FFF',
          cornerRadius: 5,
          titleFontSize: 12,
          titleFontColor: '#FFF',
          bodyFontColor: '#FFF',
          bodyFontSize: 10,
          displayColors: false
        },
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'QUANTIDADE vs. DIREITO PLEITEADO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 10,
            boxWidth: 40
          }
        }
      }
    })
  </script>
  <script>
    var donutChartCanvas1 = document.getElementById('donutChart');
    var donutData1 = {
      labels: [
        <?= $estado ?>
      ],
      datasets: [{
        data: [<?= $count_estado ?>],
        backgroundColor: ['#9C0060', '#d2d6de', '#f56954', '#f39c12', '#00c0ef', '#00a65a', '#3c8dbc'],
      }]
    }
    var donutChart1 = new Chart(donutChartCanvas1, {
      type: 'doughnut',
      data: donutData1,
      options: {
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'QUATIDADE vs. ESTADO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: 'rgb(0,0,0)',
            fontSize: 10,
            boxWidth: 40
          }
        }
      }
    })
  </script>
  <script>
    var barChartCanvas1 = document.getElementById('myChart2');
    var barData1 = {
      labels: [
        <?= $secao ?>
      ],
      datasets: [{
        data: [<?= $count_secao ?>],
        backgroundColor: ['#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd'],
      }]
    }
    var barChart1 = new Chart(barChartCanvas1, {
      type: 'horizontalBar',
      data: barData1,
      options: {
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }]
        },
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'SEÇÃO ATUAL'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 16
          }
        }
      }
    })
  </script>
  <script>
    var barChartCanvas = document.getElementById('myChart');
    var barData = {
      labels: [
        <?= $posto ?>
      ],
      datasets: [{
        data: [<?= $count_posto ?>],
        backgroundColor: ['#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd']
      }]
    }
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barData,
      options: {
        animation: {
          duration: 2000
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }]
        },
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'QUANTIDADE vs. POSTO'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 16
          }
        }
      }
    })
  </script>
</body>

</html>