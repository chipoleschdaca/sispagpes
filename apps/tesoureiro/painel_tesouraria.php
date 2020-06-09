<?php
session_start();
include('../../conexao.php');
include('../../verificar_login.php');
include('../../dist/php/functions.php');
login('TESOU', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php head('../../') ?>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">
    <?php navbar() ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_tesouraria.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="painel_tesouraria.php" class="nav-link active">
                <i class="nav-icon far fa-chart-bar"></i>
                <p>
                  Painel de Controle
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <!--<div class="row">
            <div class="col-12" style="display: inline">
              <img src="../../dist/icons/big-data.svg" class="nav-icon" style="width:4rem; height:4rem;">
              <h1 style="display: inline; vertical-align:middle; margin-left: 15px;">Painel de Controle</h1>
            </div>
          </div>-->
          <br>
          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><i class="far fa-folder-open"></i> Exercício Anterior</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><i class="fas fa-door-open"></i> Tempo Médio</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false"><i class="far fa-comment-dots"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false"><i class="fas fa-tools"></i> Settings</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-accountability-tab" data-toggle="pill" href="#custom-tabs-three-accountability" role="tab" aria-controls="custom-tabs-three-accountability" aria-selected="false"><i class="fas fa-cash-register"></i> Prestação de Contas</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                      <div class="row">
                        <div class="col-9">
                          <section class="connectedSortable">
                            <form class="form-inline">
                              <div class="col-md-12" id="tabcharts">
                                <label for="txtpesquisar">Filtrar:
                                </label>
                                <div style="position:relative; width: 22%;">
                                  <select class="form-control select2" name="txtposto" style="border-radius:3px; width: 100%;">
                                    <option value="" selected>POSTO/GRAD.</option>
                                    <?php
                                    $query_posto = "SELECT r.posto as id_posto, p.posto as nome_posto FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto GROUP BY r.posto";
                                    $result_posto = mysqli_query($conexao, $query_posto);
                                    while ($res_p = mysqli_fetch_array($result_posto)) {
                                      $id = $res_p['id_posto'];
                                      $posto = $res_p['nome_posto'];
                                    ?>
                                      <option value="<?php echo $id ?>"><?php echo $posto ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                                <div style="position:relative; width: 22%;">
                                  <select class="form-control select2" id="txtdireitopleiteado" name="txtdireitopleiteado" placeholder="DIREITO PLEITEADO" style="border-radius:3px; width: 100%;">
                                    <option value="">DIREITO PLEITEADO</option>
                                    <?php
                                    $query_direito = "SELECT d.id as id_direito, d.direito as direito_pleiteado, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON d.id = e.direito_pleiteado GROUP BY e.direito_pleiteado";
                                    $result_direito = mysqli_query($conexao, $query_direito);
                                    while ($res_dir = mysqli_fetch_array($result_direito)) {
                                      $id = $res_dir['id_direito'];
                                      $direito = $res_dir['direito_pleiteado'];
                                      $count_direito = $res_dir['COUNT(e.direito_pleiteado)'];
                                    ?>
                                      <option value="<?php echo $id ?>"><?php echo $direito . " | " . $count_direito ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                                <div style="position:relative; width: 22%;">
                                  <select class="form-control select2" id="txtestado" name="txtestado" style="border-radius:3px; width: 100%;">
                                    <option value="" selected>ESTADO DO PROCESSO</option>
                                    <?php
                                    $query_est = "SELECT est.id as id_estado, est.estado as estado_processo, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON est.id = e.estado GROUP BY e.estado";
                                    $result_est = mysqli_query($conexao, $query_est);
                                    while ($res_est = mysqli_fetch_array($result_est)) {
                                      $id_est_2 = $res_est['id_estado'];
                                      $estado_est = $res_est['estado_processo'];
                                      $count_estado = $res_est['COUNT(e.estado)'];
                                    ?>
                                      <option value="<?php echo $id_est_2 ?>"><?php echo $estado_est . " | " . $count_estado ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                                <div style="position:relative; width: 22%;">
                                  <select class="form-control select2" id="txtsecao" name="txtsecao" style="border-radius:3px;width: 100%;">
                                    <option value="" selected>SEÇÃO ATUAL</option>
                                    <?php
                                    $query_sec = "SELECT s.id as id_secao, s.secao as secao_atual, COUNT(e.secao_atual) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON s.id = e.secao_atual GROUP BY e.secao_atual";
                                    $result_sec = mysqli_query($conexao, $query_sec);
                                    while ($res_sec = mysqli_fetch_array($result_sec)) {
                                      $id_sec_2 = $res_sec['id_secao'];
                                      $secao_sec = $res_sec['secao_atual'];
                                      $count_secao = $res_sec['COUNT(e.secao_atual)'];
                                    ?>
                                      <option value="<?php echo $id_sec_2 ?>"><?php echo $secao_sec . " | " . $count_secao ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit" id="filter" name="buttonPesquisar" style="width: 36px; height: 36px; padding: 0px; margin: 0px;">
                                  <i class="fas fa-search" style="padding: 0px; margin:0px;"></i>
                                </button>
                              </div>
                            </form>
                            <hr />
                          </section>
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
                          <div class="row">
                            <section class="col-md-6 connectedSortable">
                              <div>
                                <canvas id="pieChart" style="height:200px; width: 400px;"></canvas>
                              </div>
                            </section>
                            <section class="col-md-6 connectedSortable">
                              <div>
                                <canvas id="donutChart" style="height:200px; width: 400px;"></canvas>
                              </div>
                            </section>
                          </div>
                          <br>
                          <div class="row">
                            <section class="col-md-6 connectedSortable">
                              <div>
                                <canvas id="myChart2" style="height:200px; width: 400px;"></canvas>
                              </div>
                            </section>
                            <section class="col-md-6 connectedSortable">
                              <canvas id="myChart" style="height:200px; width: 400px;"></canvas>
                            </section>
                          </div>
                        </div>
                        <div class="col-3">
                          <blockquote style="margin-top: 0;">
                            <h3>PRESTAÇÃO DE CONTAS</h3>
                            <br>
                            <table class="table table-sm table-borderless table-striped">
                              <thead style="text-align: center;">
                                <tr>
                                  <th class="align-middle">Seção</th>
                                  <th class="align-middle">Quantidade</th>
                                </tr>
                              </thead>
                              <tbody style="text-align: center;">
                                <?php
                                $query_account = "SELECT s.id as id_secao, s.secao as secao_atual, COUNT(e.secao_atual) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON s.id = e.secao_atual GROUP BY e.secao_atual ORDER BY s.secao ASC";
                                $result_account = mysqli_query($conexao, $query_account);
                                while ($res_account = mysqli_fetch_array($result_account)) {
                                  $id_account = $res_account['id_secao'];
                                  $secao_account = $res_account['secao_atual'];
                                  $count_secao2 = $res_account['COUNT(e.secao_atual)']; ?>
                                  <tr>
                                    <td class="align-middle">
                                      <?php echo $secao_account ?>
                                    </td>
                                    <td class="align-middle">
                                      <?php echo $count_secao2 ?>
                                    </td>
                                  </tr>
                                <?php
                                }
                                ?>
                              </tbody>
                            </table>
                          </blockquote>
                          <blockquote class="quote-danger">
                            <h3>PRAZO DAS SEÇÕES</h3>
                            <br>
                            <table class="table table-sm table-borderless table-striped">
                              <thead style="text-align: center;">
                                <tr>
                                  <th class="align-middle">Seção</th>
                                  <th class="align-middle">Prazo Ex. Ant. (dias)</th>
                                  <th class="align-middle">Ações</th>
                                </tr>
                              </thead>
                              <tbody style="text-align: center;">
                                <?php
                                $query_prazo = "SELECT id, secao, prazo_exant FROM tb_secoes_exant WHERE status = 'Aprovado' ORDER BY secao ASC";
                                $result_prazo = mysqli_query($conexao, $query_prazo);
                                while ($res_prazo = mysqli_fetch_array($result_prazo)) {
                                  $id_prazo = $res_prazo['id'];
                                  $secao_prazo = $res_prazo['secao'];
                                  $count_prazo = $res_prazo['prazo_exant']; ?>
                                  <tr>
                                    <td class="align-middle">
                                      <?php echo $secao_prazo ?>
                                    </td>
                                    <td class="align-middle" id="tdprazo">
                                      <?php echo $count_prazo ?>
                                    </td>
                                    <td class="align-middle">
                                      <a data-tt="tooltip" title="Alterar Prazo" style="width: 24px; height: 24px;" href="#"><i class="fas fa-tools"></i></a>
                                    </td>
                                  </tr>
                                <?php
                                }
                                ?>
                              </tbody>
                            </table>
                          </blockquote>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                      <?= tempoMedioSecao($conexao) ?>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                      Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                      Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-accountability" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                      Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
  <?php javascript('../../') ?>
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
        backgroundColor: ['#f56954', '#00a65a', 'red', '#f39c12', 'green', '#00c0ef', 'orange', '#3c8dbc', 'blue', '#d2d6de', '#9C0060', 'yellow', 'pink'],
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
</body>

</html>