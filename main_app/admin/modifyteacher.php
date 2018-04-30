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
        $sentencia="SELECT * FROM profesor WHERE idProfesor='".$no_prod."' ";
        $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli)); 
        $fila=$resultado->fetch_assoc();

        return 
		[   $fila['idProfesor'],
			$fila['Nombre'],
            $fila['Direccion'],
			$fila['Telefono'],
            $fila['Password'],
			$fila['DPI'],
			$fila['Correo'],	
			$fila['TipoUsuario'],
		];
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificación Del Alumno</title>
       
    </head>
 
	<body>
		<center>	
			<div id="main" width="70%">
				<form class="form-group" action="modifyteacherupdate.php" method="POST" >

					<input type="hidden" name="id" value="<?php echo $consulta[0]?>">
					
					<label>Nombre Completo <span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[A-Za-z ñÑ]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $consulta[1]?>" required/><br> 

			        <label>Direccion <span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[A-Za-z-_0-9,. ]{1,240}" name="direccion" class="form-input form-control" placeholder="Ingrese Su Direccion De Ubicacion" value="<?php echo $consulta[2]?>" required/><br>

			        <label>Telefono<span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[0-9]{1,10}" name="telefono" class="form-input form-control" placeholder="Ingrese Numero Telefonico" value="<?php echo $consulta[3]?>" required/><br>

					<label>Contraseña<span><em>(requerido)</em></span></label><br> 
			        <input  pattern="[0-9]{1,13}" name="password" class="form-input form-control" value="<?php echo $consulta[4]?>" required></input><br>

					<label>Numero De DPI<span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[0-9]{1,13}" name="dpi" class="form-input form-control" placeholder="Su Numero De DPI" value="<?php echo $consulta[5]?>" required/><br>

			        <label>Correo Electronico<span><em>(requerido)</em></span></label><br> 
			        <input type="mail" pattern="[0-9A-Za-z_-@.]{1,35}" name="correo" class="form-input form-control" placeholder="Su Correo" value="<?php echo $consulta[6]?>" required/><br>

			        <div class="form-group">
					<label for="tipo" class="col-sm-2 control-label">Tipo</label>
						<div class="col-sm-10">
							<select class="form-control" id="tipo" name="tipo">
								<option value=""></option>
								<option value="Maestro">Maestro</option>
								
							</select>
						</div>
					</div>
			
					<input class="btn__submit" type="submit" value="GUARDAR CAMBIOS">
			        
					<a href="index.php">Regresar</a>
				</form>
			</div>
		</center>
	 
	</body>
</html>