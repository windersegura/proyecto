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
$idAlumno = $_POST['idStudent'];//recibo el  id del estudiante
$carrera = $_POST['cargar_carrera'];//recibo el id carrera
$semestre = $_POST['cargar_semestre'];//no recibo id solo recibo el numero del semestre
$idCurso = $_POST['cargar_curso'];//recibo id del curso

$query ="SELECT idCarrera FROM carrera WHERE idCarrera =$carrera";
$resultado = $mysqli->query($query);
$fila = $resultado->fetch_assoc();
$idCarrera = $fila['idCarrera'];

$query2 ="SELECT idSemestre FROM semestre WHERE NoSemestre = $semestre AND idCarrera=$idCarrera";
$resultado2 = $mysqli->query($query2);
$fila2 = $resultado2->fetch_assoc();
$idSemestre = $fila2['idSemestre'];


$query4 ="INSERT INTO asignacioncursos VALUES (NULL, '$idAlumno', '$idCurso', '0', '$idSemestre', '$idCarrera')";
$mysqli->query($query4);
$mysqli->close();

header('Location: index.php')
?>
