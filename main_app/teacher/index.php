<?php  
	session_start();

	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] != 'Maestro') 
		{
			header('Location: ../salir.php');
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
	<title>Maestro</title>
</head>
	<body>
		<h1>BIENVENIDO  <?php echo $_SESSION['usuario']['Nombre'] ?></h1>
		<a href="../salir.php">SALIR</a>
	</body>
</html>