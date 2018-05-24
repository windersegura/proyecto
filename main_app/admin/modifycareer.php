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
        $sentencia="SELECT * FROM carrera WHERE idCarrera='".$no_prod."' ";
        $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
        $fila=$resultado->fetch_assoc();

        return
		[   $fila['idCarrera'],
			$fila['NombreCarrera'],
            $fila['Duracion'],
            $fila['CodCarrera'],
		];
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificación De Curso</title>
				<meta name="viewport" content="width=device-width, user-scalable=no">
				<link rel="stylesheet" href="../../css/bootstrap.css">
				<script src="../../js/jquery-3.3.1.min.js"></script>
				<script src="../../js/bootstrap.min.js"></script>
    </head>

	<body>
		<?php require 'menu.php' ?>
		<center>
			<h1>Modificación Del Curso</h1>
			<div id="main" width="70%">
				<form class="form-group" action="modifycareerupdate.php" method="POST" >

					<input type="hidden" name="id" value="<?php echo $consulta[0]?>">

					<div class="col-md-4">
						<label>Nombre Completo <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z ñÑ]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $consulta[1]?>" required/>
					</div>

					<div class="col-md-3">
						<label>Duracion <span><em>(requerido)</em></span></label><br>
						<input type="text" pattern="[0-9]{1,2}" name="duracion" class="form-input form-control" placeholder="Ingrese Los Creditos" value="<?php echo $consulta[2]?>" required/>
					</div>

					<div class="col-md-3">
						<label>Codigo Unico De La Carrera<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,5}" name="codigocarrera" class="form-input form-control" placeholder="Ingrese El Codigo Que Identifique La Carrera" value="<?php echo $consulta[3]?>" required/>
					</div>

					<br>
					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="GUARDAR CAMBIOS">

					<a href="consultcareer.php" class="btn btn-success col-md-3">REGRESAR</a>
				</form>
			</div>
		</center>

	</body>
</html>
