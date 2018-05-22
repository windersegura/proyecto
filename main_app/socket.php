<?php
/*
*http://www.php.net/manual/en/ref.sockets.php
*/

$host = "127.0.0.1";

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$puerto = 65500;

if (socket_connect($socket, $host, $puerto))
{
echo "\nConexion Exitosa, puerto: " . $puerto;
}
else
{
echo "\nLa conexion TCP no se pudo realizar, puerto: ".$puerto;
}
socket_close($socket);
?>