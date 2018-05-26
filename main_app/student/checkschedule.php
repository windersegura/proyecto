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
  $idAlumno = $_SESSION['usuario']['idAlumno'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta De Horarios</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>
			<?php include 'menu.html' ?><br>

		<center><br><h1>LISTADO DE TUS HORARIOS</h1><br><br>

		<table class="table">
			<th><center>Nombre Del Curso</center></th>
			<th><center>Solvencia De Asignacion</center></th>
			<th><center>Horario</center></th>
      <th><center>Jornada</center></th>

			<th><a href="#"><button type="button" name="imprimir" class="btn btn-dark">IMPRIMIR TODO</Button></a></th>
        <?php
			    include '../conexion.php';
			    $query="SELECT * FROM asignacioncursos WHERE IdAlumno4=$idAlumno";
			    $resultado = $mysqli->query($query) or die (mysql_error($mysqli));
			    while($fila=$resultado->fetch_assoc())
					{
				    $idAsignacion = mysqli_real_escape_string($mysqli,$fila['idAsignacion']);
						$IdAlumno4 = mysqli_real_escape_string($mysqli,$fila['IdAlumno4']);
						$IdCurso2 = mysqli_real_escape_string($mysqli,$fila['IdCurso2']);
						$Solvencia = mysqli_real_escape_string($mysqli,$fila['Solvencia']);
						$idSemestre2 = mysqli_real_escape_string($mysqli,$fila['idSemestre2']);
						$idCarrera3 = mysqli_real_escape_string($mysqli,$fila['idCarrera3']);
						$CursoSuperado = mysqli_real_escape_string($mysqli,$fila['CursoSuperado']);
						$idHorario = mysqli_real_escape_string($mysqli,$fila['idHorario']);

						$query1 = "SELECT Nombre FROM curso WHERE idCurso=$IdCurso2";
						$consulta1 =$mysqli->query($query1);
						$fila1=$consulta1->fetch_assoc();
						$NombreCurso =$fila1['Nombre'];
						echo "<tr>";
						echo "<td><center>"; echo $NombreCurso; echo "</center></td>";
						echo "<td><center>";
						if($Solvencia == 0)
						{
							echo "Insolvente De Asignacion";
						}
						else
						{
							echo "Solvente";
						} echo "</center></td>";

						$query2 = "SELECT Hora,Jornada FROM horarios WHERE idHorario=$idHorario";
						$consulta2 =$mysqli->query($query2);
						$fila2=$consulta2->fetch_assoc();
						$Hora =$fila2['Hora'];
						$Jornada =$fila2['Jornada'];
						echo "<td><center>"; echo $Hora; echo "</center></td>";
						echo "<td><center>"; echo $Jornada; echo "</center></td>";
					}
        ?>
        </tr>
        </table>
        <?php
         echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-danger col-md-3'>VOLVER</Button></a>"
        ?>
      </center><br><br>
			<?php include 'footer.php' ?>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
