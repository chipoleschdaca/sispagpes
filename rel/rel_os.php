<?php
$id = $_GET['id'];
$id_orc = $_GET['id_orc'];

include('../conexao.php');

$query = "select o.id, o.requerente, o.tecnico, o.produto, o.serie, o.problema, o.laudo, o.valor_servico, o.pecas, o.valor_pecas, o.total, o.desconto, o.valor_total, o.data_abertura, o.data_geracao, o.status, c.nome as req_nome, c.email, c.saram, c.cpf, f.nome as func_nome from orcamentos as o INNER JOIN requerentes as c on o.requerente = c.cpf INNER JOIN militares as f on o.tecnico = f.id where o.id = '$id_orc'";

$result = mysqli_query($conexao, $query);
$res_1 = mysqli_fetch_array($result);
$data2 = implode('/', array_reverse(explode('-', $res_1['data_geracao'])));
function data($data){
	return date("d/m/Y", strtotime($data));
}
?>
<!DOCTYPE html>
<html>
<head lang="pt-br">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ordem de Serviço nº <?php echo $id ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap 4 -->

	<!-- Font Awesome -->
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
	@page {
		margin: 0px;

	}

	.wrapper {
		border: 2px solid #000;
		margin: 40px;
		padding: 10px;
	}

	.cabecalho {
		background-color: #ebebeb;		
		padding-bottom: 15px;
		margin-bottom: 15px;
	}

	.footer {
		position: absolute;
		bottom: 0;
		width: 100%;
		background-color: #ebebeb;
		padding: 10px;
		margin-top: 10px;
	}
	
	.titulo {
		margin: 0;
	}

	.areaTotais {
		border: 0.5px solid #bcbcbc;
		padding: 15px;
		border-radius: 5px;
		margin-right: 0px;
		margin-left: 0px;
	}

	.areaTotal {
		border: 0.5px solid #bcbcbc;
		padding: 15px;
		border-radius: 5px;
		margin-right: 0px;
		background-color: #f9f9f9;
		margin-top: 2px;
		margin-left: 0px;
	}

	.pgto {
		margin: 1px;
	}

</style>
<body>
	<div class="wrapper">
		<section class="invoice">
			<div class="cabecalho">
				<div class="row">
					<div class="col-12">
						<h2 class="page-header">          
							<h3 class="titulo" style="text-align: center;"><b>SISPAGPES - Exercício Anterior</b></h3>
							<h6 class="titulo" style="text-align: center;">Av. Brig. Eduardo Gomes, s/nº, Vila Asas, Lagoa Santa - MG - CEP 33400-000</h6>
						</h2>
					</div>
				</div>
			</div>          
			<div class="container">
				<div class="row" style="height: 30px;">
					<div class="col-sm-5">
						<big style="text-align: center;"><strong>Ordem de Serviço nº <?php echo $id ?></strong></big>
					</div>
					<div class="col-sm-7" style="text-align: right;">
						<big> Data: <?php echo $data2; ?> </big>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<p style="font-size:14px"><b>Dados do Requerente</b></p>
					</div>
				</div>
				<div class="row" style="height: 50px;">
					<div class="col-sm-4">
						<p style="font-size:12px;">Nome: <?php echo $res_1['req_nome']; ?> </p>
					</div>
					<div class="col-sm-4">
						<p style="font-size:12px;">Email: <?php echo $res_1['email']; ?> </p>
					</div>
					<div class="col-sm-4">
						<p style="font-size:12px;">Saram: <?php echo $res_1['saram']; ?> </p>
					</div>
				</div>
				<div class="row" style="height: 30px;">
					<div class="col-sm-4">
						<p style="font-size:12px">Telefone: <?php echo $res_1['telefone']; ?> </p>
					</div>
					<div class="col-sm-4">
						<p style="font-size:12px">CPF: <?php echo $res_1['requerente']; ?> </p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<p style="font-size:14px"><b>Dados do Aparelho</b></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<p style="font-size:12px">Produto: <?php echo $res_1['produto']; ?> </p>
					</div>
					<div class="col-sm-6">
						<p style="font-size:12px">Nº de Série: <?php echo $res_1['serie']; ?> </p>
					</div>
					<div class="col-sm-6">
						<p style="font-size:12px">Modelo: XHPER </p>
					</div>	
					<div class="col-sm-6">
						<p style="font-size:12px">Defeito: <?php echo $res_1['problema']; ?> </p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<p style="font-size:14px"> <b>Laudo Técnico</b></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<p style="font-size:12px"> <?php echo $res_1['laudo']; ?> </p>
					</div>
				</div>
				<br>
				<table class="table table-sm" style="text-align: center;">
					<tr bgcolor="#f9f9f9" style="height: auto; vertical-align: center;">
						<td class="align-middle" style="width: 45%;"> <b>Peça</b> </td>
						<td class="align-middle" style="width: 35%;"> <b>Valor da Peça</b> </td>
						<td class="align-middle" style="width: 20%;"> <b>Quantidade</b> </td>
					</tr>
					<tr>
						<td class="align-middle"> <?php echo $res_1['pecas']; ?> </td>
						<td class="align-middle"> R$ <?php echo number_format($res_1['valor_pecas'], 2, ',', '.'); ?> </td>
						<td class="align-middle"> 5 </td>
					</tr>
				</table>
				<hr>		
				<br>
				<div class="row">
					<div class="col-sm-9">
					</div>
					<div class="col-sm-3 areaTotais">
						<p class="pgto" style="font-size:14px"><b>+ Total de Peças: </b> R$ <?php echo number_format($res_1['valor_pecas'], 2, ',', '.'); ?></p>
						<p class="pgto" style="font-size:14px"><b>+ Total da mão de Obra: </b> R$ <?php echo number_format($res_1['valor_servico'], 2, ',', '.'); ?></p>
						<p class="pgto" style="font-size:14px"><b>- Desconto: </b> R$ <?php echo number_format($res_1['desconto'], 2, ',', '.'); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-9">
						<p style="font-size:14px"><b>Sacador: </b> <?php echo $res_1['func_nome']; ?> </p>
					</div>
					<div class="col-sm-3 areaTotal">
						<p class="pgto" style="font-size:14px"> <b>Total a Pagar: </b> R$ <?php echo number_format($res_1['valor_total'], 2, ',', '.'); ?> </p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-9">
					</div>
					<div class="col-sm-3">
						<p style="font-size:12px">Orçamento válido até: <?php echo date('d/m/Y', strtotime("+5 days", strtotime($res_1['data_geracao']))); ?></p>
					</div>
				</div>
			</div>
			<div class="footer">
				<p style="font-size:12px;" align="center">Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int - GAP-LS</p>
			</div>
		</section>
	</div>
	<div class="row no-print" align="center;">
		<div class="col-12">
			<a class="btn btn-default" href="#" onclick="window.print();"><i class="fas fa-print"></i> Imprimir</a>
			<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Enviar Pagamento</button>
			<button type="button" class="btn btn-primary float-right" onclick="" style="margin-right: 5px;"><i class="fas fa-download"></i> Gerar PDF</button>
		</div>
	</div>
</body>
</html>