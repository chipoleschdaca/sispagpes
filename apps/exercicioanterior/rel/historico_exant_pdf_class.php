<?php
include('../../../conexao.php');
include('../../../plugins/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$id = $_GET['id'];
$id_req = $_GET['id_req'];
$nup = implode('_', array_reverse(explode('/', $_GET['nup'])));
$nup2 = implode('_', array_reverse(explode('_', $nup)));

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url . "/apps/exercicioanterior/rel/historico_exant_pdf.php?id=" . $id . "&id_req=" . $id_req . "&nup=" . $nup));

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
  'NUP ' . $nup2 . '.pdf',
  array("Attachment" => false) //Se quiser que a página faça o download automaticamente, basta alterar para true.
);
