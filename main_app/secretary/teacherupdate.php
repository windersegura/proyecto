<?php
	require "../conexion.php";
	require "../delete_accents.php";

	session_start();

	//si la variable de session existe se queda de lo contrario lo desloguea o lo envia para su usuario correcto
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../Admin/");
		}

		else   if ($_SESSION['usuario']['TipoUsuario'] != "Secretario")
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
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$password=$_POST['password'];
	$dpi=$_POST['dpi'];
	$correo=$_POST['correo'];
	$tipo=$_POST['tipo'];

	$nombre1 = eliminar_simbolos($nombre);
	$nombre1=strtoupper($nombre1);

	//confirmacion que todos los datos esten llenos
	$req = (strlen($nombre)*strlen($direccion)*strlen($telefono)*strlen($password)*strlen($dpi)*strlen($correo)*strlen($tipo)) or die("No están llenos los espacios");

	$query = "INSERT INTO profesor VALUES (NULL, '$nombre','$direccion','$telefono','$password','$dpi','$correo','$tipo')";

	$mysqli->query($query);

	$mysqli->close();

header('Location: index.php')
?>
