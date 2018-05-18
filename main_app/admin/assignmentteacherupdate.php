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
  $idTeacher = $_POST['idTeacher'];//recibo el  id del estudiante
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

  $query3 = "SELECT IdAlumno4 FROM asignacioncursos  WHERE IdCurso2 = $idCurso";
  $resultado3 = $mysqli->query($query3);
  while($fila3 = $resultado3->fetch_assoc())
  {
    $idAlumno = $fila3['IdAlumno4'];
    $query4 ="INSERT INTO asignatura VALUES (NULL, '$idCurso', '0', '0', '0', '0', '$idAlumno', '$idTeacher', '$idCarrera', '$idSemestre')";
    $mysqli->query($query4);
  }
  $mysqli->close();

  header('Location: index.php')
?>
