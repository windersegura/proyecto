<?php
	session_start();

	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{

		if($_SESSION['usuario']['TipoUsuario'] != "Alumno")
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
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<title>Bienvenido Estudiante</title>
</head>
<body>



		<center>
			<h1>BIENVENIDO <?php echo $_SESSION['usuario']['Nombre'] ?></h1>
			<img src="../../img(1)/student_manager.png" width="35%" >
		</center>
		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>


</body>
</html>