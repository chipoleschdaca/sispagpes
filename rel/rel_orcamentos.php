
<?php
$id = $_GET['id'];
include('../conexao.php');

$query = "select o.id, o.requerente, o.tecnico, o.produto, o.serie, o.problema, o.laudo, o.valor_servico, o.pecas, o.valor_pecas, o.total, o.valor_total, o.data_abertura, o.data_geracao, o.status, c.nome as req_nome, c.email, c.saram, c.cpf, f.nome as func_nome from orcamentos as o INNER JOIN requerentes as c on o.requerente = c.cpf INNER JOIN militares as f on o.tecnico = f.id where o.id = '$id'";

$result = mysqli_query($conexao, $query);

while ($res_1 = mysqli_fetch_array($result)) {

	$data2 = implode('/', array_reverse(explode('-', $res_1['data_geracao'])));

	?>

	<title>
		Orçamento nº <?php echo $id ?>
	</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>
		@page {
			margin: 0px;

		}

		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			background-color: #ebebeb;
			padding: 10px;
		}

		.cabecalho {
			background-color: #ebebeb;
			padding-top: 15px;
			padding-bottom: 15px;
			margin-bottom: 15px;
		}

		.titulo {
			margin: 0;
		}

		.areaTotais {
			border: 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right: 15px;
			margin-left: 455px;
		}

		.areaTotal {
			border: 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right: 15px;
			background-color: #f9f9f9;
			margin-top: 2px;
			margin-left: 455px;
		}

		.pgto {
			margin: 1px;
		}
	</style>


	<div class="cabecalho">
		<div class="row" style="height: 100px;">
			<div class="col-sm-5">
				<img src="../dist/img/gapls.png" width="80px" style="margin-left: 15px;">
			</div>
			<div class="col-sm-12">
				<h3 class="titulo" style="text-align: center;"><b>SISPAGPES - Exercício Anterior</b></h3>
				<h6 class="titulo" style="text-align: center;">Av. Brig. Eduardo Gomes, s/nº, Vila Asas, Lagoa Santa - MG - CEP 33400-000</h6>
			</div>
		</div>
	</div>
	<div class="container">

		<div class="row" style="height: 30px;">
			<div class="col-sm-8">
				<big style="text-align: center;">Orçamento nº <?php echo $id ?></big>
			</div>
			<div class="col-sm-10" style="text-align: right;">
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
			<div class="col-sm-3">
				<p style="font-size:12px;">Nome: <?php echo $res_1['req_nome']; ?> </p>
			</div>
			<div class="col-sm-3" style="margin-left:250px;">
				<p style="font-size:12px;">Email: <?php echo $res_1['email']; ?> </p>
			</div>
			<div class="col-sm-3" style="margin-left:500px;">
				<p style="font-size:12px;">Saram: <?php echo $res_1['saram']; ?> </p>
			</div>
		</div>
		<div class="row" style="height: 30px;">
			<div class="col-sm-3">
				<p style="font-size:12px">Telefone: <?php echo $res_1['telefone']; ?> </p>
			</div>
			<div class="col-sm-3" style="margin-left:250px;">
				<p style="font-size:12px">CPF: <?php echo $res_1['requerente']; ?> </p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<p style="font-size:14px"><b>Dados do Aparelho</b></p>
			</div>
		</div>
		<div class="row" style="height: 50px;">
			<div class="col-sm-3">
				<p style="font-size:12px">Produto: <?php echo $res_1['produto']; ?> </p>
			</div>
			<div class="col-sm-3" style="margin-left:250px;">
				<p style="font-size:12px">Nº de Série: <?php echo $res_1['serie']; ?> </p>
			</div>
			<div class="col-sm-3" style="margin-left:500px;">
				<p style="font-size:12px">Modelo: XHPER </p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
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
				<td> <b>Peça</b> </td>
				<td> <b>Valor da Peça</b> </td>
				<td> <b>Quantidade</b> </td>
			</tr>
			<tr>
				<td> <?php echo $res_1['pecas']; ?> </td>
				<td> R$ <?php echo $res_1['valor_pecas']; ?> </td>
				<td> <?php echo $res_1['valor_total']; ?> </td>
			</tr>
		</table>
		<hr>
		<br>
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-4 areaTotais">
				<p class="pgto" style="font-size:14px"><b>Total de Peças: </b> R$ <?php echo $res_1['valor_pecas']; ?></p>
				<p class="pgto" style="font-size:14px"><b>Total da mão de Obra: </b> R$ <?php echo $res_1['valor_servico']; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<p style="font-size:14px"><b>Técnico: </b> <?php echo $res_1['func_nome']; ?> </p>

			</div>
			<div class="col-sm-4 areaTotal">

				<p class="pgto" style="font-size:14px"> <b>Total a Pagar: </b> R$ <?php echo $res_1['valor_total']; ?> </p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-3">
				<p style="font-size:12px">Orçamento válido até: <?php echo date('d/m/Y', strtotime("+5 days", strtotime($res_1['data_geracao']))); ?></p>
			</div>
		</div>
	</div>
	<div class="footer">
		<p style="font-size:12px;" align="center">Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int - GAP-LS</p>
	</div>
<?php } ?>