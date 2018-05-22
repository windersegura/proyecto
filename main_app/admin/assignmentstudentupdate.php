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


$query4 ="INSERT INTO asignacioncursos VALUES (NULL, '$idAlumno', '$idCurso', '0', '$idSemestre', '$idCarrera',0)";
$mysqli->query($query4);

$query5 = "SELECT * FROM alumnos WHERE idProfesor=$idAlumno";
$resultado5 = $mysqli->query($query5);
while($fila5=$resultado5->fetch_assoc())
{
  include '../conexion.php';
  $idalumno = mysqli_real_escape_string($mysqli,$fila5['idAlumno']);
  $nombre = mysqli_real_escape_string($mysqli,$fila5['Nombre']);
  $edad = mysqli_real_escape_string($mysqli,$fila5['Edad']);
  $direccion = mysqli_real_escape_string($mysqli,$fila5['Direccion']);
  $telefono = mysqli_real_escape_string($mysqli,$fila5['Telefono']);
  $sexo = mysqli_real_escape_string($mysqli,$fila5['Sexo']);
  $dpi = mysqli_real_escape_string($mysqli,$fila5['DPI']);
  $password = mysqli_real_escape_string($mysqli,$fila5['Password']);
  $correo = mysqli_real_escape_string($mysqli,$fila5['Correo']);
  $tipo = mysqli_real_escape_string($mysqli,$fila5['TipoUsuario']);
  $cantidadcursos = mysqli_real_escape_string($mysqli,$fila5['CantidadCursos']);

  if ($cantidadcursos==0)
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
  else if ($cantidadcursos==4)
  {
    $cantidadcursos=5;
  }
  else if ($cantidadcursos==5)
  {
    $cantidadcursos=6;
  }

  $query6="UPDATE alumnos SET idAlumno ='".$idalumno."', Nombre ='".$nombre."', Edad ='".$edad."', Direccion ='".$direccion."', Telefono ='".$telefono."', Sexo='".$sexo."', DPI ='".$dpi."', Password ='".$password."', TipoUsuario='".$tipo."', Correo ='".$correo."',CantidadCursos ='".$cantidadcursos."' WHERE idAlumno='".$idalumno."' ";
  $mysqli->query($query6) or die ("Error al actualizar datos".mysqli_error($mysqli));
}

$mysqli->close();

header('Location: index.php')
?>
