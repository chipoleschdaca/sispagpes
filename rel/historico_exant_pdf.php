<?php

include('../conexao.php');

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

function data($data)
{
  return date("d/m/Y", strtotime($data));
}
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
  <link rel="stylesheet" href="../plugins/bootstrap3.3.7/css/bootstrap.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
  @page {
    margin: 50px;

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
      <h3>Requerente: <span id="cab"><?php echo $posto ?> <?php echo $situacao ?> <?php echo $requerente ?></span></h3>
      <h3>Processo nº: <span id="cab"><?php echo $nup ?></span></h3>
    </div>
    <div class="container">
      <div class="row">
        <div class="historico">
          <h3>Histórico</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $query2 = "SELECT h.id as id_hist, h.data, h.id_exant, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant as obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_anterior, s.secao as s_anterior, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id WHERE id_exant = '$id' ORDER BY data";
        $result2 = mysqli_query($conexao, $query2);
        $row2 = mysqli_num_rows($result2);
        ?>
        <table class="table table-sm table-bordered table-striped">
          <tbody>
            <?php
            while ($res_2 = mysqli_fetch_array($result2)) {
              $id_hist = $res_2["id_hist"];
              $data = $res_2["data"];
              $id_exant = $res_2["e_nup"];
              $old_estado = $res_2["es_anterior"];
              $new_estado = $res_2["est_novo"];
              $old_secao = $res_2["s_anterior"];
              $new_secao = $res_2["sec_novo"];
              $obs_exant = $res_2["obs_exant"];
            ?>
              <tr>
                <td class="coluna" style="vertical-align: middle;">
                  <?php echo data($data); ?><br>
                  De: <span id="cab" style="font-weight: bold;"> <?php echo $old_secao; ?></span><br>
                  Para: <span id="cab"><?php echo $new_secao; ?></span>
                </td>
                <td class="coluna" style="vertical-align: middle;">
                  <span id="cab"><?php echo $new_estado; ?></span><br>
                  <?php
                  if ($res_2["obs_exant"] == '') {
                    echo 'Não há';
                  } else { ?>
                    <p><?php echo $obs_exant; ?> </p>
                  <?php
                  }
                  ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="../plugins/bootstrap3.3.7/js/bootstrap.min.js"></script>

</body>

</html>