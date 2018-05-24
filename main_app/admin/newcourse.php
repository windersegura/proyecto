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

	require '../conexion.php';

	$query = "SELECT idCarrera, NombreCarrera FROM carrera";
	$resultado = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<title>Nuevo Curso</title>

</head>
	<body>
		<?php require 'menu.php' ?>
		<center>
			<div id="main" width="70%">
				<h1>Ingrese Los Datos Del Curso</h1>
				<form class="form-group" action="courseupdate.php" method="POST" >

					<div class="col-md-4">
						<label>Nombre<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z ñÑ]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Del Curso" required/>
					</div>

					<div class="col-md-3">
						<label>Creditos<span><em>(requerido)</em></span></label><br>
						<input type="text" pattern="[0-9]{1,2}" name="creditos" class="form-input form-control" placeholder="Ingresa La Cantidad De Creditos" required/>
					</div>

					<div class="col-md-3">
						<label>Semestre<span><em>(requerido)</em></span></label><br>
						<input type="text" pattern="[0-9]{1,2}" name="semestre" class="form-input form-control" placeholder="Ingrese El Semestre" required/>
					</div>

	        <div class="form-group ">
						<label for="carrera" class="control-label">Seleccionar Carrera</label>
						<div class="col-md-5">
							<select class="form-control" id="carrera" name="carrera">
								<option value="">Seleccione Carrera</option>
								<?php
									WHILE($row = $resultado->fetch_assoc())
								{?>
									<option value="<?php if($row['idCarrera'] != 1){echo $row['idCarrera'];} ?>"><?php if($row['NombreCarrera'] != 1){echo $row['NombreCarrera'];} ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>

					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="REGISTRAR">

					<a href="index.php" class="btn btn-success col-md-3">REGRESAR</a>
				</form>
			</div>
		</center>
	</body>
</html>
