<?php  
	require "conexion.php";

	$usuarios = $mysqli->query("SELECT Nombre, TipoUsuario FROM administracion WHERE Correo='".$_POST['usuariolg']."' AND Password='".$_POST['passlg']."'");

	if ($usuarios->num_rows == 1) 
	{
		$datos = $usuarios->fetch_assoc();
		echo json_encode(array('error' => false, 'tipo' => $datos['TipoUsuario']));
	}
	else
	{
		echo json_encode(array('error' => true));
	}

	$mysqli->close();
?>