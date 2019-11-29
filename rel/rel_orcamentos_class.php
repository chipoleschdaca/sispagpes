<?php 

$id = $_GET['id'];

//CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents("http://localhost/sispagpes/rel/rel_orcamentos.php?id=".$id)); //O problema que em vez de "rel/rel_orcamentos.php?id=".$id" o professor colocou "rel/rel_orcamentos_class.php?id=".$id"

//INICIALIZAR A CLASSE DO DOMPDF
$pdf = new DOMPDF();

	//TAMANHO DO PAPEL E ORIENTAÇÃO
	$pdf->set_paper('A4', 'portrait');

	//CARREGAR CONTEÚDO HTML
	$pdf->load_html(utf8_decode($html));

	//RENDERIZAR PDF
	$pdf->render();

	//NOMINAR PDF GERADO
	$pdf->stream(
		'RelatorioOrcamento.pdf',
		array("Attachment" => false)
	);

 ?> 