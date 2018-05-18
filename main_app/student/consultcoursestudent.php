<?php
	session_start();
	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{

		if($_SESSION['usuario']['TipoUsuario'] != "Alumno")
		{
			header('Location: ../salir.php');
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

		<center><br><h1>LISTADO DE  TU CURSOS ASIGNADOS</h1><br><br>

		<table class="table">
			<th><center>Curso</center></th>
			<th><center>Semestre</center></th>

			<th><a href="#"><button type="button" name="imprimir" class="btn btn-dark">IMPRIMIR TODO</Button></a></th>

			<?php
      $idAlumno = $_SESSION['usuario']['idAlumno'];
			include "../conexion.php";
			$busqueda = "SELECT IdCurso2, idSemestre2 FROM asignacioncursos WHERE IdAlumno4=$idAlumno";
			$busque = $mysqli->query($busqueda) or die (mysql_error($mysqli));
			while($fila=$busque->fetch_assoc())
			{
				$idCurso = mysqli_real_escape_string($mysqli,$fila['IdCurso2']);
				$idSemestre = mysqli_real_escape_string($mysqli,$fila['idSemestre2']);

        $query1 = "SELECT Nombre FROM curso WHERE idCurso=$idCurso";
        $consulta1 =$mysqli->query($query1) or die (mysql_error($mysqli));
        $fila1 = $consulta1->fetch_assoc();
        $NombreCurso =$fila1['Nombre'];

        $query2 = "SELECT NoSemestre FROM semestre WHERE idSemestre=$idSemestre";
        $consulta2 = $mysqli->query($query1) or die (mysql_error($mysqli));
        $fil = $consulta2->fetch_assoc();
        $NoSemestre = $fil['NoSemestre'];

				echo "<tr>";
					echo "<td><center>"; echo $NombreCurso; echo "</center></td>";
					echo "<td><center>"; echo $NoSemestre; echo "</center></td>";

          echo "<td><a href='deletesemester.php?numero=".$idCurso."'><button type='button' name='eliminar' class='btn btn-danger'>Eliminar</Button></a></td>";
					echo "<td><a href='modifysemester.php?numero=".$idCurso."'><button type='button' name='modificar' class='btn btn-success'>Modificar</Button></a></td>";
				echo "<tr>";
			}?>
			</table>
			<?php
			 echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-dark col-md-3'>VOLVER</Button></a>"
			?>
		</center>

		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
