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

		$q = $_GET['q'];

    	$mysqli = new mysqli('localhost','root','','universidad');
  	if ($mysqli->connect_errno)
  	{
  		mysqli_set_charset($mysqli,"utf8");
  		echo "Error Al Conectarse Con MYSQL Debido Al Error: ".$mysqli->connect_error;
  	}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buscador Maestro Para La Asignacion</title>
    <link rel="stylesheet" href="../../css/main.css"/>
		<link rel="stylesheet" href="../../css/bootstrap.css"/>
		<script src="../../js/jquery-3.2.1.min.js"></script>
		<script src="../../js/bootstrap.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function active()
      {
        var buscar =document.getElementById('buscar');

        if (buscar.value == 'Buscar...')
        {
          buscar.value=''
          buscar.placeholder='Buscar...'
        }
      }
      function inactive()
      {
        var buscar =document.getElementById('buscar');

        if (buscar.value == '')
        {
          buscar.value='Buscar...'
          buscar.placeholder=''
        }
      }
    </script>
    <style media="screen">
      body
      {
        font-family: sans-serif;
      }
      h3
      {
        margin: 20px 0px 0px 0px;
        padding: 0px;
      }
      p
      {
        margin: 0px;
        padding: 0px;
      }
    </style>
  </head>
  <body>
		<?php require 'menu.php' ?>
    <center><br><br>
			<div style="width 20px">
	      <form class="" action="assignmentteacher.php" method="GET">
	        <input type="text" id="buscar" name="q" value="Buscar..." maxlength="25" autocomplete="off" onmousedown="active();" onblur="inactive();" />
					<input type="submit" id="buscarbtn" name="" value="Buscar"/>
	      </form>
			</div>
      <?php
        if(!isset($q))
        {
          echo "";
        }
        else
        {
          $busqueda = "SELECT * FROM profesor WHERE Nombre LIKE '%$q%' OR DPI LIKE '%$q%'";
          $busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
          while($fila=$busqueda->fetch_assoc())
          {
            $idProfesor = mysqli_real_escape_string($mysqli,$fila['idProfesor']);
            $nombre = mysqli_real_escape_string($mysqli,$fila['Nombre']);

            $dpi = mysqli_real_escape_string($mysqli,$fila['DPI']);
            $correo = mysqli_real_escape_string($mysqli,$fila['Correo']);
						$cantidadcursos = mysqli_real_escape_string($mysqli,$fila['CantidadCursos']);
						if ($cantidadcursos != 4)
						{
							echo '<h3>'.'<a href="assignmentteacher2.php?numero='.$idProfesor.'">'.$nombre.'</h3></a><p>  '.$dpi.' '.$correo.'</p><br>';
							if ($cantidadcursos==3)
							{
								echo "<spam style=' color: red'>$nombre Se Encuentra Cerca Del Limite De Cursos Permitidos</spam>";
							}
						}
						else
						{
							echo '<h3>'.$nombre.'</h3>';
								echo '<p>No Se Pueden Asignar Mas Curso Porque El Profesor Alcanzo La Maxima Cantidad De Cursos</p>';
						}

          }
        }
      ?>
    </center><br><br>
		<?php include 'footer.php' ?>
  </body>
</html>
