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

	$idProfesor = $_SESSION['usuario']['idProfesor'];
		$consulta=consultaprod($idProfesor);
		function consultaprod( $no_prod )
		{
			include '../conexion.php';
			$sentencia="SELECT * FROM profesor WHERE idProfesor='".$no_prod."' ";
			$resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
			$fila=$resultado->fetch_assoc();

			return
			[
				$fila['idProfesor'],
				$fila['Nombre']
			];
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido Maestro</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</head>
	<body>
		<?php include 'menu.php' ?>

		<center><br>
			<h1>BIENVENIDO <?php echo $consulta[1]?></h1><br><br>
			<img src="../../img(1)/teaching.png" alt="">
		</center><br><br>
		<?php include 'footer.php' ?>
	</body>
</html>
