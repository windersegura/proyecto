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
$consulta=consultaprod($_GET['numero']);
function consultaprod( $no_prod )
{
  include '../conexion.php';
      $sentencia="SELECT * FROM alumnos WHERE idAlumno='".$no_prod."' ";
      $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
      $fila=$resultado->fetch_assoc();

      return
  [   $fila['idAlumno'],
    $fila['Nombre'],
          $fila['Edad'],
          $fila['Direccion'],
    $fila['Telefono'],
    $fila['Sexo'],
    $fila['DPI'],
          $fila['Password'],
    $fila['TipoUsuario'],
    $fila['Correo'],
  ];
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Asignacion De Estudiante</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
		<script src="../../js/jquery-3.3.1.min.js"></script>
		<script src="js/index.js"></script>
  </head>
  <body>
    <center>
			<br><br>
			<h1>Seleccione: Carrera, Semestre y Curso</h1>
			<br>
      <table class="table">
  			<th>Id.</th>
  			<th>Nombre</th>
  			<th>Edad</th>
  			<th>Direccion</th>
  			<th>Telefono</th>
  			<th>Sexo</th>
  			<th>DPI</th>
  			<th>Password</th>
  			<th>Tipo De Usuario</th>
  			<th>Correo</th>
      <?php
      echo "<tr>";
        echo "<td><center>"; echo $consulta[0]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[1]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[2]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[3]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[4]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[5]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[6]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[7]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[8]; echo "</center></td>";
        echo "<td><center>"; echo $consulta[9]; echo "</center></td>";
      echo "</tr>";
      ?>
    </table>
    <?php
      require '../conexion.php';
      $query2 = "SELECT NombreCarrera, idCarrera FROM carrera ORDER BY idCarrera ASC";
      $resultado2 = $mysqli->query($query2);
    ?>
		<form name="combo" action="assignmentstudentupdate.php" method="POST">
				<input type="hidden" name="idStudent" value="<?php echo $consulta[0]?>">
        <select name="cargar_carrera" id="cargar_carrera"></select>
        <select name="cargar_semestre" id="cargar_semestre"></select>
        <select name="cargar_curso" id="cargar_curso"></select>
				<input type="submit" name="" value="Guardar" class="btn btn-danger">
      </form>
  </center>
    <a href="index.php">Regresar</a>
  </body>
</html>