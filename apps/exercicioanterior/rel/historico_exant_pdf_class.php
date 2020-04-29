<?php

use Dompdf\Dompdf;

include('../../../conexao.php');
include('../../../plugins/dompdf/autoload.inc.php');

$id = $_GET['id'];
$id_req = $_GET['id_req'];
$nup = implode('_', array_reverse(explode('/', $_GET['nup'])));
$nup2 = implode('_', array_reverse(explode('_', $nup)));

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url . "/apps/exercicioanterior/rel/historico_exant_pdf.php?id=" . $id . "&id_req=" . $id_req . "&nup=" . $nup));

//INICIALIZAR A CLASSE DO DOMPDF
$dompdf = new Dompdf(["enable_remote" => true]);

//ob_start();
//require __DIR__ . "/apps/exercicioanterior/rel/historico_exant_pdf.php?id=" . $id . "&id_req=" . $id_req . "&nup=" . $nup;
//CARREGAR CONTEÚDO HTML
$dompdf->loadHtml(utf8_decode($html));

//TAMANHO DO PAPEL E ORIENTAÇÃO
$dompdf->setPaper('A4', 'portrait');
//RENDERIZAR PDF
$dompdf->render();
//NOMINAR PDF GERADO
$dompdf->stream(
  'NUP ' . $nup2 . '.pdf',
  array("Attachment" => false) //Se quiser que a página faça o download automaticamente, basta alterar para true.
);
