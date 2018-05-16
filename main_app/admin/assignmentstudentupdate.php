<?php
  require "../conexion.php";
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
$id = $_POST['idStudent'];
$carrera = $_POST['cargar_carrera'];
$semestre = $_POST['cargar_semestre'];
$curso = $_POST['cargar_curso'];

$query ="SELECT idCarrera FROM carrera WHERE CodCarrera =$carrera";
$resultado = $mysqli->query($query);
$fila = $resultado->fetch_assoc();
$idCarrera = $fila['idCarrera'];


?>
