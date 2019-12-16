<?php 

//CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['id'];

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents("http://localhost/sispagpes/rel/rel_orcamentos.php?id=".$id)); //O problema que em vez de "rel/rel_orcamentos.php?id=".$id" o professor colocou "rel/rel_orcamentos_class.php?id=".$id"

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
		'RelatorioOrcamento.pdf',
		array("Attachment" => false) //Se quiser que a página faça o download automaticamente, basta alterar para true.
	);

 ?>