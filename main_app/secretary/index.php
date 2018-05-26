<?php
	session_start();
	if(isset($_SESSION['usuario']))
	{

		if($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../admin/");
		}
		else if ($_SESSION['usuario']['TipoUsuario'] != "Secretario")
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
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta charset="UTF-8">
	<title>Bienvenido Secretari@</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>
	<body>
		<?php include 'menu.php' ?>
		<center>
			<br><br>
			<h1> Bienvenido <?php echo $_SESSION['usuario']['Nombre'] ?></h1>
			<br>
			<img src="../../img(1)/secretary_icon.png" style="width: 35%"><br><br>
		</center>
		<?php include 'footer.php' ?>
	</body>
</html>
