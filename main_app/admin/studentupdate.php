<?php  
	require "../conexion.php";

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

	//se guardan en variables todos los valores del formulario
	$nombre=$_POST['nombre'];
	$edad=$_POST['edad'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$sexo=$_POST['sexo'];
	$dpi=$_POST['dpi'];
	$password=$_POST['password'];
	$tipo=$_POST['tipo'];
	$correo=$_POST['correo'];	

	//confirmacion que todos los datos esten llenos
	$req = (strlen($nombre)*strlen($edad)*strlen($direccion)*strlen($telefono)*strlen($sexo)*strlen($dpi)*strlen($password)*strlen($tipo)*strlen($correo)) or die("No están llenos los espacios");

	$query = "INSERT INTO alumnos VALUES (NULL, '$nombre','$edad','$direccion','$telefono','$sexo','$dpi','$password','$correo','$tipo')";

	$mysqli->query($query);

	$mysqli->close();

header('Location: index.php')
?>
