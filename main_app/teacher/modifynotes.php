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
	$consulta=consultaprod($_GET['numero']);
	function consultaprod( $no_prod )
	{
    require '../conexion.php';
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
			$fila['idSemestre'],
			$fila['idHorario']
		];
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificación De Notas Del Alumno</title>
				<link rel="stylesheet" href="../../css/bootstrap.css">
				<script src="../../js/jquery-3.3.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </head>

	<body>
		<?php include 'menu.php' ?><br>
		<center>
			<h1>Modifique Las Notas Del Aumno</h1><br>
			<div id="main" width="70%" class="container">
				<form class="form-group" action="modifynotesupdate.php" method="POST" >

          <input type="hidden" name="id" value="<?php echo $consulta[0]?>">
          <input type="hidden" name="idcurso" value="<?php echo $consulta[1]?>">

					<div class="col-md-2">
						<label>Primer Parcial</label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="parcial1" class="form-input form-control"  value="<?php echo $consulta[2]?>" required/>
					</div>


					<div class="col-md-2">
						<label>Segundo Parcial</label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="parcial2" class="form-input form-control" value="<?php echo $consulta[3]?>" required/>
					</div>

					<div class="col-md-2">
						<label>Tareas</label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="tareas" class="form-input form-control" value="<?php echo $consulta[4]?>" required/>
					</div>

          <div class="col-md-2">
						<label>Parcial Final</label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="parcialfinal" class="form-input form-control" value="<?php echo $consulta[5]?>" required/>
					</div>

          <input type="hidden" name="idalumno" value="<?php echo $consulta[6]?>">
          <input type="hidden" name="idprofesor" value="<?php echo $consulta[7]?>">
          <input type="hidden" name="idcarrera" value="<?php echo $consulta[8]?>">
          <input type="hidden" name="idsemestre" value="<?php echo $consulta[9]?>">
					<input type="hidden" name="idhora" value="<?php echo $consulta[10]?>"><br><br>

					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="GUARDAR CAMBIOS">

					<a href="consultstudentteacher.php" class="btn btn-success col-md-3">REGRESAR</a>
				</form>
			</div>
		</center><br><br>
		<?php include 'footer.php' ?>
	</body>
</html>
