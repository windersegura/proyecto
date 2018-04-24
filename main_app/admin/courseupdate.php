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
	$creditos=$_POST['creditos'];
	
	//confirmacion que todos los datos esten llenos
	$req = (strlen($nombre)*strlen($creditos)) or die("No están llenos los espacios");

	$query = "INSERT INTO curso VALUES (NULL, '$nombre','$creditos')";

	$mysqli->query($query);

	$mysqli->close();

header('Location: index.php')
?>
