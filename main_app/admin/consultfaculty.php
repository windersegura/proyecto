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
	<title>Consulta De Facultad</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="utf-8">
	<meta name="theme-color" content="#3498db">

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

</head>
	<body>
		<?php require 'menu.php' ?>
		<center><div class="panel panel-primary" style="width: 90%;">
	  <div class="panel-heading"><h1>LISTADO DE FACULTADES</h1></div>
	  <div class="panel-body">
	  <a href="newfaculty.php" class="btn btn-dark">Nueva Facultad</a><br>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>

				<tr class="info">

					<th>Id.</th>
					<th>Nombre De La Facultad</center></th>
					<th>Opcion 1</th>
					<th>Opcion 2</th>
				</tr>
			</thead>

			<tbody>
				<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM facultad";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idFacultad = mysqli_real_escape_string($mysqli,$fila['idFacultad']);
					$NombreFacultad = mysqli_real_escape_string($mysqli,$fila['Nombre']);

					echo "<tr>";
						echo "<td><center>"; echo $idFacultad; echo "</center></td>";
						echo "<td><center>"; echo $NombreFacultad; echo "</center></td>";

						echo "<td><a href='deletefaculty.php?numero=".$idFacultad."' class='btn btn-danger'>Eliminar</a></td>";
						echo "<td><a href='modifyfaculty.php?numero=".$idFacultad."' class='btn btn-primary'>Modificar</a></td>";
					echo "<tr>";
			}
			?>
			</tbody>
		</table>

	  </div>
	</div>
</center><br><br>
	<?php include 'footer.php' ?>
	</body>
</html>
