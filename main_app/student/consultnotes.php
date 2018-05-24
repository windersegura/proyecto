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
<?php
	$consulta=consultaprod($_GET['numero']);
	function consultaprod( $no_prod )
	{
    include '../conexion.php';
    $query="SELECT * FROM asignatura WHERE idAsignatura=$no_prod";
    $resultado = $mysqli->query($query) or die (mysql_error($mysqli));
    $fila=$resultado->fetch_assoc();

    return
		[
      $fila['idAsignatura'],
			$fila['idCurso'],
      $fila['PrimerPar'],
      $fila['SegundoPar'],
      $fila['Tareas'],
      $fila['ParcialFinal'],
      $fila['idAlumno'],
			$fila['idProfesor'],
      $fila['idCarrera'],
			$fila['idSemestre']
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

		<center><br><h1>LISTADO DE TUS NOTAS</h1><br><br>

		<table class="table">
			<th><center>Nombre Del Curso</center></th>
			<th><center>Primer Parcial</center></th>
			<th><center>Seundo Parcial</center></th>
      <th><center>Tareas</center></th>
      <th><center>Parcial Final</center></th>
			<th><center> Total </center></th>

			<?php echo "<td><a href='printnotes.php?numero=".$consulta[0]."'><button type='button' name='eliminar' class='btn btn-dark'>Imprimir</Button></a></td>"; ?>
        <?php
        include '../conexion.php';
          $idCurso = $consulta[1];
          $query1 = "SELECT Nombre FROM curso WHERE idCurso=$idCurso";
          $consulta1 =$mysqli->query($query1);
          $fila1=$consulta1->fetch_assoc();
          $NombreCurso =$fila1['Nombre'];
					$Total = $consulta[2]+$consulta[3]+$consulta[4]+$consulta[5];
        ?>
        <tr>
          <td><center><?php echo $NombreCurso?></center></td>
          <td><center><?php echo $consulta[2]?></center></td>
          <td><center><?php echo $consulta[3]?></center></td>
          <td><center><?php echo $consulta[4]?></center></td>
          <td><center><?php echo $consulta[5]?></center></td>
					<td><center><?php echo $Total?></center></td>
        </tr>
        </table>
        <?php
         echo "<a href='consultcoursestudent.php><button type='button' name='eliminar' class='btn btn-danger col-md-3'>VOLVER</Button></a>"
        ?>
      </center>

    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
