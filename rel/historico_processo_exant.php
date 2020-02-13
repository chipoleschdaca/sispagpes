<?php
session_start();
include('../verificar_login.php');
include('../conexao.php');
if ($_SESSION['perfil_usuario'] != 'EXANT') {
  header('Location: ../index.php');
  exit();
}

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
  <!-- Bootstrap 4 -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
  <!-- Main content -->
  <div class="wrapper">
    <div class="cabecalho">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="padding: 25px;">
          <h3>Requerente: <strong><?php echo $posto ?> <?php echo $situacao ?> <?php echo $requerente ?></strong></h3>
          <h3>Processo nº: <strong><?php echo $nup ?></strong></h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12" style="text-align:center;">
        <h4>Histórico</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="table-responsive col-sm-8" style="border-radius: 3px; margin: 20px; width: 95%;">
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
                <td class="align-middle" style="width: 4.7%;">
                  <?php echo data($data); ?><br>
                  De: <b> <?php echo $old_secao; ?></b><br>
                  Para: <b><?php echo $new_secao; ?></b>
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
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row no-print">
    <div class="col-12" style="text-align:center;">
      <button class="btn btn-default" href="#" onclick="window.print();"><i class="fas fa-print"></i> Imprimir</button>
      <a class="btn btn-primary" type="button" href="historico_exant_pdf_class.php?id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>" style="margin-right: 5px;"><i class="fas fa-download"></i> Gerar PDF</a>
    </div>
  </div>
</body>

</html>