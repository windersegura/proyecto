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
            $fila['Duracion']
		];
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificación De Curso</title>
       
    </head>
 
	<body>
		<center>	
			<div id="main" width="70%">
				<form class="form-group" action="modifycareerupdate.php" method="POST" >

					<input type="hidden" name="id" value="<?php echo $consulta[0]?>">
					
					<label>Nombre Completo <span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[A-Za-z ñÑ]{1,45}" name="nombre" class="form-input form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $consulta[1]?>" required/><br> 

			        <label>Duracion <span><em>(requerido)</em></span></label><br> 
			        <input type="text" pattern="[0-9]{1,2}" name="duracion" class="form-input form-control" placeholder="Ingrese Los Creditos" value="<?php echo $consulta[2]?>" required/><br>


					
			
					<input class="btn__submit" type="submit" value="GUARDAR CAMBIOS">
			        
					<a href="consultcareer.php">Regresar</a>
				</form>
			</div>
		</center>
	 
	</body>
</html>