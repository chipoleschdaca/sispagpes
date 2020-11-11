<?php
session_start();
include('../../verificar_login.php');
include('../../conexao.php');
include('../../dist/php/functions.php');
login('EXANT', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('../../dist/php/pageHead.php'); ?>
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

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include('../../dist/php/pageNavbar.php'); ?>
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
                          $query_posto = "SELECT r.posto AS id_posto, p.posto AS nome_posto FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto";
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
                          $query_direito = "SELECT d.id AS id_direito, d.direito AS direito_pleiteado, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON d.id = e.direito_pleiteado WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.direito_pleiteado";
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
                          $query_est = "SELECT est.id AS id_estado, est.estado AS estado_processo, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON est.id = e.estado WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado";
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
                          $query_sec = "SELECT s.id AS id_secao, s.secao AS secao_atual, COUNT(e.secao_atual) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON s.id = e.secao_atual WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.secao_atual";
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
                        <i class="fas fa-search"></i>
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
    <?php include('../../dist/php/pageFooter.php'); ?>
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

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, r.posto, p.posto, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, r.posto, p.posto, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, r.posto, p.posto, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
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

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
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

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE e.estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
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

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    } else {
      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    }
    ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <?php include('../../dist/php/pageJavascript.php'); ?>
  <script>
    var donutChartCanvas = document.getElementById('pieChart');
    var donutData = {
      labels: [
        <?= $direito_pleiteado ?>
      ],
      datasets: [{
        data: [<?= $count_direito ?>],
        backgroundColor: ['#f56954', '#00a65a', 'red', '#f39c12', 'green', '#00c0ef', 'orange', '#3c8dbc', 'blue', '#9C0060', 'yellow', 'pink', '#4b0082', '#00ffff', '#2d3852', '#765536', '#fefed2', '#27283f'],
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
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'QUANTIDADE vs. DIREITO PLEITEADO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 8,
            boxWidth: 30
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
        backgroundColor: ['#f56954', '#00a65a', 'red', '#f39c12', 'green', '#00c0ef', 'orange', 'blue', '#3c8dbc', '#9C0060', 'yellow', 'pink', '#4b0082', '#00ffff', '#2d3852', '#765536', '#fefed2', '#27283f'],
      }]
    }
    var donutChart1 = new Chart(donutChartCanvas1, {
      type: 'doughnut',
      data: donutData1,
      options: {
        title: {
          display: true,
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'QUATIDADE vs. ESTADO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: 'rgb(0,0,0)',
            fontSize: 8,
            boxWidth: 30
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
        backgroundColor: ['#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd'],
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
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'SEÇÃO ATUAL'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 14
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
        backgroundColor: ['#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd', '#2216dd']
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
          padding: 10,
          position: 'top',
          fontColor: '#000000',
          fontSize: 14,
          text: 'QUANTIDADE vs. POSTO'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 14
          }
        }
      }
    })
  </script>
  <script>
    $.ajax({
      url: "http://api.sidra.ibge.gov.br/values/t/1419/n1/all/v/all/p/all/c315/7169,7170,7445,7486,7558,7625,7660,7712,7766,7786/d/v63%202,v66%204,v69%202,v2265%202?formato=json",
      type: "GET",
      dataType: "json",
      success: function(data) {
        console.log(data);
      },
      error: function() {
        console.log("Erro na requisição!");
      }
    });
  </script>
</body>

</html>