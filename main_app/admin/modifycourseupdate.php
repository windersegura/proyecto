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

	ModificarAlumno($_POST['id'], $_POST['nombre'], $_POST['creditos'], $_POST['semestre'], $_POST['carrera']);

	function ModificarAlumno($id, $nombre, $creditos, $semestre,$carrera)
	{
		include '../conexion.php';
		require "../delete_accents.php";

		$nombre1 = eliminar_simbolos($nombre);
		$nombre1=strtoupper($nombre1);
		$sentencia="UPDATE curso SET idCurso ='".$id."', Nombre ='".$nombre1."',  Creditos ='".$creditos."', Semestre ='".$semestre."',  idCarrera ='".$carrera."' WHERE idCurso='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$mysqli->close();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='consultcourse.php';
</script>
