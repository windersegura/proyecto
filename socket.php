<?php
error_reporting(E_ALL);

/* Permitir al script esperar para conexiones. */
set_time_limit(0);

/* Activar el volcado de salida implícito, así veremos lo que estamos obteniendo
 * mientras llega. */
ob_implicit_flush();

$address = '192.168.1.10';
$port = '9999';
$socket= socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp')) or die("No se pudo crear el socket");

socket_bind($socket, $address, $port)or die ('No se puede vincular el puerto con la direccion ip');

echo socket_strerror(socket_last_error());

socket_listen($socket);
$i=0;

while(true){

    $client[++$i]= socket_accept($socket);
    $mensaje=socket_read($client[$i], 1024);
   //	$mensaje_respuesta;


   	$mensaje_respuesta='1';	

   	echo $mensaje. "\n";
   	 
   	//socket_write($socket,$mensaje_respuesta,strlen($mensaje_respuesta)) or die ("No se pudo enviar Respuesta

   	$mensaje='1';
    socket_write($client[$i], $mensaje . "\n\r", 1024);
  

   

    socket_close($client[$i]);

}



?>