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
	
	ModificarAlumno($_POST['id'], $_POST['semestre'], $_POST['carrera']);

	function ModificarAlumno($id, $semestre, $carrera)
	{
		include '../conexion.php';
		
		$sentencia="UPDATE semestre SET idSemestre ='".$id."', NoSemestre ='".$semestre."',  Carrera ='".$carrera."' WHERE idSemestre='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$mysqli->close();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='consultsemester.php';
</script>