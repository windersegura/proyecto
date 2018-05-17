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
        $sentencia="SELECT * FROM curso WHERE idCurso='".$no_prod."' ";
        $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli));
        $fila=$resultado->fetch_assoc();

        return
		[   $fila['idCurso'],
			$fila['Nombre'],
            $fila['Creditos'],
			$fila['Semestre'],
			$fila['idCarrera']
		];
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificación De Curso</title>
				<link rel="stylesheet" href="../../css/bootstrap.css">
				<script src="../../js/jquery-3.3.1.min.js"></script>
    </head>

	<body>
		<center>
			<h1>Modifique Los Datos Del Curso</h1>
			<div id="main" width="70%">
				<form class="form-group" action="modifycourseupdate.php" method="POST" >

					<input type="hidden" name="id" value="<?php echo $consulta[0]?>">

					<div class="col-md-4">
						<label>Nombre Completo <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z ñÑ]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $consulta[1]?>" required/>
					</div>

					<div class="col-md-2">
						<label>Creditos <span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[A-Za-z-_0-9,. ]{1,240}" name="creditos" class="form-input form-control" placeholder="Ingrese Los Creditos" value="<?php echo $consulta[2]?>" required/>
					</div>

					<div class="col-md-2">
						<label>Semestre<span><em>(requerido)</em></span></label><br>
		        <input type="text" pattern="[0-9]{1,2}" name="semestre" class="form-input form-control" placeholder="Ingrese Numero Del Semestre" value="<?php echo $consulta[3]?>" required/>
					</div>


					<div class="form-group">
						<label for="carrera" class="control-label">Seleccionar Carrera</label>
						<div class="col-md-3">
							<select class="form-control" id="carrera" name="carrera">

								<?php
								require '../conexion.php';

								$query = "SELECT idCarrera,NombreCarrera FROM carrera";
								$resultado = $mysqli->query($query);

									WHILE($row = $resultado->fetch_assoc())
								{?>
									<option value="<?php if($row['idCarrera'] != 1){echo $row['idCarrera'];} ?>"><?php if($row['NombreCarrera'] != 1){echo $row['NombreCarrera'];} ?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>

					<input class="btn__submit btn btn-dark col-md-3" type="submit" value="GUARDAR CAMBIOS">

					<a href="index.php" class="btn btn-success col-md-3">REGRESAR</a>
				</form>
			</div>
		</center>

	</body>
</html>
