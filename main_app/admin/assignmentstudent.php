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
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<center>
			<label>No. Del DPI<span><em></em></span></label><br>
			<input type="search" id="input-search" name="search" placeholder="Ingrese El Numero Del DPI" value="">
			
		</center>

		<script src="../../js/search.js" ></script>
		<script src="../../js/jquery-3.2.1.min.js"></script>
	</body>
</html>
