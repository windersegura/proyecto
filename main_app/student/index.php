<?php
	session_start();

	//si la variable de session existe de lo contrario no se hace nada
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
			$fila['Nombre'],
			$fila['Edad'],
			$fila['Direccion'],
			$fila['Telefono'],
			$fila['Sexo'],
			$fila['DPI'],
			$fila['Password'],
			$fila['TipoUsuario'],
			$fila['Correo'],
		];
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido Estudiante</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</head>
	<body>
		<div class="pos-f-t">
	  	<div class="collapse" id="navbarToggleExternalContent">
		    <div class="bg-danger p-4">
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
						          <a class="dropdown-item" href="#">Consultar Horario</a>
						          <a class="dropdown-item" href="consultcoursestudent.php">Consultar Curso</a>
						          <a class="dropdown-item" href="#">Consultar Maestro</a>
											<a class="dropdown-item" href="formPago.php">Realizar Pago</a>
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
		  <nav class="navbar navbar-dark bg-danger">
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		  </nav>
		</div>
		<center><br>
			<?php
		 	if ($consulta[5] =="Masculino")
			{
				 echo "<h1> BIENVENIDO $consulta[1]</h1>" ;
		 	}
			else
			{
				echo "<h1> BIENVENIDA $consulta[1]</h1>" ;
			}?>


			</aside>
		</center>
	</body>
</html>
