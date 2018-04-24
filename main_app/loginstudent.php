<?php  
	require "conexion.php";

	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
	{
		require "conexion.php";

		//podremos usar sesiones para los usuarios
		session_start();

		//tipo de caracteres que tiene que escapar
		$mysqli->set_charset('utf8');

		//ESCAPA CUALQUIER INYECCION SQL	
		$usuario = $mysqli->real_escape_string($_POST['usuariolgstudent']);
		$pas =  $mysqli->real_escape_string($_POST['passlgstudent']);

		if($nueva_consulta = $mysqli->prepare("SELECT Nombre, TipoUsuario FROM alumnos WHERE Correo=? AND Password=?"))
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
				$_SESSION['usuario'] = $datos;//almacenara el arreglo de los datos que le especifiquemos de nuestra consulta
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