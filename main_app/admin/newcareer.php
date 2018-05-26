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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<title>Nuevo Carrera</title>

</head>
<?php require 'menu.php' ?>
	<body>
		<center><br>
			<div id="main" width="70%">
				<h1>Ingrese Los Datos De La Carrera</h1>
				<form class="form-group" action="careerupdate.php" method="POST" >

					<div class="col-md-4">
						<label>Nombre De La Carrera<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z ñÑ]{1,70}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre" required/>
					</div>

					<div class="col-md-3">
						<label>Años De Duración<span><em>(requerido)</em></span></label><br>
						<input type="text" pattern="[0-9]{1,2}" name="anos" class="form-input form-control" placeholder="Ingrese La Duracion" required/>
					</div>

					<div class="col-md-3">
						<label>Codigo Unico De La Carrera<span><em>(requerido)</em></span></label><br>
						<input type="text" pattern="[0-9]{1,5}" name="codigocarrera" class="form-input form-control" placeholder="Ingrese El Codigo Que Identifique La Carrera" required/>
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
