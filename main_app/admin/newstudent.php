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
	<title>Nuevo Estudiante</title>
</head>
	<body>

		<label>Nombre Completo <span><em>(requerido)</em></span></label><br> 
        <input  pattern="[A-Z]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" required/><br> 

        <label>Edad<span><em>(requerido)</em></span></label><br> 
        <input  pattern="[0-1]{1,2}" name="edad" class="form-input form-control" placeholder="Ingrese Edad" required/><br> 

        <label>Direccion <span><em>(requerido)</em></span></label><br> 
        <input  pattern="[A-Za-z-_0-9]{1,240}" name="direccion" class="form-input form-control" placeholder="Ingrese Su Direccion De Ubicacion" required/><br>

        <label>Telefono<span><em>(requerido)</em></span></label><br> 
        <input  pattern="[0-9]{1,10}" name="telefono" class="form-input form-control" placeholder="Ingrese Numero" required/><br>

        <div class="form-group">
		<label for="tipo" class="col-sm-2 control-label">Sexo</label>
			<div class="col-sm-10">
				<select class="form-control" id="sexo" name="tipo">
					<option value=""></option>
					<option value="masculino">Masculino</option>
					<option value="femenino">Femenino</option>
				</select>
			</div>
		</div>

		<label>Numero De DPI<span><em>(requerido)</em></span></label><br> 
        <input  pattern="[0-9]{1,13}" name="dpi" class="form-input form-control" placeholder="Su Numero De DPI" required/><br>

        <label>Contraseña<span><em>(requerido)</em></span></label><br> 
        <input  pattern="[0-9]{1,13}" name="dpi" class="form-input form-control" value="<?php $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );  echo $random_number;?>" required></input><br>



	</body>
</html>