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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta De Tus Horarios De Clases</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
</head>
	<body>
		<?php include 'menu.php' ?><br>
		<center><br><h1>LISTADO DE TUS HORARIOS DE CLASES</h1><br><br>
		<table class="table">
			<th><center>Nombre Del Curso</center></th>
			<th><center>Semestre</center></th>
			<th><center>Carrera</center></th>
      <th><center>Horario</center></th>
      <th><center>Jornada</center></th>

			<th><a href="#"><button type="button" name="imprimir" class="btn btn-dark"></Button></a></th>
        <?php
			    include '../conexion.php';

          $query = "SELECT
            c.nombre AS CURSO,
            s.NoSemestre AS NUMERO,
            cr.NombreCarrera AS CARRERA,
            h.Hora AS HORA,
            h.Jornada AS JORNADA

            FROM
	           asignatura a, curso c, semestre s, carrera cr, horarios h

             WHERE
	            c.idCurso = a.idCurso AND
              s.idSemestre = a.idSemestre AND
              cr.idCarrera = a.idCarrera AND
              h.idHorario = a.idHorario AND

              a.idProfesor = $idProfesor

              GROUP BY a.idCurso, a.idHorario";
              $resultado = $mysqli->query($query) or die (mysql_error($mysqli));
              while($fila=$resultado->fetch_assoc())
    					{
                echo "<tr>";
    						echo "<td><center>"; echo $fila['CURSO']; echo "</center></td>";
                echo "<td><center>"; echo $fila['NUMERO']; echo "</center></td>";
                echo "<td><center>"; echo $fila['CARRERA']; echo "</center></td>";
                echo "<td><center>"; echo $fila['HORA']; echo "</center></td>";
                echo "<td><center>"; echo $fila['JORNADA']; echo "</center></td>";
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
