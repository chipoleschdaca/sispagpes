<?php

//CARREGAR DOMPDF
include('../dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$id = $_GET['id'];
$id_req = $_GET['id_req'];


//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents("http://localhost/sispagpes/rel/historico_exant_pdf.php?id=" . $id . "&id_req=" . $id_req)); //.$id_orc)); //O problema que em vez de "rel/rel_orcamentos.php?id=".$id" o professor colocou "rel/rel_orcamentos_class.php?id=".$id"

//INICIALIZAR A CLASSE DO DOMPDF
$pdf = new Dompdf();

//TAMANHO DO PAPEL E ORIENTAÇÃO
$pdf->setPaper('A4', 'portrait');

//CARREGAR CONTEÚDO HTML
$pdf->loadHtml(utf8_decode($html));

//RENDERIZAR PDF
$pdf->render();

//NOMINAR PDF GERADO
$pdf->stream(
  'RelatorioOS.pdf',
  array("Attachment" => false) //Se quiser que a página faça o download automaticamente, basta alterar para true.
);
