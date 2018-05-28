<?php
	session_start();
	//si la variable de session existe se queda de lo contrario lo desloguea o lo envia para su usuario correcto
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] == "Secretario")
		{
			header("Location: ../secretary/");
		}
		else   if ($_SESSION['usuario']['TipoUsuario'] != "Admin")
		{
			header("Location: ../salir.php");
		}
	}
	else
	{
		header('Location: ../../');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=1.0">
	<meta charset="utf-8">
	<meta name="theme-color" content="#3498db">
	<title>Consultar Semestres</title>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
		<script src="js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="js/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>

    <!-- CSS DataTable -->
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.min.js"></script>

    <!-- Botones para DATATABLES -->
	<script type="text/javascript">
		jQuery(document).ready( function () {
			var table = jQuery("#example").DataTable({

				"oLanguage": {
					"sEmptyTable":     "Sin Resultados",
					"sInfo":           "Viendo _START_ a _END_ de _TOTAL_ entradas",
					"sInfoEmpty":      "Viendo 0 a 0 de 0 entradas",
					"sInfoFiltered":   "(filtered from _MAX_ total entries)",
					"sInfoPostFix":    "",
					"sInfoThousands":  ",",
					"sLengthMenu":     "Ver _MENU_ Entradas",
					"sLoadingRecords": "Cargando...",
					"sProcessing":     "Procesando...",
					"sSearch":         "",
					"sZeroRecords":    "Sin Resultados",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Ultimo",
						"sNext":     "Siguiente >",
						"sPrevious": "< Anterior"
					}
				},
				"pageLength": 10,
				"order": [
					[ 0, "asc" ]
				],
				"lengthMenu": [
					[10, 25, 50, 100, -1],
					[10, 25, 50, 100, "Todo"]
				],
				"aoColumnDefs": [
					{
						"bSortable": false,
						"aTargets": [  ]
					},
					{
						"sType": "string",
						"aTargets": [ 3 ]
					}
				],
				"stateSave": true
			});
			//$("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');
			jQuery(".dataTables_filter input").attr("placeholder", "Buscar...");
			jQuery(".dataTables_filter input").css("width", "200px");
			jQuery(".dt-buttons a").css("width", "100px");
			jQuery(".dt-buttons").css("text-align", "left");
			jQuery(".row").css("padding-bottom", "10px");
		} );
	</script>
	<style media="screen">
		p{font-size: 55px;}
	</style>
</head>
	<body >
		<?php require 'menu.php' ?>
		<div class="panel panel-primary" style="width= 700px">
			<div class="panel-heading">
					<div class="btn-group pull-right">
						<a href="newsemester.php" class="btn btn-info btn-md"><i class="glyphicon glyphicon-plus"></i> &nbsp; Añadir Semestres</a>
						<a class="btn btn-success btnPrint btn-md" href="#" onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status='..mensaje personal .. '; return true;"><i class="glyphicon glyphicon-print"></i> &nbsp; Imprimir Semestre</a>
					</div>
					<h1>LISTA DE SEMESTRES </h1>
				</div>
	  <div class="panel-body">

		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0"  width="100%">
			<thead width="900px">

				<tr class="info" width="900px">

					<th width="220px"> Id. Semestre </th>
					<th width="220px">No. Semestre</th>
					<th width="220px">Id. Carrera</th>
					<th width="220px">Opcion 1</th>
					<th width="220px">Opcion 2</th>
					<th width="220px">Opcion 3</th>
				</tr>
			</thead>

			<tbody  width="100%">
				<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM semestre";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idSemestre = mysqli_real_escape_string($mysqli,$fila['idSemestre']);
				$semestre = mysqli_real_escape_string($mysqli,$fila['NoSemestre']);
				$carrera = mysqli_real_escape_string($mysqli,$fila['idCarrera']);

				echo "<tr width='900px'>";
				echo "<td><center>"; echo $idSemestre; echo "</center></td>";
				echo "<td><center>"; echo $semestre; echo "</center></td>";
				echo "<td><center>"; echo $carrera; echo "</center></td>";
					echo "<td><a href='deletesemester.php?numero=".$idSemestre."' class='btn btn-danger'>Eliminar</a></td>";
					echo "<td><a href='modifysemester.php?numero=".$idSemestre."' class='btn btn-primary'>Modificar</a></td>";
					echo "<td><a href='#' class='btn btn-dark'></a></td>";
				echo "</tr>";
			}
			?>
			</tbody>
		</table>

	  </div>
	</div>
		</center>
		<?php include 'footer.php' ?>

	</body>
</html>
