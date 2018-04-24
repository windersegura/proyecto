<?php  
	$mysqli = new mysqli('localhost','root','','universidad');
	if ($mysqli->connect_errno) 
	{
		echo "Error Al Conectarse Con MYSQL Debido Al Error: ".$mysqli->connect_error;
	}
?>