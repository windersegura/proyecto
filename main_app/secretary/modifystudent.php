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
    $sentencia="SELECT * FROM alumnos WHERE idAlumno='".$no_prod."' ";
    $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
    $fila=$resultado->fetch_assoc();

    return
		[
			$fila['idAlumno'],
			$fila['Nombre'],
      $fila['Edad'],
      $fila['Direccion'],
			$fila['Telefono'],
			$fila['Sexo'],
			$fila['DPI'],
      $fila['Password'],
			$fila['TipoUsuario'],
			$fila['Correo'],
			$fila['CantidadCursos'],
		];

	}

?>

<!doctype html>
<html>
	<head>
    <meta charset="utf-8">
    <title>Modificación Del Alumno</title>
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
                      <a class="dropdown-item" href="assignmentstudent.php">Asignar Alumno a curso</a>
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
			<h3>Modificación De Los Datos Del Estudiante</h3>
			<div id="main" width="70%">
				<form class="form-group" action="modifystudentupdate.php" method="POST" >

					<input type="hidden" name="id" value="<?php echo $consulta[0]?>">

					<div class="col-md-4">
						<label>Nombre Completo <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z ñÑé]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $consulta[1]?>" required/>
					</div>

					<div class="col-md-3">
						<label>Edad<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="edad" class="form-input form-control" placeholder="Ingrese Edad" value="<?php echo $consulta[2]?>" required/>
					</div>

					<div class="col-md-4">
						<label>Direccion <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z-_0-9,. ñÑ]{1,240}" name="direccion" class="form-input form-control" placeholder="Ingrese Su Direccion De Ubicacion" value="<?php echo $consulta[3]?>" required/>
					</div>

					<div class="col-md-3">
						<label>Telefono<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,10}" name="telefono" class="form-input form-control" placeholder="Ingrese Numero Telefonico" value="<?php echo $consulta[4]?>" required/>
					</div>


	        <div class="form-group col-md-3">
						<label for="sexo" class="col-sm-2 control-label">Sexo</label>
						<div class="col-sm-10">
							<select class="form-control" id="sexo" name="sexo">
								<option value="<?php echo $consulta[5]?>" selected="selected"><?php echo $consulta[5]?></option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<label>Numero De DPI<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,13}" name="dpi" class="form-input form-control" placeholder="Su Numero De DPI" value="<?php echo $consulta[6]?>" required/>
					</div>

					<div class="col-md-3">
						<label>Contraseña<span><em>(requerido)</em></span></label><br>
		        <input  pattern="[0-9]{1,13}" name="password" class="form-input form-control" value="<?php echo $consulta[7]?>" required></input>
					</div>

	        <div class="form-group">
						<label for="tipo" class=" control-label">Tipo</label>
						<div class="col-md-3">
							<select class="form-control" id="tipo" name="tipo">
								<option value="<?php echo $consulta[8]?>" selected="selected"><?php echo $consulta[8]?></option>
								<option value="Alumno">Alumno</option>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<label>Correo Electronico<span><em>(requerido)</em></span></label><br>
		        <input type="mail" pattern="[0-9A-Za-z_-@.]{1,35}" name="correo" class="form-input form-control" placeholder="Su Correo" value="<?php echo $consulta[9]?>" required/>
					</div>
					<input type="hidden" name="cantidadcursos" value="<?php echo $consulta[10]?>">

					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="GUARDAR CAMBIOS">

					<a href="index.php" class="btn btn-success col-md-3" >REGRESAR</a>
				</form>
			</div>
		</center>

	</body>
</html>
