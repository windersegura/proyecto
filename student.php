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
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta charset="UTF-8">
	<title>Ingrese Sus Datos</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/main.js"></script>
</head>

<div class="contenedor_principal_estudiante">


<header>
</header>

<main>

	<body>
		<div class="error">
			<span>Datos Ingresados No Validos, Intente De Nuevo!</span>
		</div>
		<center>
			<div class="main" style="margin-top: 0px">
				<img src="img(1)/studenticon.png" width="20%">
				<form action="" id="formlgstudent">
					<input type="text" name="usuariolgstudent" placeholder="Usuario" pattern="[A-Za-z0-9_-@.]{1,25}" required/><br><br>
					<input type="password" name="passlgstudent" placeholder="Contraseña" pattern="[A-Za-z0-9_-@.]{1,25}" required/><br><br>
					<input type="submit" class="botonlgstudent" value="Iniciar Sesion">
				</form>

			</div>
		</center>

		<a type="button" href="index.php">Volver</a>

	</main>

	</body>

	</div>
</html>
