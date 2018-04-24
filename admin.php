<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingrese Sus Datos</title>
	<link rel="stylesheet" href="css/main.css">
</head>
	<body>

		<div class="contenedor-admin">	
			<header>
				
				<nav class="logo-admin">
					logotipo principal aqui
				</nav>

			</header>

			<div class="error">
				<span>Datos Ingresados No Validos, Intente De Nuevo!</span>
			</div>
			<div class="main">
				<form action="" id="formlg">
					<input type="text" name="usuariolg" placeholder="Usuario" pattern="[A-Za-z0-9_-@.]{1,25}" required/><br><br>
					<input type="password" name="passlg" placeholder="Contraseña" pattern="[A-Za-z0-9_-@.]{1,25}" required/><br><br>
					<input type="submit" class="botonlg" value="Iniciar Sesion">
				</form>

			</div>
			

			<a href="index.php">Volver</a>
			<script src="js/jquery-3.3.1.min.js"></script>
			<script src="js/main.js"></script>
		</div>
	</body>
</html>