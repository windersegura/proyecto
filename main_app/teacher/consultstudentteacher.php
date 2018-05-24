<?php
require '../conexion.php';
	session_start();
	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] != 'Maestro')
		{
			header('Location: ../salir.php');
		}
	}
	else
	{
		header('Location: ../../');
	}
	$idProfesor = $_SESSION['usuario']['idProfesor'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control De Notas</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</head>
	<body>
		<center><br>
			<h1>Control De Notas Del Estudiante</h1>

					<table class="table">
						<th><center>Nombre Del Estudiante</center></th>
						<th><center>Carrera</center></th>
						<th><center>Semestre</center></th>
						<th><center>Nombre Del Curso</center></th>
						<th><center>Primer Parcial</center></th>
						<th><center>Segundo Parcial</center></th>
						<th><center>Tareas</center></th>
						<th><center>Parcial Final</center></th>

						<?php

						$busqueda = "SELECT * FROM asignatura WHERE idProfesor=$idProfesor";
						$busque = $mysqli->query($busqueda) or die (mysql_error($mysqli));
						while($fila=$busque->fetch_assoc())
						{
							$idAsignatura = mysqli_real_escape_string($mysqli,$fila['idAsignatura']);//LISTO
							$idCurso = mysqli_real_escape_string($mysqli,$fila['idCurso']);//LISTO
							$PrimerParcial = mysqli_real_escape_string($mysqli,$fila['PrimerPar']);//LISTO
							$SegundoParcial = mysqli_real_escape_string($mysqli,$fila['SegundoPar']);//LISTO
							$Tareas = mysqli_real_escape_string($mysqli,$fila['Tareas']);//LISTO
							$ParcialFinal = mysqli_real_escape_string($mysqli,$fila['ParcialFinal']);//LISTO
							$idAlumno = mysqli_real_escape_string($mysqli,$fila['idAlumno']);//LISTO
							$idCarrera = mysqli_real_escape_string($mysqli,$fila['idCarrera']);
							$idSemestre = mysqli_real_escape_string($mysqli,$fila['idSemestre']);//LISTO

			        $query1 = "SELECT Nombre FROM curso WHERE idCurso=$idCurso";
			        $consulta1 =$mysqli->query($query1) or die (mysql_error($mysqli));
			        $fila1 = $consulta1->fetch_assoc();
			        $NombreCurso =$fila1['Nombre'];//LISTO

			        $query2 = "SELECT NoSemestre FROM semestre WHERE idSemestre=$idSemestre";
			        $consulta2 = $mysqli->query($query2) or die (mysql_error($mysqli));
			        $fila2 = $consulta2->fetch_assoc();
			        $NoSemestre = $fila2['NoSemestre'];//LISTO

							$query3 = "SELECT Nombre FROM alumnos WHERE idAlumno=$idAlumno";
			        $consulta3 = $mysqli->query($query3) or die (mysql_error($mysqli));
			        $fila3 = $consulta3->fetch_assoc();
			        $NombreAlumno = $fila3['Nombre'];//LISTO

							$query4 = "SELECT NombreCarrera FROM carrera WHERE idCarrera=$idCarrera";
							$consulta4 = $mysqli->query($query4) or die (mysql_error($mysqli));
							$fila4 = $consulta4->fetch_assoc();
							$NombreCarrera = $fila4['NombreCarrera'];
							echo "<tr>";
								echo "<td><center>"; echo $NombreAlumno; echo "</center></td>";
								echo "<td><center>"; echo $NombreCarrera; echo " </center></td>";
								echo "<td><center>"; echo $NoSemestre; echo "</center></td>";
								echo "<td><center>"; echo $NombreCurso; echo " </center></td>";
								echo "<td><center>"; echo $PrimerParcial; echo "</center></td>";
								echo "<td><center>"; echo $SegundoParcial; echo " </center></td>";
								echo "<td><center>"; echo $Tareas; echo "</center></td>";
								echo "<td><center>"; echo $ParcialFinal; echo " </center></td>";

			          echo "<td><a href='modifynotes.php?numero=".$idAsignatura."'><button type='button' name='INGRESAR NOTAS' class='btn btn-danger'>MODIFICAR PUNTEOS</Button></a></td>";
								echo "<td><a href='#?numero=".$idAsignatura."'><button type='button' name='IMPRIMIR' class='btn btn-success'>IMPRIMIR</Button></a></td>";
							echo "<tr>";
						}?>
						</table>
						<?php
						 echo "<a href='index.php?><button type='button' class='btn btn-dark col-md-3'>VOLVER</Button></a>"
						?>
					</center>

					<script src="../../js/bootstrap.js"></script>
				<script src="../../js/jquery-3.2.1.min.js"></script>
				<script src="../../js/bootstrap.min.js"></script>
		</center>
	</body>
</html>
