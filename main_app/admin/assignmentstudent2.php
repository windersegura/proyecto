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
    <title></title>
  </head>
  <body>
    <center>
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
  </center>
    <a href="index.php">Regresar</a>
  </body>
</html>
