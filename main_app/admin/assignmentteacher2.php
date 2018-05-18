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
    $sentencia="SELECT * FROM profesor WHERE idProfesor='".$no_prod."' ";
    $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
    $fila=$resultado->fetch_assoc();

    return
    [
      $fila['idProfesor'],
      $fila['Nombre'],
      $fila['Direccion'],
      $fila['Telefono'],
      $fila['Password'],
      $fila['DPI'],
      $fila['Correo'],
      $fila['TipoUsuario'],
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
			<h1>Seleccione: Carrera, Semestre y Curso</h1>
      <table class="table">
  			<th><center>Id.</center></th>
  			<th><center>Nombre</center></th>
  			<th><center>Direccion</center></th>
  			<th><center>Telefono</center></th>
  			<th><center>Password</center></th>
        <th><center>DPI</center></th>
        <th><center>Correo</center></th>
  			<th><center>Tipo De Usuario</center></th>
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
      echo "</tr>";
      ?>
    </table>
    <?php
      require '../conexion.php';
      $query2 = "SELECT NombreCarrera, idCarrera FROM carrera ORDER BY idCarrera ASC";
      $resultado2 = $mysqli->query($query2);
    ?>
		<div class="form-group">


			<form name="combo" action="assignmentteacherupdate.php" method="POST">
				<input type="hidden" name="idTeacher" value="<?php echo $consulta[0]?>">
				<select name="cargar_carrera" id="cargar_carrera" class="col-md-4 form-control"></select><br>
	      <select name="cargar_semestre" id="cargar_semestre"  class="col-md-4 form-control"></select><br>
	      <select name="cargar_curso" id="cargar_curso"  class="col-md-4 form-control"></select><br>
				<input type="submit" name="" value="ASIGNAR" class="btn btn-dark col-md-3">
				<a href="index.php" class="btn btn-success col-md-3">REGRESAR</a>
	    </form>
		</div>
  </center>

  </body>
</html>
