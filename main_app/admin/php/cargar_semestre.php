<?php
require_once 'conexion.php';

	function getSemestre()
	{
		$mysqli = getConn();
		$id = $_POST['id'];
		$query = "SELECT * FROM semestre WHERE idCarrera = $id";
		$result = $mysqli->query($query);
		$semestres = '<option value="">Elige El Semestre</option>';
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$semestres.="<option value='$row[NoSemestre]'>$row[NoSemestre]</option>";
		}

		return $semestres;
	}
	echo getSemestre();
?>
