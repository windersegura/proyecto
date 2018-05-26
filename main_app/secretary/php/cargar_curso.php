<?php
require_once 'conexion.php';

	function getCurso()
	{
		$mysqli = getConn();
		$id = $_POST['id'];
		$id2 = $_POST['id2'];
		$query = "SELECT * FROM curso WHERE Semestre = $id AND idCarrera = $id2";
		$result = $mysqli->query($query);
		$curso = '<option value="">Elige El Curso</option>';
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$curso.="<option value='$row[idCurso]'>$row[Nombre]</option>";
		}

		return $curso;
	}
	echo getCurso();
?>
