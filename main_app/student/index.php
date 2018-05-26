<?php
	session_start();
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

	$idAlumno = $_SESSION['usuario']['idAlumno'];
		$consulta=consultaprod($idAlumno);
		function consultaprod( $no_prod )
		{
			include '../conexion.php';
			$sentencia="SELECT * FROM alumnos WHERE idAlumno='".$no_prod."' ";
			$resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
			$fila=$resultado->fetch_assoc();

			return
			[
				$fila['idAlumno'],
				$fila['Nombre']
			];
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<title>Bienvenido Estudiante</title>
</head>
<body>

		<?php require 'menu.html' ?>

		<center><br>
			<h1>BIENVENIDO <?php echo $consulta[1] ?></h1>
			<img src="../../img(1)/student_manager.png" width="35%" ><br><br><br>
		</center>
		<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

	<?php require 'footer.php' ?>
</body>
</html>
