<?php
	session_start();

	//si la variable de session existe se queda de lo contrario lo desloguea o lo envia para su usuario correcto
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../secretary/");
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
?>

<?php

	ModificarAlumno($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['password'], $_POST['dpi'], $_POST['correo'],  $_POST['tipo'],$_POST['cantidadcursos']);

	function ModificarAlumno($id, $nombre, $direccion, $telefono,  $password, $dpi, $correo, $tipo,$cantidadcursos)
	{
		include '../conexion.php';
		require "../delete_accents.php";

		$nombre1 = eliminar_simbolos($nombre);
		$nombre1=strtoupper($nombre1);
		$sentencia="UPDATE profesor SET idProfesor ='".$id."', Nombre ='".$nombre1."',  Direccion ='".$direccion."', Telefono ='".$telefono."', Password ='".$password."', DPI ='".$dpi."', Correo ='".$correo."',  TipoUsuario='".$tipo."' CantidadCursos='".$cantidadcursos."' WHERE idProfesor='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$mysqli->close();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='consultteacher.php';
</script>
