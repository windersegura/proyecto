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
	<link rel="stylesheet" href="css/bootstrap.css">
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
								<img src="img(1)/adminicon.png" width="20%"><br>
								<form action="" id="formlg" class="form-group">
									<div class="col-md-4">
										<input class="form-input form-control" type="text" name="usuariolg" placeholder="Usuario" pattern="[A-Za-z0-9_-@.]{1,25}" required/>
									</div>
<br>
									<div class="col-md-4">
										<input class="form-input form-control" type="password" name="passlg" placeholder="Contraseña" pattern="[A-Za-z0-9_-.]{1,20}" required/>
									</div>
<br>
									<input type="submit" class="btn btn-primary col-md-3" value="Iniciar Sesion">
									<a href="index.php" class="btn btn-dark col-md-3">Volver</a>
								</form>

							</div>
						</center>



			</body>
		</main>
	</div>
</html>
