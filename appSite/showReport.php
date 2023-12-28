<?php

	session_start();

	include_once 'models/Report.php';

	$objReport = new Report();

	$todasCasasCadastradas = $objReport->todasCasasCadastradas(); 

	$casaSemClassificar = $objReport->totalCasasSemClassificar();

	$casasAvaliadasVA = $objReport->casasClassificadasVA();

	$casaAvaliadasDiretor = $objReport->casaAvaliadasDirector();

	$ratingVA = $objReport->ratingVA();

	$ratingDR = $objReport->ratingDirector();

	$propsPorVA = $objReport->propriedadesAvaliadasPorVA();

?>
 
<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kleber & Ruth Properties || Properties</title>
	<link rel="stylesheet" href="css/foundation.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/foundation-icons/foundation-icons.css">
	<?php
	include_once 'includes/head.php';
	?>
	<style>
		table{
			padding-top: 30px
		}
		td, tr{
			text-align: left
		}
	</style>
</head>

<body style="background-color: #fffdf0;">


	<header class="subnav-hero-section">
		<h1 class="subnav-hero-headline">Kleber & Ruth <small>Properties</small></h1>
		<ul class="subnav-hero-subnav">



			<?php


			include_once 'includes/navigation.php'
			?>



		</ul>
	</header>

	<section>


<div class="grid-container ">



			<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">


<div style="padding-top:   60px">
							<table >
							  <thead>
								   <tr>
									<th colspan="4" style="background-color:  #1779ba; color: white"><center>Informações Gerais (Propriedades)</center></th>

								</tr>
									</thead>
								  <tbody>
								<tr>
									<th width="200">Todas as Propriedades</th>
									<th width="200">Casas Sem avaliação</th>
									<th width="200">Casas Avaliadas (V.A)</th>
									<th width="200">Casas Avaliadas Diretor</th>     
								</tr>

									<tr>


										 <td> <?php echo $todasCasasCadastradas[0]["count(parcel)"];   ?></td>
										<td><?php echo $casaSemClassificar[0]["count(parcel)"]  ?>      </td>

										 <td> <?php echo $casasAvaliadasVA[0]["count(parcel)"];   ?></td>
										<td><?php echo $casaAvaliadasDiretor[0]["count(parcel)"]  ?>      </td>


									</tr>
								</tbody>
							</table>



							<table  style="margin-top:   60px">
							  <thead>
								   <tr>
									<th colspan="4" style="background-color:  #793868; color: white"><center>Propriedades Classificadas  V.A</center></th>

								</tr>
									</thead>
								  <tbody>
								<tr>
									<th width="200">Houses A</th>
									<th width="200">Houses B</th>
									<th width="200">Houses C</th>

								</tr>

									<tr>


										 <td> <?php  echo $ratingVA[0]["count(parcel)"];   ?></td>
										<td><?php echo $ratingVA[1]["count(parcel)"]  ?>      </td>

										 <td> <?php echo $ratingVA[2]["count(parcel)"];   ?></td>



									</tr>
								</tbody>
							</table>




							<table  style="margin-top:   60px">
							  <thead>
								   <tr>
									<th colspan="4" style="background-color:  #511212; color: white"><center>Propriedades Classificadas  Director</center></th>

								</tr>
									</thead>
								  <tbody>
								<tr>
									<th width="200">Houses A PLUS</th>
									<th width="200">Houses A </th>
									<th width="200">Houses B</th>
									<th width="200">Houses C</th>

								</tr>

									<tr>




										<td><?php echo $ratingDR[1]["count(parcel)"]; ?></td>
										<td><?php echo $ratingDR[0]["count(parcel)"]; ?></td>

										<td><?php echo $ratingDR[2]["count(parcel)"]; ?></td>
										<td><?php echo $ratingDR[3]["count(parcel)"]; ?></td>



									</tr>
								</tbody>
							</table>


				<table  style="margin-top:   60px">
							  <thead>
								   <tr>
									<th colspan="4" style="background-color:  #709500; color: white"><center>Propriedades Avaliadas por cada V.A</center></th>

								</tr>
									</thead>
								  <tbody>
								<tr style="font-weight: bold">

									<td><?php echo $propsPorVA[1]['nomeUsuario'] ; ?></td>
									<td><?php echo $propsPorVA[2]['nomeUsuario'] ; ?></td>


								</tr>

									<tr>





										<td><?php echo $propsPorVA[1]['count(idapps)'] ; ?></td>

										<td><?php echo $propsPorVA[2]['count(idapps)'] ; ?></td>




									</tr>
								</tbody>
							</table>



	</div>






		</div>
	</div>



	</section>
	<footer></footer>








	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/what-input.js"></script>
	<script src="js/vendor/foundation.js"></script>
	<script src="js/app.js"></script>


	<script>
		$('#load').hide();

		function carregarDados(status, grade) {

			$('#load').show();

			var formData = {
				status: status,
				grade: grade,
				loadDados: '1'
			};
			$.ajax({
					type: 'POST',
					url: 'report.php',
					data: formData,
					dataType: 'html',
					encode: true
				})
				.done(function(data) {

					$('#load').hide();

					$('#' + grade).html(data);



				});
		}

		function salvarTodosOsDados(google, flood, sale, rating, parcelId, hoa, avaliated) {


			$('#load').hide();

			$('.allSave').hide();

			var formData = {

				google: google,
				flood: flood,
				sale: sale,
				rating: rating,
				hoa: hoa,
				parcelId: parcelId,
				avaliated: avaliated,


				salvarTodosOsDados: '1'
			};
			$.ajax({
					type: 'POST',
					url: 'controller/completeAppraiser.php',
					data: formData,
					dataType: 'json',
					encode: true
				})
				.done(function(data) {
					$('#load').show();
					console.log(data);

					if (data.retorno == true) {
						alert("Updated all data");

						carregarDados('1', 'tabelasComDados');

						carregarDados('3', 'dadosCarregados');
					}
				});
			event.preventDefault();


		}

		carregarDados('1', 'tabelasComDados');

		carregarDados('3', 'dadosCarregados');
	</script>
</body>

</html>