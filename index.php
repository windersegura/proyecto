<?php  
	session_start();

	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] == 'Admin') 
		{
			header('Location: main_app/admin/');
		}
		else if($_SESSION['usuario']['TipoUsuario'] == 'Secretario')
		{
			header('Location: main_app/secretary/');
		}
		else if($_SESSION['usuario']['TipoUsuario'] == 'Alumno')
		{
			header('Location: main_app/student/');
		}
		else if($_SESSION['usuario']['TipoUsuario'] == 'Maestro')
		{
			header('Location: main_app/teacher/');
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido a UGJG</title>
</head>
	<body>
		<center>
			<ul>
				<li><a href="admin.php">Administrativo</a></li>
				<li><a href="student.php">Estudiante</a></li>
				<li><a href="teacher.php">Maestro</a></li>
			</ul>
			<ul>
				<li><a href="#">Carreras</a></li>
			</ul>

			<h1>UNIVERDIDAD GRAN JAGUAR DE GUATEMALA</h1>
		</center>
	</body>
</html>