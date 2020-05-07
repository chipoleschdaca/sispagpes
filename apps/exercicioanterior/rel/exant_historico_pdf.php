<?php
  include('../../../verificar_login.php');
  include('../../../conexao.php');
  include('../../../plugins/mpdf-6.1.3/mpdf.php');
  date_default_timezone_set('America/Sao_paulo');
  
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
  $id_req = $_GET['id_req'];
  
  $query     = "SELECT * FROM exercicioanterior where id = '$id'";
  $result    = mysqli_query($conexao, $query);
  $res_exant = mysqli_fetch_array($result);
  $nup       = $res_exant["nup"];
  $secao_atual = $res_exant['secao_atual'];
  
  $id_req = $_GET['id_req'];
  $query_req = "SELECT r.posto, r.situacao, r.nome, r.dt_nascimento, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.id = '$id_req'";
  $result_req = mysqli_query($conexao, $query_req);
  $row_req = mysqli_num_rows($result_req);
  $res_1 = mysqli_fetch_array($result_req);
  $requerente = $res_1['nome'];
  $posto = $res_1['nome_posto'];
  $situacao = $res_1["situacao"];
  $dtNascimento = $res_1['dt_nascimento'];
  
  
  $header = "<div class='row' style='text-align: right'>Página [{PAGENO}/{nbpg}]</div>";
  $html = "
<fieldset>
  <div class='cabecalho'>
    <div class='img-cab'><img src='../../../dist/icons/accept-colored.svg'/></div>
    <div class='texto-cab'><b>Histórico de Tramitação de Processo de Exercício Anterior</b></div>
    <h6>Requerente: <strong>". $posto." ". $situacao ." ". $requerente ."</strong></h6>
    <h6>Processo nº: <strong>" . $nup . "</strong></h6>
  </div>";
  $html .= "<div class='col-sm-12' align='right' style='margin: 0'>";
  if (descobrirIdade($dtNascimento) >= 60) {
    echo '<h1><span class="badge" style="border: none;">PRIORIDADE</span></h1>';
  } else {
    echo '';
  }
  $html .= "</div>";
  $html .= "<div class='table-responsive' style='border-radius: 3px; margin: 20px; width: 95%;'>";
  
  $query_h = "SELECT h.id as id_hist, h.data_anterior, h.data_novo, h.id_exant, h.responsavel, m.id as id_militar, m.nome as nome_militar, h.estado_anterior, h.estado_novo, h.secao_anterior, h.secao_novo, h.obs_exant, e.id, e.nup as e_nup, es.id as es_id, es.estado as es_anterior, est.estado as est_novo, s.id as s_id_anterior, s.secao as s_anterior, s.prazo_exant as prazo_secao_exant, sec.secao as sec_novo FROM tb_historico_exant_estado_secao as h LEFT JOIN exercicioanterior as e ON h.id_exant = e.id LEFT JOIN tb_estado_exant as es ON h.estado_anterior = es.id LEFT JOIN tb_estado_exant as est ON h.estado_novo = est.id LEFT JOIN tb_secoes_exant as s ON h.secao_anterior = s.id LEFT JOIN tb_secoes_exant as sec ON h.secao_novo = sec.id LEFT JOIN militares as m ON h.responsavel = m.id WHERE id_exant = ".$id." ORDER BY h.data_novo";
  $result_h = mysqli_query($conexao, $query_h);
  $row_h = mysqli_num_rows($result_h);
  
  $html .= "<table class='table table-sm table-borderless table-striped' style='width: 100%;'>
								<thead class='text-primary' style='text-align: center;'>
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
    $id_exant = $res_h["e_nup"];
    $nome_sacador = $res_h["nome_militar"];
    $old_estado = $res_h["es_anterior"];
    $new_estado = $res_h["est_novo"];
    $old_secao = $res_h["s_anterior"];
    $new_secao = $res_h["sec_novo"];
    $obs_exant = $res_h["obs_exant"];
  
    $query_prazo = "SELECT prazo_exant FROM tb_secoes_exant WHERE secao = '$secao_atual'";
    $result_prazo = mysqli_query($conexao, $query_prazo);
    $res_prazo = mysqli_fetch_array($result_prazo);
    $prazo_secao = $res_prazo['prazo_exant'];
  
    $prazo_pessoal_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
    $prazo_pagpes_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
    $prazo_controle_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
    $prazo_sdpp_cons = date('Y-m-d', strtotime('+' . $prazo_secao . ' days', strtotime($res_h["data_anterior"])));
    $today_cons = date('Y-m-d');
    
    $html .= "<tr><td class='align-middle'>";
    if ($old_secao == "") {
      $html .= "Criado na: <br><b> $new_secao </b>";
    } else {
      $html .= "De:   <b>$old_secao</b><br>
                Para: <b>$new_secao</b>";
    }
    $html .= "</td>";
    $html .= "<td class='align-middle'>
							<strong>$new_estado</strong><br>";
						  if ($res_h['obs_exant'] == '') {
							 $html .= "Não há";
							} else {
							$html .= "<p style='text-align: justify;'>$obs_exant</p>";
							}
		$hmtl .= "</td>";
		$html .= "<td class='align-middle' style='text-align: center;'>".data($data_novo)."</td>";
    if ($old_secao == 'DP-1' or $old_secao == 'DP-4' or $old_secao == 'ES-LS') {
      $html .= "<td class='align-middle' style='text-align:center;'>" . data($prazo_pessoal_cons) . "</td>";
    } elseif ($old_secao == 'DP-3') {
      $html .= "<td class='align-middle' style='text-align:center;'>" . data($prazo_pagpes_cons) . "</td>";
    } elseif ($old_secao == 'ACI-1') {
      $html .= "<td class='align-middle' style='text-align:center;'>" . data($prazo_controle_cons) . "</td>";
    } elseif ($old_secao == 'SDPP') {
      $html .= "<td class='align-middle' style='text-align:center;'>" . data($prazo_sdpp_cons) . "</td>";
    } else {
      $html .= "<td class='align-middle' style='text-align:center;'>" . data($prazo_pessoal_cons) . "</td>";
    }
    $html .= "<td class='align-middle' style='text-align:center;'>Aqui vai entrar a meta</td>";
    $html .= "<td class='align-middle' style='text-align: center;'>$nome_sacador</td>";
    $html .= "</tr>";
    //Final do While
  }
  
  
  $html .= "</tbody>
							</table>
						</div>";
  $html .= "</fieldset>";
  $footer = "<hr><div class='footer' style='font-size: 10px; text-align: right;'>Emissão: ".date('d/m/Y - H:i:s')."</div>";
  
  $mpdf = new mPDF('utf-8','A4-L',0, '',10, 10, 15, 15);
  $mpdf->setDisplayMode('fullpage');
  $css = file_get_contents('../../../dist/css/mpdf.css');
  $mpdf->WriteHTML($css, 1);
  $mpdf->setHTMLHeader($header);
  $mpdf->setHTMLFooter($footer);
  $mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
  $mpdf->Output();
  
  
