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
	<title>Ingrese Sus Datos</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/main.js"></script>
</head>
	<div class="contenedor_admin">
		<header role=banner>

		</header>
			<main class="contenedor_principal_admin" role="main">


				<body>
						<center>
							<div class="error">
								<span>Datos Ingresados No Validos, Intente De Nuevo!</span>
							</div>
							<div class="main" style="margin-top: 0px">
								<img src="img(1)/adminicon.png" width="20%">
								<form action="" id="formlg">
									<input type="text" name="usuariolg" placeholder="Usuario" pattern="[A-Za-z0-9_-@.]{1,25}" required/><br><br>
									<input type="password" name="passlg" placeholder="Contraseña" pattern="[A-Za-z0-9_-.]{1,20}" required/><br><br>
									<input type="submit" class="botonlg" value="Iniciar Sesion">
								</form>

							</div>
						</center>

						<a href="index.php">Volver</a>

			</body>
		</main>
	</div>
</html>
