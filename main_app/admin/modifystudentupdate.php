<?php
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
?>


<?php

	ModificarAlumno($_POST['id'], $_POST['nombre'], $_POST['edad'], $_POST['direccion'], $_POST['telefono'], $_POST['sexo'], $_POST['dpi'], $_POST['password'], $_POST['tipo'], $_POST['correo'],$_POST['cantidadcursos']);

	function ModificarAlumno($id, $nombre, $edad, $direccion, $telefono, $sexo, $dpi, $password, $tipo, $correo,$cantidadcursos)
	{
		include '../conexion.php';
		require "../delete_accents.php";

		$nombre1 = eliminar_simbolos($nombre);
		$nombre1=strtoupper($nombre1);
		$sentencia="UPDATE alumnos SET idAlumno ='".$id."', Nombre ='".$nombre1."', Edad ='".$edad."', Direccion ='".$direccion."', Telefono ='".$telefono."', Sexo='".$sexo."', DPI ='".$dpi."', Password ='".$password."', TipoUsuario='".$tipo."', Correo ='".$correo."',CantidadCursos ='".$cantidadcursos."' WHERE idAlumno='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$mysqli->close();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='consultstudent.php';
</script>
