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
    <title>Buscador Alumno Para La Asignacion</title>
    <link rel="stylesheet" href="../../css/main.css"/>
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
    <center><br><br>
			<div style="width 20px">
	      <form class="" action="assignmentstudent.php" method="GET">
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
          $busqueda = "SELECT * FROM alumnos WHERE Nombre LIKE '%$q%' OR DPI LIKE '%$q%'";
          $busqueda = $mysqli->query($busqueda) or die (mysql_error($mysqli));
          while($fila=$busqueda->fetch_assoc())
          {
            $idalumno = mysqli_real_escape_string($mysqli,$fila['idAlumno']);
            $nombre = mysqli_real_escape_string($mysqli,$fila['Nombre']);
            $edad = mysqli_real_escape_string($mysqli,$fila['Edad']);
            $dpi = mysqli_real_escape_string($mysqli,$fila['DPI']);
            $correo = mysqli_real_escape_string($mysqli,$fila['Correo']);
            echo '<h3>'.'<a href="assignmentstudent2.php?numero='.$idalumno.'">'.$nombre.'</h3></a><p> '.$edad.' '.$dpi.' '.$correo.'</p><br>';

          }
        }
      ?>
    </center>
		<a href="index.php">Regresar</a>
  </body>
</html>
