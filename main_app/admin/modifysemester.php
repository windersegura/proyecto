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
<?php

	$consulta=consultaprod($_GET['numero']);
	function consultaprod( $no_prod )
	{
		include '../conexion.php';
    $sentencia="SELECT * FROM semestre WHERE idSemestre='".$no_prod."' ";
    $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
    $fila=$resultado->fetch_assoc();

  	return
		[
			$fila['idSemestre'],
			$fila['NoSemestre'],
    	$fila['idCarrera']
		];
	}
?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Modificación De Semestre</title>
			<meta name="viewport" content="width=device-width, user-scalable=no">
			<link rel="stylesheet" href="../../css/bootstrap.css">
			<script src="../../js/jquery-3.3.1.min.js"></script>
			<script src="../../js/bootstrap.min.js"></script>
  </head>

	<body>
		<?php require 'menu.php' ?><br>
		<center>
			<h1>Modificación Del Semestre</h1>
			<div id="main" width="70%">
				<form class="form-group" action="modifysemesterupdate.php" method="POST" >

					<input type="hidden" name="id" value="<?php echo $consulta[0]?>">

					<div class="col-md-3">
						<label>No. Semestre <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="semestre" class="form-input form-control" placeholder="Ingrese El No. Del Semestre" value="<?php echo $consulta[1]?>" required/>
					</div>
					<br>
					<div class="form-group">
						<label for="carrera" class="col-sm-2 control-label">Seleccionar Carrera</label>
						<div class="col-md-4">
							<select class="form-control" id="carrera" name="carrera">
								<?php
								require '../conexion.php';
								$query = "SELECT idCarrera,NombreCarrera FROM carrera";
								$resultado = $mysqli->query($query);
									WHILE($row = $resultado->fetch_assoc())
								{?>
									<option value="<?php if($row['idCarrera'] != 1){echo $row['idCarrera'];} ?>"><?php if($row['NombreCarrera'] != 1){echo $row['NombreCarrera'];} ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<br><br>
					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="GUARDAR CAMBIOS">
					<a href="consultsemester.php" class="btn btn-warning col-md-3">REGRESAR</a>
				</form>
			</div>
		</center><br><br>
		<?php include 'footer.php' ?>
	</body>
</html>
