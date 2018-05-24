
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
	<title>Consulta De Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
	<body>
		<?php require 'menu.php' ?>
		<center><br><h1>LISTADO DE CURSOS</h1><br><br>

		<table class="table">
			<th>Id.</th>
			<th>Nombre</th>
			<th>Creditos</th>
			<th>Semestre</th>
			<th>idCarrera</th>

			<th><a href="newcourse.php"><button type="button" name="nuevo" class="btn btn-info">Nuevo</Button></a></th>
			<th><a href="#"><button type="button" name="imprimir" class="btn btn-info">Imprimir Todo</Button></a></th>

			<?php
			include "../conexion.php";
			$busqueda = "SELECT * FROM curso";
			$busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busqueda->fetch_assoc())
			{
				$idCurso = mysqli_real_escape_string($mysqli,$fila['idCurso']);
				$nombre = mysqli_real_escape_string($mysqli,$fila['Nombre']);
				$creditos = mysqli_real_escape_string($mysqli,$fila['Creditos']);
				$semestre = mysqli_real_escape_string($mysqli,$fila['Semestre']);
				$carrera = mysqli_real_escape_string($mysqli,$fila['idCarrera']);


				echo "<tr>";
					echo "<td><center>"; echo $idCurso; echo "</center></td>";
					echo "<td><center>"; echo $nombre; echo "</center></td>";
					echo "<td><center>"; echo $creditos; echo "</center></td>";
					echo "<td><center>"; echo $semestre; echo "</center></td>";
					echo "<td><center>"; echo $carrera; echo "</center></td>";

					echo "<td><a href='deletecourse.php?numero=".$idCurso."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifycourse.php?numero=".$idCurso."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
					echo "<td><a href='#?numero=".$idCurso."'><button type='button' name='imprimir' class='btn btn-success'>Imprimir</Button></a></td>";
				echo "<tr>";
			}


			?>
			</table>

			<?php
			 echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-danger'>Volver</Button></a>"

			?>
		</center>
		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
