<?php  
	require "conexion.php";

	$usuarios = $mysqli->query("SELECT Nombre, TipoUsuario FROM profesor WHERE Correo='".$_POST['usuariolgteacher']."' AND Password='".$_POST['passlgteacher']."'");

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