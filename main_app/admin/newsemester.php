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
	<title>Nuevo Semestre</title>

</head>
<?php require 'menu.php' ?><br>
	<body>
		<center>
			<h1>Ingrese El Nuevo Semestre</h1><br>
			<div id="main" width="70%">
				<form class="form-group" action="updatesemester.php" method="POST" >
					<div class="col-md-3">
						<label>No. Del Semestre<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="semestre" class="form-input form-control" placeholder="Ingrese No. Del Semestre" required/>
					</div>
					<br>
	        <div class="form-group col-md-4">
						<label for="carrera" class=" control-label">Seleccionar Carrera</label>
						<div class="col-sm-10">
							<select class="form-control" id="carrera" name="carrera">
								<option value="">Seleccione La Carrera</option>
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
					<br><br>
					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="REGISTRAR">
					<a href="index.php" class="btn btn-warning col-md-3">REGRESAR</a>
				</form>
			</div>
		</center><br><br>
		<?php include 'footer.php' ?>
	</body>
</html>
