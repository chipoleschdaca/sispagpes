<?php
session_start();
include('../../../verificar_login.php');
include('../../../conexao.php');
include('../../../dist/php/functions.php');
login('EXANT', '../../../');

$id = $_GET['id'];
$id_req = $_GET['id_req'];

$query     = "SELECT * FROM exercicioanterior where id = '$id'";
$result    = mysqli_query($conexao, $query);
$res_nup   = mysqli_fetch_array($result);
$nup       = $res_nup["nup"];

$id_req = $_GET['id_req'];
$query_req = "SELECT r.posto, r.situacao, r.nome, r.dt_nascimento, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
$result_req = mysqli_query($conexao, $query_req);
$row_req = mysqli_num_rows($result_req);
$res_1 = mysqli_fetch_array($result_req);
$requerente = $res_1['nome'];
$posto = $res_1['nome_posto'];
$situacao = $res_1["situacao"];
$dtNascimento = $res_1['dt_nascimento'];
?>

<!DOCTYPE html>
<html>

<head lang="pt-br">
  <link rel="stylesheet" href="../../../dist/css/page_a4.css">
  <?php head('../../../') ?>
  <link rel="stylesheet" href="../../../dist/css/html_print.css">
</head>

<body>
  <!-- Main content -->
  <div class="page" id="geraPDF">
    <div class="subpage">
      <div class="col-sm-12" align="right" style="margin: 0">
        <?php
        if (descobrirIdade($dtNascimento) >= 60) {
          echo '<h1><span class="badge badge-danger" style="border: none;">PRIORIDADE</span></h1>';
        } else {
          echo '';
        } ?> </div>
      <div style="text-align: center; margin-bottom:15px">
        <img src="../../../dist/icons/brasao-do-brasil-republica.png" style="width:2cm; height: 2cm; margin:10px;"><br>
        <h5><b>MINISTÉRIO DA DEFESA</b></h5>
        <h5 style="text-decoration: underline">COMANDO DA AERONÁUTICA</h5>
        <h5>GRUPAMENTO DE APOIO DE LAGOA SANTA</h5>
      </div>
      <h6>Requerente: <strong><?php echo $posto ?> <?php echo $situacao ?> <?php echo $requerente ?></strong></h6>
      <h6>Processo nº: <strong><?php echo $nup ?></strong></h6>
      <div class="table-responsive" style="border-radius: 3px;" align="middle">
        <?php
        $query2 = "SELECT h.id as id_hist, h.data_anterior,h.data_novo, h.id_exant, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant as obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_anterior, s.secao as s_anterior, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id WHERE id_exant = '$id' ORDER BY h.data_novo";
        $result2 = mysqli_query($conexao, $query2);
        $row2 = mysqli_num_rows($result2);
        ?>
        <table class="table table-sm table-bordered table-striped" id="mytable">
          <thead class="text-primary" style="text-align: center;">
            <th class="align-middle">MOVIMENTO</th>
            <th class="align-middle">OBSERVAÇÃO</th>
            <th class="align-middle">PRAZO</th>
            <th class="align-middle">META</th>
          </thead>
          <tbody>
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

              $query_prazo = "SELECT prazo_exant FROM tb_secoes_exant WHERE secao = '$new_secao'";
              $result_prazo = mysqli_query($conexao, $query_prazo);
              $res_prazo = mysqli_fetch_array($result_prazo);
              $prazo_secao = $res_prazo['prazo_exant'];

              $prazo_pessoal_cons = date('Y-m-d', strtotime('+' . $prazo_secao . 'days', strtotime($res_2["data_anterior"])));
              $prazo_pagpes_cons = date('Y-m-d', strtotime('+' . $prazo_secao . 'days', strtotime($res_2["data_anterior"])));
              $prazo_controle_cons = date('Y-m-d', strtotime('+' . $prazo_secao . 'days', strtotime($res_2["data_anterior"])));
              $prazo_sdpp_cons = date('Y-m-d', strtotime('+' . $prazo_secao . 'days', strtotime($res_2["data_anterior"])));
              $today_cons = date('Y-m-d');
            ?>
              <tr>
                <td class="align-middle">
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
                <?php
                if ($old_secao == 'DP-1' or $old_secao == 'DP-4' or $old_secao == 'ES-LS') {
                  echo '<td class="align-middle" style="text-align:center;">' . data($prazo_pessoal_cons) . '</td>';
                } elseif ($old_secao == 'DP-3') {
                  echo '<td class="align-middle" style="text-align:center;">' . data($prazo_pagpes_cons) . '</td>';
                } elseif ($old_secao == 'ACI-1') {
                  echo '<td class="align-middle" style="text-align:center;">' . data($prazo_controle_cons) . '</td>';
                } elseif ($old_secao == 'SDPP') {
                  echo '<td class="align-middle" style="text-align:center;">' . data($prazo_sdpp_cons) . '</td>';
                } else {
                  echo '<td class="align-middle" style="text-align:center;">' . data($prazo_pessoal_cons) . '</td>';
                }

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
                    echo '<td class="align-middle" style="background-color: rgb(255,0,0, 0.5); text-align:center;">' . diferenca($prazo_controle_cons, $data_novo) . '</td>';
                  } elseif ((diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
                    echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . diferenca($prazo_controle_cons, $data_novo) . '</td>';
                  } else {
                    echo '<td class="align-middle" style="text-align:center;">' . (diferenca($prazo_controle_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) . '</td>';
                  }
                } elseif ($old_secao == 'SDPP') {
                  if ((diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) > 0) {
                    echo '<td class="align-middle" style="background-color: rgba(255,0,0,0.5); text-align:center;">' . diferenca($prazo_sdpp_cons, $data_novo) . '</td>';
                  } elseif ((diferenca($prazo_sdpp_cons, $data_anterior) - diferenca($data_novo, $data_anterior)) >= 0) {
                    echo '<td class="align-middle" style="background-color: rgb(0,128,0,0.5); text-align:center;">' . diferenca($prazo_sdpp_cons, $data_novo) . '</td>';
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
      </div>
    </div>
  </div>
  <div id="editor"></div>
  <div class="row no-print" style="visibility: visible">
    <div class="col-12" id="print_button">
      <button class="print-btn2" onclick="js:window.print();"><img src="../../../dist/icons/printer-colored.svg"></button>
      <button class="print-btn2" id="exportpdf" type="button"><img src="../../../dist/icons/pdf_file-colored.svg"></button>
      <button class="print-btn2" id="" type="button" onclick="js: window.location.href='exant_historico_pdf.php?id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>&nup=<?php echo $nup; ?>'"><img src="../../../dist/icons/pdf_file-colored.svg"></button>
      <!--<a class="print-btn2" type="button" href="historico_exant_pdf_class.php?id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>&nup=<?php echo $nup; ?>" target="_blank" rel=”noopener"><img src="../../../dist/icons/pdf_file-colored.svg"></a>
      <a class="print-btn" href="#" onclick="js:window.print();"><i class="fas fa-print"></i></a>
      <a class="print-btn" type="button" href="historico_exant_pdf_class.php?id=<?php echo $id; ?>&id_req=<?php echo $id_req; ?>&nup=<?php echo $nup; ?>" target="_blank" rel=”noopener">
        <i class="fas fa-file-pdf"></i>
      </a>-->
    </div>
  </div>
</body>
<script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>
<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- jsPDF -->
<script src="../../../plugins/jspdf/jspdf.min.js"></script>
<script src="../../../plugins/jspdf/jspdf.plugin.autotable.js"></script>
<script src="../../../plugins/jspdf/tableHTMLExport.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#exportpdf').click(function() {
      savePDF(document.querySelector('#geraPDF'));
    });
  });

  function savePDF(codigoHTML) {
    var doc = new jsPDF('portrait', 'pt', 'a4'),
      data = new Date();
    margins = {
      top: 40,
      bottom: 40,
      left: 40,
      right: 40
    };
    doc.fromHTML(codigoHTML,
      margins.left, // x coord
      margins.top, {
        pagesplit: true
      },
      function(dispose) {
        doc.save("Relatorio - " + data.getDate() + "/" + data.getMonth() + "/" + data.getFullYear() + ".pdf");
      });
  }
</script>

</html>