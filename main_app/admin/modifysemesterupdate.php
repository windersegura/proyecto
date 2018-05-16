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
		$query2 = "SELECT NombreCarrera FROM carrera WHERE CodCarrera= $carrera";
		$resultado = $mysqli->query($query2);
		$fila=$resultado->fetch_assoc();
		$Carerita = $fila['NombreCarrera'];

		$sentencia="UPDATE semestre SET idSemestre ='".$id."', NoSemestre ='".$semestre."',  CodCarrera ='".$carrera."',  NombreCarrera ='".$Carerita."' WHERE idSemestre='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$mysqli->close();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='consultsemester.php';
</script>
