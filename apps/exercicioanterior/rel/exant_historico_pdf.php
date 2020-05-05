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
  
  
