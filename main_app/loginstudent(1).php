<?php  
	require "conexion.php";

	$usuarios = $mysqli->query("SELECT Nombre, TipoUsuario FROM alumnos WHERE Correo='".$_POST['usuariolgstudent']."' AND Password='".$_POST['passlgstudent']."'");

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