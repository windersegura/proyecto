<?php
	session_start();
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta De Tus Horarios De Clases</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>
		<center><br><h1>LISTADO DE TUS HORARIOS DE CLASES</h1><br><br>
		<table class="table">
			<th><center>Nombre Del Curso</center></th>
			<th><center>Semestre</center></th>
			<th><center>Carrera</center></th>
      <th><center>Horario</center></th>
      <th><center>Jornada</center></th>

			<th><a href="#"><button type="button" name="imprimir" class="btn btn-dark">IMPRIMIR TODO</Button></a></th>
        <?php
			    include '../conexion.php';

			    $query="SELECT idCurso,idCarrera, idProfesor,idSemestre,idHorario FROM asignatura WHERE idProfesor=$idProfesor GROUP BY idCurso, idHorario";
  			    $resultado = $mysqli->query($query) or die (mysql_error($mysqli));
  			    while($fila=$resultado->fetch_assoc())
  					{

  						$idCurso = mysqli_real_escape_string($mysqli,$fila['idCurso']);
  						$idProfesor = mysqli_real_escape_string($mysqli,$fila['idProfesor']);
              $idCarrera = mysqli_real_escape_string($mysqli,$fila['idCarrera']);
              $idSemestre = mysqli_real_escape_string($mysqli,$fila['idSemestre']);
              $idHorario = mysqli_real_escape_string($mysqli,$fila['idHorario']);

  						$query1 = "SELECT Nombre FROM curso WHERE idCurso=$idCurso";
  						$consulta1 =$mysqli->query($query1);
  						$fila1=$consulta1->fetch_assoc();
  						$NombreCurso =$fila1['Nombre'];
  						echo "<tr>";
  						echo "<td><center>"; echo $NombreCurso; echo "</center></td>";

              $query2 = "SELECT NoSemestre FROM semestre WHERE idSemestre=$idSemestre";
  						$consulta2 =$mysqli->query($query2);
  						$fila2=$consulta2->fetch_assoc();
  						$NoSemestre =$fila2['NoSemestre'];
  						echo "<td><center>";echo $NoSemestre; echo "</center></td>";

              $query3 = "SELECT NombreCarrera FROM carrera WHERE idCarrera=$idCarrera";
  						$consulta3 =$mysqli->query($query3);
  						$fila3=$consulta3->fetch_assoc();
  						$NombreCarrera =$fila3['NombreCarrera'];
  						echo "<td><center>";echo $NombreCarrera; echo "</center></td>";

  						$query4 = "SELECT Hora,Jornada FROM horarios WHERE idHorario=$idHorario";
  						$consulta4 =$mysqli->query($query4);
  						$fila4=$consulta4->fetch_assoc();
  						$Hora =$fila4['Hora'];
  						$Jornada =$fila4['Jornada'];
  						echo "<td><center>"; echo $Hora; echo "</center></td>";
  						echo "<td><center>"; echo $Jornada; echo "</center></td>";
  					}
        ?>

        </tr>
        </table>
        <?php
         echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-danger col-md-3'>VOLVER</Button></a>"
        ?>
      </center>

    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
