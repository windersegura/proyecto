<?php
	session_start();
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
<head>
	<meta charset="UTF-8">
	<title>Consulta De Alumnos</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>
		<?php include 'menu.php' ?><br>
		<center><br><h1>LISTADO DE TUS ALUMNOS</h1><br><br>
		<table class="table">
			<th><center>Nombre</center></th>
			<th><center>Telefono</center></th>
			<th><center>Corre</center></th>
      <th><a href="#"><button type="button" name="imprimir" class="btn btn-dark">IMPRIMIR TODO</Button></a></th>
        <?php
			    include '../conexion.php';

          $query = "SELECT
							b.Nombre AS NOMBRE,
							b.Telefono AS TELEFONO,
							b.Correo AS CORREO

							FROM
						asignatura a, alumnos b

							WHERE
							a.idAlumno = b.idAlumno AND
							a.idProfesor = $idProfesor

							GROUP BY b.Nombre";
              $resultado = $mysqli->query($query) or die (mysql_error($mysqli));
              while($fila=$resultado->fetch_assoc())
    					{


                echo "<tr>";
      						echo "<td><center>"; echo $fila['NOMBRE']; echo "</center></td>";
                  echo "<td><center>"; echo $fila['TELEFONO']; echo "</center></td>";
                  echo "<td><center>"; echo $fila['CORREO']; echo "</center></td>";
                echo "</tr>";
              }
        ?>

        </tr>
			</table><br><br>
        <?php
         echo "<a href='index.php?><button type='button' name='eliminar' class='btn btn-danger col-md-3'>VOLVER</Button></a>"
        ?>
      </center><br><br>
			<?php include 'footer.php' ?>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
