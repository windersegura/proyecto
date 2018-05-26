<?php
	function getConn()
	  {
	  	$mysqli = new mysqli('localhost','root','','universidad');
		if ($mysqli->connect_errno) 
		{
			mysqli_set_charset($mysqli,"utf8");
			echo "Error Al Conectarse Con MYSQL Debido Al Error: ".$mysqli->connect_error;
		}

		return $mysqli; 
	  }  
	
?>