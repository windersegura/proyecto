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
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
	<body>
		<div class="error">
			<span>Datos Ingresados No Validos, Intente De Nuevo!</span>
		</div>

		<center><br><br>
			<img src="img(1)/teachericon.png" width="30%"><br>
			<div class="main col-md-5" style="margin-top: 0px" >

				<form action="" id="formlgteacher">

					<input type="text" name="usuariolgteacher" placeholder="Usuario" pattern="[A-Za-z0-9_-@.]{1,25}" required/><br><br>
					<input type="password" name="passlgteacher" placeholder="Contraseña" pattern="[A-Za-z0-9_-@.]{1,25}" required/><br><br>
					<a href="index.php" class="btn btn-dark col-md-5">VOLVER</a>
					<input class="btn btn-success col-md-5" type="submit"  value="INICIAR SESION">
				</form>

			</div>
		</center>


		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
