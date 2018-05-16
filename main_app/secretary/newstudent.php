<?php
	session_start();

	//si la variable de session existe se queda de lo contrario lo desloguea o lo envia para su usuario correcto
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../Admin/");
		}

		else   if ($_SESSION['usuario']['TipoUsuario'] != "Secretario")
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
		<script src="../../js/jquery-3.3.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
	<title>Nuevo Estudiante S.</title>
</head>
	<body>
		<center>
			<h1>Ingrese Los Datos Del Nuevo Estudiante</h1>

				<form  action="studentupdate.php" method="POST" >
					<div class="form-group bk-dark" >
						<div class="col-md-6">
							<label>Nombre Completo <span><em>(requerido)</em></span></label><br>
			        <input type="text" pattern="[A-Za-z ñÑé]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" required/>
						</div>

						<div class="col-md-4">
							<label>Edad<span><em>(requerido)</em></span></label><br>
			        <input type="text" pattern="[0-9]{1,2}" name="edad" class="form-input form-control" placeholder="Ingrese Edad" required/>
						</div>

						<div class="col-md-6">
							<label>Direccion <span><em>(requerido)</em></span></label><br>
							<input type="text" pattern="[A-Za-z-_0-9,. ñÑ]{1,240}" name="direccion" class="form-input form-control" placeholder="Ingrese Su Direccion De Ubicacion" required/>
						</div>

						<div class="col-md-4">
							<label>Telefono<span><em>(requerido)</em></span></label><br>
			        <input type="text" pattern="[0-9]{1,10}" name="telefono" class="form-input form-control" placeholder="Ingrese Numero Telefonico" required/>
						</div>

		        <div class="form-group col-md-4">
							<label for="sexo" class="col-sm-2 control-label">Sexo</label>

								<select class="custom-select" id="sexo" name="sexo">
									<option value="">Seleccione Sexo...</option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select>
							<div class="invalid-feedback">No Ha Seleccionado</div>
						</div>

						<div class="col-md-3">
							<label>Numero De DPI<span><em>(requerido)</em></span></label><br>
		        	<input type="text" pattern="[0-9]{1,13}" name="dpi" class="form-input form-control" placeholder="Su Numero De DPI" required/>
						</div>

						<div class="col-md-3">
							<label>Contraseña<span><em>(requerido)</em></span></label><br>
			        <input  pattern="[0-9]{1,13}" name="password" class="form-input form-control" value="<?php $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );  echo $random_number;?>" required></input>
						</div>


		        <div class="form-group col-md-3">
								<label for="tipo" class="col-sm-2 control-label">Tipo</label>
								<div class="col-sm-10">
									<select class="form-control" id="tipo" name="tipo">
										<option value=""></option>
										<option value="Alumno">Alumno</option>
									</select>
								</div>
						</div>

						<div class="col-md-4">
							<label>Correo Electronico<span><em>(requerido)</em></span></label><br>
			        <input type="mail" pattern="[0-9A-Za-z_-@.]{1,35}" name="correo" class="form-input form-control" placeholder="Su Correo" required/>
						</div>


					<input class="btn__submit btn btn-dark" type="submit" value="REGISTRAR">

					<a href="index.php" class="btn btn-primary">Regresar</a>

				</div>
			</form>
		</center>


	</body>
</html>
