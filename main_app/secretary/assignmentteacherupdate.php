<?php
	session_start();
	if(isset($_SESSION['usuario']))
	{

		if($_SESSION['usuario']['TipoUsuario'] == "Admin")
		{
			header("Location: ../admin/");
		}
		else if ($_SESSION['usuario']['TipoUsuario'] != "Secretario")
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
  $idHora = $_POST['cargar_hora'];//recibo el id de la hora
  include '../conexion.php';


  //VALIDACION QUE SI LOS CAMPOS ESTAN VACIOS SE REGRESE
  if ($idHora == "" || $idTeacher =="" || $carrera =="" || $semestre=="" || $idCurso=="")
  {
    echo '<script type="text/javascript">
        alert("¡Alguno De Los Campos Estam Vacios, Intente De Nuevo!");
        window.location.href="assignmentteacher.php";
        </script>';
        exit();
  }
  //VALIDACION SI EL CURSO YA HABIA SIDO SIGNADO ANTERIORMENTE
  $query0 = "SELECT idProfesor,idCurso FROM asignatura WHERE idCurso=$idCurso";
  $resultado0 = $mysqli->query($query0);
  while ($fila0 = $resultado0->fetch_assoc())
  {
    if ($fila0['idCurso']==$idCurso && $fila0['idProfesor']==$idTeacher)
    {
      echo '<script type="text/javascript">
          alert("¡El Curso Ya Fue Asignado, Seleccione Otro!");
          window.location.href="assignmentteacher.php";
          </script>';
          exit();
    }
  }

  //VALIDACION SI EL EL HORARIO YA HABIA SIDO ASIGNADO ANTERIORMENTE Y SI NO SE GUARDE EN LA TABLA DEL ALUMNO
  //PARA QUE EL ALUMNO LO PUEDA CONSULTAR
  $query_0 = "SELECT idProfesor,idHorario FROM asignatura WHERE idHorario=$idHora";
  $resultado_0 = $mysqli->query($query_0);
  while ($fila_0 = $resultado_0->fetch_assoc())
  {
    if ($fila_0['idHorario']==$idHora && $fila_0['idProfesor']==$idTeacher)
    {
      echo '<script type="text/javascript">
          alert("¡El Horario Ya Fue Asignado, Seleccione Otro!");
          window.location.href="assignmentteacher.php";
          </script>';
          exit();
    }

  }

  //SE GUARDA EN LA TABLA DEL ALUMNO EL HORARIO PARA QUE EL ALUMNO PUEDA CONSULTAR
  $query_01 = "SELECT IdCurso2,idHorario FROM asignacioncursos WHERE IdCurso2=$idCurso";
  $resultado_01 = $mysqli->query($query_01);
  while ($fila_01 = $resultado_01->fetch_assoc())
  {
    if ($fila_01['IdCurso2']==$idCurso && $fila_0['idHorario'] == 0)
    {
      $query_010 = "UPDATE asignacioncursos SET idHorario=$idHora WHERE asignacioncursos.IdCurso2=$idCurso";
      $resultado_010 = $mysqli->query($query_010);
    }
    else
    {
      echo '<script type="text/javascript">
          alert("¡El Horario Ya Fue Asignado, Seleccione Otro!");
          window.location.href="assignmentteacher.php";
          </script>';
          exit();
    }

  }


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
    $query4 ="INSERT INTO asignatura VALUES (NULL, '$idCurso', '0', '0', '0', '0', '$idAlumno', '$idTeacher', '$idCarrera', '$idSemestre','$idHora')";
    $mysqli->query($query4);
  }

  //SE VA ALMACENANDO LA CANTIDAD DE CURSOS QUE SE LE ASIGNARION AL PROFESOR
  $query5 = "SELECT * FROM profesor WHERE idProfesor=$idTeacher";
  $resultado5 = $mysqli->query($query5);
  while($fila5=$resultado5->fetch_assoc())
  {
    include '../conexion.php';
    $idProfesor = $fila5['idProfesor'];
    $nombre = $fila5['Nombre'];
    $direccion = mysqli_real_escape_string($mysqli,$fila5['Direccion']);
    $telefono = mysqli_real_escape_string($mysqli,$fila5['Telefono']);
    $password = mysqli_real_escape_string($mysqli,$fila5['Password']);
    $dpi = mysqli_real_escape_string($mysqli,$fila5['DPI']);
    $correo = mysqli_real_escape_string($mysqli,$fila5['Correo']);
    $tipo = $fila5['TipoUsuario'];
    $cantidadcursos = $fila5['CantidadCursos'];

    if ($cantidadcursos==NULL)
    {
      $cantidadcursos=0;
    }
    else if ($cantidadcursos==0)
    {
      $cantidadcursos=1;
    }
    else if ($cantidadcursos==1)
    {
      $cantidadcursos=2;
    }
    else if ($cantidadcursos==2)
    {
      $cantidadcursos=3;
    }
    else if ($cantidadcursos==3)
    {
      $cantidadcursos=4;
    }

    $query6="UPDATE profesor SET idProfesor ='".$idProfesor."', Nombre ='".$nombre."',  Direccion ='".$direccion."', Telefono ='".$telefono."', Password ='".$password."', DPI ='".$dpi."', Correo ='".$correo."',  TipoUsuario='".$tipo."', CantidadCursos='".$cantidadcursos."' WHERE idProfesor='".$idProfesor."' ";
    $mysqli->query($query6) or die ("Error al actualizar datos".mysqli_error($mysqli));
}
  $mysqli->close();

  header('Location: index.php')
?>
