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
$query_req = "select * from requerentes where id = '$id_req'";
$result_req = mysqli_query($conexao, $query_req);
//$dado = mysqli_fetch_array($result);
$row_req = mysqli_num_rows($result_req);
$res_1 = mysqli_fetch_array($result_req);
$requerente = $res_1['nome'];
$posto = $res_1['posto'];
$situacao = $res_1["situacao"];

$query_2 = "SELECT h.id as id_hist, h.data, h.id_exant, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_anterior, s.secao as s_anterior, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id WHERE id_exant = '$id' ORDER BY data";
$result_2 = mysqli_query($conexao, $query_2);
$row_2 = mysqli_num_rows($result_2);
$res_2 = mysqli_fetch_array($result_2);

$id_hist = $res_2["id_hist"];
$data = data($res_2["data"]);
$id_exant = $res_2["e_nup"];
$old_estado = $res_2["es_anterior"];
$new_estado = $res_2["est_novo"];
$old_secao = $res_2["s_anterior"];
$new_secao = $res_2["sec_novo"];
$obs_exant = $res_2["obs_exant"];

function data($data)
{
  return date("d/m/Y", strtotime($data));
}
?>
<script src='../plugins/pdfmake/pdfmake.min.js'></script>
<script src='../plugins/pdfmake/vfs_fonts.js'></script>
<script>
  var docDefinition = {
    content: [{
      layout: 'lightHorizontalLines', // optional
      table: {
        // headers are automatically repeated if the table spans over multiple pages
        // you can declare how many rows should be treated as headers
        headerRows: 1,
        widths: ['*', 'auto', 100, '*'],

        body: [
          ['<?php echo $new_estado; ?>', '<?php echo $old_secao; ?>', '<?php echo $data; ?>', 'The last one'],
          ['aaaaa', 'Value 2', 'Value 3', 'Value 4'],
          [{
            text: 'Bold value',
            bold: true
          }, 'Val 2', 'Val 3', 'Val 4']
        ]
      }
    }]
  };
  pdfMake.createPdf(docDefinition).open();
</script>