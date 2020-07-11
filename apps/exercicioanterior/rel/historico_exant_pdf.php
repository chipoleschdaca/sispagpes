<?php
include('../../../verificar_login.php');
include('../../../conexao.php');
include('../../../plugins/mpdf-6.1.3/mpdf.php');

date_default_timezone_set('America/Sao_paulo');

function diferenca($a, $b)
{
  return (strtotime($a) - strtotime($b)) / (60 * 60 * 24);
}

function descobrirIdade($dataNascimento)
{
  $dn = new DateTime($dataNascimento);
  $agora = new DateTime();

  $idade = date_diff($agora, $dn);
  return $idade->y;
}

function data($data)
{
  return date("d/m/Y", strtotime($data));
}

$id = $_GET['id'];


$query     = "SELECT * FROM exercicioanterior WHERE id = '$id'";
$result    = mysqli_query($conexao, $query);
$res_exant = mysqli_fetch_array($result);
$nup       = $res_exant["nup"];
$secao_atual = $res_exant['secao_atual'];

$id_req = $_GET['id_req'];
$query_req = "SELECT r.id, r.posto, r.situacao, r.nome, r.dt_nascimento, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
$result_req = mysqli_query($conexao, $query_req);
$row_req = mysqli_num_rows($result_req);
$res_1 = mysqli_fetch_array($result_req);
$requerente = $res_1['nome'];
$posto = $res_1['nome_posto'];
$situacao = $res_1["situacao"];
$dtNascimento = $res_1['dt_nascimento'];


$header = "<div class='header'>";
$header .= "";
if (($dtNascimento) == '0000-00-00') {
  $header .= "";
} else if (descobrirIdade($dtNascimento) >= 60) {
  $header .= "<div class='badge'><span style='margin: 0'>PRIORIDADE</span></div>";
}
else {
  $header .= '';
}
$header .= "</div>";

$html = "
<fieldset>
  <ul class='cabecalho'>    
    <li class='left'><img class='img-dom' src='../../../dist/icons/brasao-republica.jpeg'/></li>
    <li class='center'>
	    <div class='mindef'>MINISTÉRIO DA DEFESA</div>
	    <div class='comaer'>COMANDO DA AERONÁUTICA</div>
	    <div class='unidade'>GRUPAMENTO DE APOIO DE LAGOA SANTA</div>
    </li>
    <li class='right' style='font-size: 10px'>v1.0.1</li>
  </ul>    
    <div class='texto-cab'><b>Histórico de Tramitação de Processo de Exercício Anterior</b></div>
    <div>Requerente: <strong>" . $posto . " " . $situacao . " " . $requerente . "</strong></div>
    <div>Processo nº: <strong>" . $nup . "</strong></div>
  <hr>";
$html .= "<div class='table-responsive' style='border-radius: 3px;'>";

$query_h = "SELECT h.id as id_hist, h.data_anterior, h.data_novo, h.id_exant, h.responsavel, m.id as id_militar, m.nome as nome_militar, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_id_anterior, s.secao as s_anterior, s.prazo_exant as prazo_secao_exant, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id LEFT JOIN militares as m ON h.responsavel = m.id WHERE id_exant = " . $id . " ORDER BY h.data_novo";
$result_h = mysqli_query($conexao, $query_h);
$row_h = mysqli_num_rows($result_h);

$html .=
  "<table class='table table-sm'>
    <thead>
      <tr>
        <th class='align-middle'>Movimento</th>
        <th class='align-middle'>Observação</th>
        <th class='align-middle'>Dt. Movimento</th>
        <th class='align-middle'>Dt. Prazo</th>
        <th class='align-middle'>Meta</th>
        <th class='align-middle'>Responsável</th>
      </tr>
    </thead>
    <tbody>";

while ($res_h = mysqli_fetch_array($result_h)) {
  $id_hist = $res_h["id_hist"];
  $data_anterior = $res_h["data_anterior"];
  $data_novo = $res_h["data_novo"];
  $id_exant = $res_h["id_exant"];
  $nome_sacador = $res_h["nome_militar"];
  $old_estado = $res_h["es_anterior"];
  $new_estado = $res_h["est_novo"];
  $old_secao = $res_h["s_anterior"];
  $new_secao = $res_h["sec_novo"];
  $obs_exant = $res_h["obs_exant"];

  $queryPrazo = "SELECT prazo_exant FROM tb_secoes_exant WHERE secao = '$old_secao'";
  $resultPrazo = mysqli_query($conexao, $queryPrazo);
  $resPrazo = mysqli_fetch_array($resultPrazo);
  $prazoSecao = $resPrazo['prazo_exant'];
  $dtPrazoSecao_cons = date('Y-m-d', strtotime('+' . $prazoSecao . ' days', strtotime($res_h["data_anterior"])));
  $today = date('Y-m-d');

  $html .= "<tr><td class='align-middle'>";
  if ($old_secao == "") {
    $html .= "Criado na: <br><b>$new_secao</b>";
  } else {
    $html .= "De:   <b>$old_secao</b><br>
              Para: <b>$new_secao</b>";
  }
  $html .= "</td>";
  $html .= "<td class='align-middle' style='width:45%; text-align: justify;'>
							<strong>$new_estado</strong><br>";
  if ($res_h['obs_exant'] == '') {
    $html .= "Não há";
  } else {
    $html .= "<span>$obs_exant</span>";
  }
  $html .= "</td>";
  $html .= "<td class='align-middle' style='text-align: center;'>" . data($data_novo) . "</td>";
  $html .= "<td class='align-middle' style='text-align:center;'>";
  if ($old_secao == '') {
    $html .= "----------";
  } else {
    $html .= data($dtPrazoSecao_cons);
  }
  $html .= "</td>";
  if ($old_secao == '') {
    $html .= "<td class='align-middle;' style='background-color: rgba(0, 128, 0, 0.3); text-align:center;'>Criado</td>";
  } elseif (diferenca($dtPrazoSecao_cons, $data_novo) < 0) {
    $html .= "<td class='align-middle' style='background-color: rgba(255,0,0,0.3); text-align:center;'>" . number_format(diferenca($dtPrazoSecao_cons, $data_novo)) . "</td>";
  }
  elseif (diferenca($dtPrazoSecao_cons, $data_novo) >= 0) {
    $html .= "<td class='align-middle' style='background-color: rgba(0, 128, 0, 0.3); text-align:center;'>" . number_format(diferenca($dtPrazoSecao_cons, $data_novo)) . "</td>";
  }
  else {
    $html .= "<td class='align-middle' style='text-align:center;'>" . number_format(diferenca($dtPrazoSecao_cons, $data_novo)) . "</td>";
  }
  $html .= "<td class='align-middle' id='nomeSacador' style='text-align: center; width: 15%;'>$nome_sacador</td>";
  $html .= "</tr>";
  //Final do While
}

$html .= "</tbody>
							</table>
						</div>";
$html .= "</fieldset>";
$footer = "<hr>
              <ul class='footer'>                
                <li class='left'>Emissão: " . date('d/m/Y - H:i:s') . "</li>
                <li class='right'>Página {PAGENO} de {nbpg}</li>
              </ul>";

$mpdf = new mPDF('utf-8', 'A4-L');
$mpdf->setDisplayMode('fullpage');
$css = file_get_contents('../../../dist/css/mpdf.css');
$mpdf->WriteHTML($css, 1);
$mpdf->setHTMLHeader($header);
$mpdf->setHTMLFooter($footer);
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
