<?php  
	require "conexion.php";

	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	 {
		require "conexion.php";

		//tipo de caracteres que tiene que escapar
		$mysqli->set_charset('utf8');

		//ESCAPA CUALQUIER INYECCION SQL
		$usuario =  $mysqli->real_escape_string($_POST['usuariolgteacher']);
		$pas =  $mysqli->real_escape_string($_POST['passlgteacher']);

		if($nueva_consulta = $mysqli->prepare("SELECT Nombre, TipoUsuario FROM profesor WHERE Correo=? AND Password=?"))
		{
			//aceptara el tipo de datos en este caso son 2 string
			$nueva_consulta->bind_param('ss',$usuario,$pas);

			//ejecutamos nuestra consulta
			$nueva_consulta->execute();

			//obtenemos el resultado que nos devuelve
			$resultado = $nueva_consulta->get_result();

			//evaluamos si nuestra consulta devuelve resultados
			if ($resultado->num_rows == 1) 
			{
				$datos = $resultado->fetch_assoc();
				echo json_encode(array('error' => false, 'tipo' => $datos['TipoUsuario']));
			}
			else
			{
				echo json_encode(array('error' => true));
			}
			$nueva_consulta->close();
		}
	}
	$mysqli->close();
?>