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
	$semestre=$_POST['semestre'];
	$carrera=$_POST['carrera'];

	$query2 = "SELECT NombreCarrera FROM carrera WHERE idCarrera= $carrera";
	$resultado = $mysqli->query($query2);
	$fila=$resultado->fetch_assoc();
	$Carerita = $fila['NombreCarrera'];



	//confirmacion que todos los datos esten llenos
	$req = (strlen($semestre)*strlen($carrera)*strlen($Carerita)) or die("No están llenos los espacios");

	$query = "INSERT INTO semestre VALUES (NULL, '$semestre', '$carrera', '$Carerita')";

	$mysqli->query($query);

	$mysqli->close();

header('Location: consultsemester.php')
?>
