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
	<title>Consulta De Mestros</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>
		<?php include 'menu.php' ?><br>
		<center><br><h1>LISTADO DE PROFESORES QUE TE IMPARTE CURSOS</h1><br><br>

		<table class="table">
			<th><center>Nombre</center></th>
      <th><center>Telefono</center></th>
			<th><center>Correo</center></th>

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


				$query3 = "SELECT idProfesor FROM asignatura WHERE idAlumno=$idAlumno AND idCurso=$idCurso";
        $consulta3 = $mysqli->query($query3) or die (mysql_error($mysqli));
        $fila3 = $consulta3->fetch_assoc();
        $idProfesor = $fila3['idProfesor'];

				echo "<tr>";

					if ($idProfesor != NULL)
					{
						$query4 = "SELECT Nombre,Telefono,Correo FROM profesor WHERE idProfesor=$idProfesor GROUP BY Nombre, Telefono";
		        $consulta4 = $mysqli->query($query4) or die (mysql_error($mysqli));
		        $fila4 = $consulta4->fetch_assoc();
		        $NombreProfesor = $fila4['Nombre'];
            $Telefono = $fila4['Telefono'];
            $Correo = $fila4['Correo'];
						echo "<td><center>"; echo $NombreProfesor; echo "</center></td>";
            echo "<td><center>"; echo $Telefono; echo "</center></td>";
  					echo "<td><center>"; echo $Correo; echo " </center></td>";
					}
					else
					{
						echo "<td><center>"; echo "SIN ASIGNAR A TU CURSO"; echo "</center></td>";
            echo "<td><center>"; echo "----"; echo "</center></td>";
            echo "<td><center>"; echo "----"; echo "</center></td>";
					}
				echo "<tr>";
			}?>
			</table>
			<?php
			 echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-dark col-md-3'>VOLVER</Button></a>"
			?>
		</center><br><br>
		<?php include 'footer.php' ?>
		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
