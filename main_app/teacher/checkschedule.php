<?php
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

<?php
	$consulta=consultaprod($idProfesor);
	function consultaprod( $no_prod )
	{
    include '../conexion.php';
    $query="SELECT * FROM asignatura WHERE IdAlumno4=$no_prod";
    $resultado = $mysqli->query($query) or die (mysql_error($mysqli));
    $fila=$resultado->fetch_assoc();

    return
		[
      $fila['idAsignacion'],
			$fila['IdAlumno4'],
      $fila['IdCurso2'],
      $fila['Solvencia'],
      $fila['idSemestre2'],
      $fila['idCarrera3'],
      $fila['CursoSuperado'],
			$fila['idHorario']
		];
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta De Notas</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>

		<center><br><h1>LISTADO DE TUS HORARIOS</h1><br><br>

		<table class="table">
			<th><center>Nombre Del Curso</center></th>
			<th><center>Solvencia De Asignacion</center></th>
			<th><center>Horario</center></th>
      <th><center>Jornada</center></th>

			<th><a href="#"><button type="button" name="imprimir" class="btn btn-dark">IMPRIMIR TODO</Button></a></th>
        <?php
        include '../conexion.php';
          $idCurso = $consulta[2];
          $Solvencia = $consulta[3];
          $query1 = "SELECT Nombre FROM curso WHERE idCurso=$idCurso";
          $consulta1 =$mysqli->query($query1);
          $fila1=$consulta1->fetch_assoc();
          $NombreCurso =$fila1['Nombre'];
        ?>
        <tr>
          <td><center><?php echo $NombreCurso?></center></td>
          <td><center><?php
            if($Solvencia == 0)
            {
              echo "Insolvente De Asignacion";
            }
            else
            {
              echo "Solvente";
            } ?></center></td>
            <?php
              include '../conexion.php';
              $idHorario = $consulta[7];
              $query1 = "SELECT Hora,Jornada FROM horarios WHERE idHorario=$idHorario";
              $consulta1 =$mysqli->query($query1);
              $fila1=$consulta1->fetch_assoc();
              $Hora =$fila1['Hora'];
              $Jornada =$fila1['Jornada'];
            ?>
          <td><center><?php echo $Hora?></center></td>
          <td><center><?php echo $Jornada?></center></td>
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
