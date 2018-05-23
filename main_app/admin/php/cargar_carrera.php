<?php
	require_once 'conexion.php';

	function getHora()
	{
		$mysqli = getConn();
		$query = 'SELECT * FROM carrera';
		$result = $mysqli->query($query);
		$listas = '<option value="">Elige La Carrera</option>';
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$listas.="<option value='$row[idCarrera]'>$row[NombreCarrera]</option>";
		}

		return $listas;
	}
	echo getHora();
?>
