<?php
	session_start();
	//si la variable de session existe de lo contrario no se hace nada
	if(isset($_SESSION['usuario']))
	{
		if ($_SESSION['usuario']['TipoUsuario'] != 'Maestro')
		{
			header('Location: ../salir.php');
		}
	}
	else
	{
		header('Location: ../../');
	}
	$idProfesor = $_SESSION['usuario']['idProfesor'];
?>
<?php

	ModificarAlumno($_POST['id'], $_POST['idcurso'], $_POST['parcial1'], $_POST['parcial2'], $_POST['tareas'], $_POST['parcialfinal'], $_POST['idalumno'], $_POST['idprofesor'], $_POST['idcarrera'], $_POST['idsemestre']);

	function ModificarAlumno($id, $idcurso, $parcial1, $parcial2, $tareas,$parcialfinal,$idalumno,$idProfesor,$idCarrera,$idSemestre)
	{
		include '../conexion.php';
		require "../delete_accents.php";

		$sentencia="UPDATE asignatura SET  idAsignatura=$id, idCurso =$idcurso,  PrimerPar =$parcial1, SegundoPar =$parcial2,  Tareas =$tareas,  ParcialFinal =$parcialfinal,  idAlumno =$idalumno,  idProfesor =$idProfesor,  idCarrera =$idCarrera,  idSemestre =$idSemestre WHERE idAsignatura=$id ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$mysqli->close();
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='consultstudentteacher.php';
</script>
