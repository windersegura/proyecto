
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
	<title>Bienvenido Administrador</title>
</head>
	<body>
		<ul>
			<li><a href="newstudent.php">Ingresar Alumno</a></li>
			<li><a href="#">Ingresar Maestro</a></li>
			<li><a href="#">Ingresar Cursos</a></li>
			<li><a href="#">Ingresar Carrera</a></li>
			<li><a href="#">Eliminar Alumno</a></li>
			<li><a href="#">Eliminar Maestro</a></li>
			<li><a href="#">Consultar Alumno</a></li>
			<li><a href="#">Consultar Maestro</a></li>
			<li><a href="#">Solvencias</a></li>
			<li><a href="#">Asignar Alumno a curso</a></li>
			<li><a href="#">Asignar Maestro a curso</a></li>

			<li><a href="../salir.php">SALIR</a></li>		

		</ul>
		<h1>Bienvenido <?php echo $_SESSION['usuario']['Nombre'] ?></h1>
		
	</body>
</html>