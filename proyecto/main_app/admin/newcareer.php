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

	<title>Nuevo Carrera</title>

</head>
	<body>
		<center>
			<div id="main" width="70%">
				<h1>Ingrese Los Datos De La Carrera</h1>
				<form class="form-group" action="careerupdate.php" method="POST" >

					<label>Nombre De La Carrera<span><em>(requerido)</em></span></label><br>
			        <input type="text" pattern="[A-Za-z ñÑ]{1,70}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre" required/><br>

			        <label>Años De Duración<span><em>(requerido)</em></span></label><br>
			        <input type="text" pattern="[0-9]{1,2}" name="anos" class="form-input form-control" placeholder="Ingrese La Duracion" required/><br>

			        <label>Codigo Unico De La Carrera<span><em>(requerido)</em></span></label><br>
			        <input type="text" pattern="[0-9]{1,5}" name="codigocarrera" class="form-input form-control" placeholder="Ingrese El Codigo Que Identifique La Carrera" required/><br>

					<input class="btn__submit" type="submit" value="REGISTRAR">

					<a href="index.php">Regresar</a>
				</form>
			</div>
		</center>
	</body>
</html>
