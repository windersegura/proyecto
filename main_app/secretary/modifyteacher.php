<?php
	session_start();

	//si la variable de session existe se queda de lo contrario lo desloguea o lo envia para su usuario correcto
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../secretary/");
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
<?php

	$consulta=consultaprod($_GET['numero']);
	function consultaprod( $no_prod )
	{
		include '../conexion.php';
    $sentencia="SELECT * FROM profesor WHERE idProfesor='".$no_prod."' ";
    $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
    $fila=$resultado->fetch_assoc();

    return
		[
			$fila['idProfesor'],
			$fila['Nombre'],
      $fila['Direccion'],
			$fila['Telefono'],
      $fila['Password'],
			$fila['DPI'],
			$fila['Correo'],
			$fila['TipoUsuario'],
			$fila['CantidadCursos']
		];
	}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificación Del Maestro</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
 		<script src="../../js/jquery-3.3.1.min.js"></script>
 		<script src="../../js/bootstrap.min.js"></script>
  </head>

	<body>
		<div class="pos-f-t">
			<div class="collapse" id="navbarToggleExternalContent">
				<div class="bg-primary p-4">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse " id="navbarTogglerDemo01">

							<ul class="navbar-nav mr-auto mt-2 mt-lg-0">



									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Opciones
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="newstudent.php">Ingresar Alumno</a>
											<a class="dropdown-item" href="newteacher.php">Ingresar Maestro</a>
											<a class="dropdown-item" href="consultstudent.php">Consultar Alumno</a>
											<a class="dropdown-item" href="consultteacher.php">Consultar Maestro</a>
											<a class="dropdown-item" href="#">Solvencias (PENDIENTE HASTA TENER PROTOCOLO)</a>
											<a class="dropdown-item" href="#">Asignar Alumno a curso</a>
											<a class="dropdown-item" href="#">Asignar Maestro a curso</a>
										</div>
									</li>
									<li class="nav-item">
										<a class="nav-link " href="../salir.php">Salir</a>
									</li>
							</ul>

					</div>
				</nav>
				</div>
			</div>
			<nav class="navbar navbar-dark bg-primary">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</nav>
		</div>

		<center>
			<h1>Modificación De Los Datos Del Maestro</h1>
			<div id="main" width="70%">
				<form class="form-group" action="modifyteacherupdate.php" method="POST" >

					<input type="hidden" name="id" value="<?php echo $consulta[0]?>">

					<div class="col-md-4">
						<label>Nombre Completo <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z ñÑ]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $consulta[1]?>" required/>
					</div>

					<div class="col-md-4">
						<label>Direccion <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z-_0-9,. ]{1,240}" name="direccion" class="form-input form-control" placeholder="Ingrese Su Direccion De Ubicacion" value="<?php echo $consulta[2]?>" required/>
					</div>

					<div class="col-md-3">
						<label>Telefono<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,10}" name="telefono" class="form-input form-control" placeholder="Ingrese Numero Telefonico" value="<?php echo $consulta[3]?>" required/>
					</div>

					<div class="col-md-3">
						<label>Contraseña<span><em>(requerido)</em></span></label><br>
		        <input  pattern="[0-9]{1,13}" name="password" class="form-input form-control" value="<?php echo $consulta[4]?>" required></input>
					</div>

					<div class="col-md-3">
						<label>Numero De DPI<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,13}" name="dpi" class="form-input form-control" placeholder="Su Numero De DPI" value="<?php echo $consulta[5]?>" required/>
					</div>

					<div class="col-md-4">
						<label>Correo Electronico<span><em>(requerido)</em></span></label><br>
		        <input type="mail" pattern="[0-9A-Za-z_-@.]{1,35}" name="correo" class="form-input form-control" placeholder="Su Correo" value="<?php echo $consulta[6]?>" required/>
					</div>


	        <div class="form-group ">
						<label for="tipo" class="control-label">Tipo</label>
							<div class="col-md-3">
								<select class="form-control" id="tipo" name="tipo">
									<option value="Maestro"></option>
									<option value="Maestro">Maestro</option>

							</select>
						</div>
					</div>

					<input type="hidden" name="cantidadcursos" value="<?php echo $consulta[8]?>">

					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="GUARDAR CAMBIOS">

					<a href="index.php" class="btn btn-success col-md-3">REGRESAR</a>
				</form>
			</div>
		</center>

	</body>
</html>
