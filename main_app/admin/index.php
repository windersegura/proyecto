
<?php
	session_start();
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
	<meta name="viewport" content="width=device-width, user-scalable=1.0">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<title>Bienvenido Administrador</title>
</head>
	<body>
		<?php require 'menu.php' ?>

		</ul>
		<br>
		<center>
			<h1>BIENVENIDO <?php echo $_SESSION['usuario']['Nombre'] ?></h1>
			<img src="../../img(1)/device_manager.png" width="35%" >
		</center>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	</body>
</html>
