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
	
	ModificarAlumno($_POST['id'], $_POST['nombre'], $_POST['duracion']);

	function ModificarAlumno($id, $nombre, $duracion)
	{
		include '../conexion.php';
		require "../delete_accents.php";

		$nombre1 = eliminar_simbolos($nombre);
		$nombre1=strtoupper($nombre1);

		$sentencia="UPDATE carrera SET idCarrera ='".$id."', NombreCarrera ='".$nombre1."',  Duracion ='".$duracion."' WHERE idCarrera='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$mysqli->close();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='consultcareer.php';
</script>








