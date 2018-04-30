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
	require '../conexion.php';

	$query = "SELECT NombreCarrera FROM carrera";
	$resultado = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Semestre</title>
	
</head>
	<body>
		<center>	
			<div id="main" width="70%">
				<form class="form-group" action="updatesemester.php" method="POST" >
					
					<label>No. Del Semestre<span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[0-9]{1,2}" name="semestre" class="form-input form-control" placeholder="Ingrese No. Del Semestre" required/><br> 

			        <div class="form-group">
						<label for="carrera" class="col-sm-2 control-label">Seleccionar Carrera</label>
						<div class="col-sm-10">
							<select class="form-control" id="carrera" name="carrera">
								
								<?php 
									WHILE($row = $resultado->fetch_assoc()) 
								{?>
									<option value="<?php if($row['NombreCarrera'] != 1){echo $row['NombreCarrera'];} ?>"><?php if($row['NombreCarrera'] != 1){echo $row['NombreCarrera'];} ?></option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

			        
					<input class="btn__submit" type="submit" value="REGISTRAR">
			        
					<a href="index.php">Regresar</a>
				</form>
			</div>
		</center>
	</body>
</html>