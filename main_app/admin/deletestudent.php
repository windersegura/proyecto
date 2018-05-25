<?php
	session_start();
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
	$consulta3=borrar($_GET['numero']);
	function borrar($no)
	{
		include '../conexion.php';
		$delete ="DELETE FROM alumnos WHERE idAlumno ='".$no."'";
		$resultado2=$mysqli->query($delete) ;
	}
		//$mysqli->close();
?>
<script type="text/javascript">
		alert("¡Datos Eliminados Exitosamante!");
		window.location.href='consultstudent.php';
		</script>
