<?php
	session_start();

	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{

		if($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../admin/");
		}
		else if ($_SESSION['usuario']['TipoUsuario'] != "Secretario")
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
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta charset="UTF-8">
	<title>Bienvenido Secretari@</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="pos-f-t">
	  	<div class="collapse" id="navbarToggleExternalContent">
		    <div class="bg-primary p-4">
		      <nav class="navbar navbar-expand-lg navbar-light bg-light">
			  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				    	<span class="navbar-toggler-icon"></span>
				  	</button>
				  	<div class="collapse navbar-collapse " id="navbarTogglerDemo01">
				    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
								 	<li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Opciones
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						          <a class="dropdown-item" href="newstudent.php">Ingresar Alumno</a>
						          <a class="dropdown-item" href="newteacher.php">Ingresar Maestro</a>
						          <a class="dropdown-item" href="consultstudent.php">Consultar Alumno</a>
						          <a class="dropdown-item" href="consultteacher.php">Consultar Maestro</a>
						          <a class="dropdown-item" href="#">Solvencias (PENDIENTE HASTA TENER PROTOCOLO)</a>
						          <a class="dropdown-item" href="assignmentstudent.php">Asignar Alumno a curso</a>
						          <a class="dropdown-item" href="#">Asignar Maestro a curso</a>
						        </div>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link " href="../salir.php">Salir</a>
					      	</li>
				    	</ul>
				  </div>
				</nav>
		    </div>
		  </div>
		  <nav class="navbar navbar-dark bg-primary">
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		  </nav>
		</div>
		<center>
			<br><br>
			<h1> Bienvenido <?php echo $_SESSION['usuario']['Nombre'] ?></h1>
			<br>
			<img src="../../img(1)/secretary_icon.png" style="width: 20%">
		</center>
	</body>
</html>
