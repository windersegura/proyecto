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
	<meta charset="UTF-8">
	<title>Consulta De Carrera</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>
		<?php require 'menu.php' ?>


		<center><br><h1>LISTADO DE CARERRAS</h1><br><br>

		<table class="table">
			<th><center>Id.</center></th>
			<th><center>Nombre De La Facultad</center></th>

			<th><a href="newfaculty.php"><button type="button" name="nuevo" class="btn btn-info">Nuevo</Button></a></th>
			<th><a href="#"><button type="button" name="imprimir" class="btn btn-info">Imprimir Todo</Button></a></th>

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

					echo "<td><a href='deletefaculty.php?numero=".$idFacultad."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifyfaculty.php?numero=".$idFacultad."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idFacultad."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}?>
			</table>

			<?php
			 echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-dark col-md-3'>Volver</Button></a>"

			?>
		</center>

		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
