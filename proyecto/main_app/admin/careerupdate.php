<?php  
	require "../conexion.php";
	require "../delete_accents.php";

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
	$anos=$_POST['anos'];
	$codigocarrera=$_POST['codigocarrera'];

	$nombre1 = eliminar_simbolos($nombre);
	$nombre1=strtoupper($nombre1);

	//confirmacion que todos los datos esten llenos
	$req = (strlen($nombre1)*strlen($anos)*strlen($codigocarrera)) or die("No están llenos los espacios");

	$query = "INSERT INTO carrera VALUES (NULL, '$nombre1','$anos','$codigocarrera')";

	$mysqli->query($query);

	$mysqli->close();

header('Location: index.php')
?>
