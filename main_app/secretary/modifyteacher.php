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
		<?php include 'menu.php' ?><br><br>

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

					<input type="hidden" name="cantidadcursos" value="<?php echo $consulta[8]?>"><br>

					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="GUARDAR CAMBIOS">

					<a href="consultteacher.php" class="btn btn-primary col-md-3">REGRESAR</a>
				</form>
			</div>
		</center><br><br>
		<?php include 'footer.php' ?>
	</body>
</html>
