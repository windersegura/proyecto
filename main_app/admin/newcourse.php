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
	<title>Nuevo Curso</title>
	
</head>
	<body>
		<center>	
			<div id="main" width="70%">
				<form class="form-group" action="courseupdate.php" method="POST" >
					
					<label>Nombre<span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[A-Za-z ñÑ]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Del Curso" required/><br> 

			        <label>Creditos<span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[0-9]{1,2}" name="creditos" class="form-input form-control" placeholder="Ingresa La Cantidad De Creditos" required/><br>
			
					<input class="btn__submit" type="submit" value="REGISTRAR">
			        
					<a href="index.php">Regresar</a>
				</form>
			</div>
		</center>
	</body>
</html>