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
	<title>Consulta De Cursos</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>

		<center><br><h1>LISTADO DE TUS CURSOS ASIGNADOS</h1><br><br>

		<table class="table">
			<th><center>Curso</center></th>
			<th><center>Semestre</center></th>
			<th><center>Profesor</center></th>

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
        $consulta2 = $mysqli->query($query2) or die (mysql_error($mysqli));
        $fila2 = $consulta2->fetch_assoc();
        $NoSemestre = $fila2['NoSemestre'];

				$query3 = "SELECT idAsignatura, idProfesor FROM asignatura WHERE idAlumno=$idAlumno AND idCurso=$idCurso";
        $consulta3 = $mysqli->query($query3) or die (mysql_error($mysqli));
        $fila3 = $consulta3->fetch_assoc();
        $idProfesor = $fila3['idProfesor'];
				$idAsignatura = $fila3['idAsignatura'];

				$query3 = "SELECT idProfesor FROM asignatura WHERE idAlumno=$idAlumno AND idCurso=$idCurso";
        $consulta3 = $mysqli->query($query3) or die (mysql_error($mysqli));
        $fila3 = $consulta3->fetch_assoc();
        $idProfesor = $fila3['idProfesor'];

				echo "<tr>";
					echo "<td><center>"; echo $NombreCurso; echo "</center></td>";
					echo "<td><center>"; echo $NoSemestre; echo " </center></td>";
					if ($idProfesor != NULL)
					{
						$query4 = "SELECT Nombre FROM profesor WHERE idProfesor=$idProfesor";
		        $consulta4 = $mysqli->query($query4) or die (mysql_error($mysqli));
		        $fila4 = $consulta4->fetch_assoc();
		        $NombreProfesor = $fila4['Nombre'];
						echo "<td><center>"; echo $NombreProfesor; echo "</center></td>";
						echo "<td><a href='consultnotes.php?numero=".$idAsignatura."'><button type='button' name='eliminar' class='btn btn-danger'>Ver El Punto Del Curso</Button></a></td>";
						echo "<td><a href='#?numero=".$idAsignatura."'><button type='button' name='modificar' class='btn btn-success'>Imprimir</Button></a></td>";
					}
					else
					{
						echo "<td><center>"; echo "Sin Asignar"; echo "</center></td>";
					}

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
