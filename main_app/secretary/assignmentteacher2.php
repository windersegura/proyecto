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
			$fila['CantidadCursos']
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
		<script src="../../js/bootstrap.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="js/index.js"></script>
  </head>
  <body>
		<?php require 'menu.php' ?><br>
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
				<th><center>Cantidad Cursos Asignados</center></th>
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
				<?php
				echo "<select name='cargar_hora' id='cargar_hora'  class='col-md-4 form-control'>";
					$query3 = "SELECT * FROM horarios";
					$resultado3 = $mysqli->query($query3);
					echo '<option value="">Elige El Horario</option>';
					while($row = $resultado3->fetch_array(MYSQLI_ASSOC))
					{
						if ($row['Periodo']=="Receso")
						{
							echo "<option value=''><bold> Receso</bold> </option>";
						}
						else
						{
							echo "<option value='$row[idHorario]'>$row[Hora] || $row[Jornada]</option>";
						}

					}

				echo "</select><br>";

				?>
				<br><br>
				<input type="submit" name="" value="ASIGNAR" class="btn btn-dark col-md-3">
				<a href="index.php" class="btn btn-primary col-md-3">REGRESAR</a>
	    </form>
		</div>
  </center><br><br>
	<?php include 'footer.php' ?>
  </body>
</html>
