<?php
include('../../../../conexao.php');
include('../../../../dist/php/functions.php');
$id = $_GET['id'];
$id_req = $_GET['id_req'];

$query     = "SELECT * FROM exercicioanterior where id = '$id'";
$result    = mysqli_query($conexao, $query);
$res_nup   = mysqli_fetch_array($result);
$nup       = $res_nup["nup"];

$id_req = $_GET['id_req'];
$query_req = "SELECT r.posto, r.situacao, r.nome, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
$result_req = mysqli_query($conexao, $query_req);
$row_req = mysqli_num_rows($result_req);
$res_1 = mysqli_fetch_array($result_req);

$requerente = $res_1['nome'];
$posto = $res_1['nome_posto'];
$situacao = $res_1["situacao"];

?>

<!DOCTYPE html>
<html>

<head lang="pt-br">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $nup ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../../plugins/bootstrap3.3.7/css/bootstrap.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
  @page {
    margin: 50px;

  }

  .body {
    margin: 2cm;
  }

  .cabecalho {
    border: 1px solid #bcbcbc;
    padding-bottom: 10px;
    padding-top: 0px;
    padding-left: 10px;
    border-radius: 3px;
    margin-bottom: 10px;
    background-color: none;
  }

  footer {
    padding: 0;
    margin: 0;
    position: auto;
    bottom: 0cm;
    left: 0cm;
    right: 0cm;
    height: 2cm;
    text-align: right;
  }

  .historico {
    margin: 0;
    text-align: center;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border: 0.5px solid #bcbcbc;
    border-radius: 5px;
    padding: 0px;
    vertical-align: middle;
  }

  td {
    vertical-align: middle;
    display: table-cell;
  }

  .coluna {
    vertical-align: middle;
    display: table-cell;
  }

  span {
    font-weight: bold;
  }

  p {
    text-align: justify;
  }
</style>

<body>
  <!-- Main content -->
  <div class="wrapper">
    <div class="cabecalho">
      <h4>Requerente: <span id="cab"><?php echo $posto ?> <?php echo $situacao ?> <?php echo $requerente ?></span></h4>
      <h4>Processo nº: <span id="cab"><?php echo $nup ?></span></h4>
    </div>
    <div class="container">
      <div class="row">
        <?php
        $query2 = "SELECT h.id as id_hist, h.data_anterior, h.data_novo, h.id_exant, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant as obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_anterior, s.secao as s_anterior, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id WHERE id_exant = '$id' ORDER BY h.data_novo";
        $result2 = mysqli_query($conexao, $query2);
        $row2 = mysqli_num_rows($result2);
        ?>
        <table class="table table-sm table-bordered table-striped">
          <thead class="text-primary" style="text-align: center;">
            <tr>
              <th class="align-middle" style="text-align: center;">Movimento</th>
              <th class="align-middle" style="text-align: center;">Observação</th>
              <th class="align-middle" style="text-align: center;">Prazo</th>
              <th class="align-middle" style="text-align: center;">Meta</th>
            </tr>
          </thead>
          <?php
          while ($res_2 = mysqli_fetch_array($result2)) {
            $id_hist = $res_2["id_hist"];
            $data_anterior = $res_2["data_anterior"];
            $data_novo = $res_2["data_novo"];
            $id_exant = $res_2["e_nup"];
            $old_estado = $res_2["es_anterior"];
            $new_estado = $res_2["est_novo"];
            $old_secao = $res_2["s_anterior"];
            $new_secao = $res_2["sec_novo"];
            $obs_exant = $res_2["obs_exant"];

            $prazo_pessoal_cons = date('Y-m-d', strtotime('+15 days', strtotime($data_anterior = $res_2["data_anterior"])));
            $prazo_pagpes_cons = date('Y-m-d', strtotime('+10 days', strtotime($data_anterior = $res_2["data_anterior"])));
            $prazo_controle_cons = date('Y-m-d', strtotime('+10 days', strtotime($data_anterior = $res_2["data_anterior"])));
            $prazo_sdpp_cons = date('Y-m-d', strtotime('+120 days', strtotime($data_anterior = $res_2["data_anterior"])));
            $today_cons = date('Y-m-d');
          ?>
            <tbody>
              <tr>
                <td class="align-middle" style="width: 5%;">
                  <b><?php echo data($data_novo) . '<br>'; ?></b>
                  <?php
                  if ($old_secao == "") {
                    echo 'Criado na: ' . '<br>';
                    echo '<b>' . $new_secao . '</b>';
                  } else {
                    echo 'De: ' . '<b>' . $old_secao . '</b><br>';
                    echo 'Para: ' . '<b>' . $new_secao . '</b>';
                  } ?>
                </td>
                <td class="align-middle">
                  <strong><?php echo $new_estado; ?></strong><br>
                  <?php
                  if ($res_2["obs_exant"] == '') {
                    echo 'Não há';
                  } else { ?>
                    <p style="text-align: justify;"><?php echo $obs_exant; ?> </p>
                  <?php
                  }
                  ?>
                </td>
                <td class="align-middle" style="text-align:center;">
                  <?php
                  if ($old_secao == 'DP-1' or $old_secao == 'DP-4' or $old_secao == 'ES-LS') {
                    echo data($prazo_pessoal_cons);
                  } elseif ($old_secao == 'DP-3') {
                    echo data($prazo_pagpes_cons);
                  } elseif ($old_secao == 'ACI-1') {
                    echo data($prazo_controle_cons);
                  } elseif ($old_secao == 'SDPP') {
                    echo data($prazo_sdpp_cons);
                  } else {
                    echo data($prazo_pessoal_cons);
                  }
                  ?>
                </td>
                <?php
                if ($old_secao == 'DP-1' or $old_secao == 'DP-4' or $old_secao == 'ES-LS') {
                  if ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
                    echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } elseif ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
                    echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } else {
                    echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  }
                } elseif ($old_secao == 'DP-3') {
                  if ((diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
                    echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } elseif ((diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
                    echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } else {
                    echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_pagpes_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  }
                } elseif ($old_secao == 'ACI-1') {
                  if ((diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
                    echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_controle_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } elseif ((diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
                    echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_controle_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } else {
                    echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  }
                } elseif ($old_secao == 'SDPP') {
                  if ((diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) > 0) {
                    echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_sdpp_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } elseif ((diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
                    echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_sdpp_cons, $data_novo) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } else {
                    echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  }
                } else {
                  if ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) < 0) {
                    echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $$data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } elseif ((diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
                    echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  } else {
                    echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_pessoal_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  }
                }
                ?>
              </tr>
            <?php } ?>
            </tbody>
        </table>
        <footer class="main-footer">
          <?php echo data2(); ?>
        </footer>
      </div>
    </div>
  </div>
  <script src="../../../../plugins/bootstrap3.3.7/js/bootstrap.min.js">
  </script>

</body>

</html>