
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
	    <!-- jQuery -->
	    <script src="js/jquery.min.js"></script>
			<script src="js/jquery-3.3.1.min.js"></script>

	    <!-- Bootstrap -->
	    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
	    <script src="js/bootstrap.js"></script>
			<script src="js/bootstrap.min.js"></script>

	    <!-- CSS DataTable -->
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.min.js"></script>
	<title>Bienvenido Administrador</title>
</head>
	<body>
		<?php require 'menu.php' ?>

		</ul>
		<br>
		<center>
			<h1>BIENVENIDO <?php echo $_SESSION['usuario']['Nombre'] ?></h1>
			<img src="../../img(1)/device_manager.png" width="35%" >
		</center><br><br>
		<?php include 'footer.php' ?>
	</body>
</html>
