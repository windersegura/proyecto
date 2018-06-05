<?php 

date_default_timezone_set('UTC');

//define(banco,"00");
//define(institucion,"0001");
$banco="00";
$institucion="0001";
$fecha=date('dmy');
$hora= date('gis');
$trx="01";
$trama="";


$estado="0000";

$cod_referencia="0000";


$port='9999';
$addres='192.168.1.10';
$i=0;

while ($i<1) {
  # code...

 $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("No se pudo conectar ");
 $result= socket_connect($socket, $addres, $port) or die("No se pudo conectar");
  $msg="";
  $msg="". $banco . $trx . $fecha . $hora . $_REQUEST['Tarjeta'] . $_REQUEST['Seguridad'] . $institucion . $_REQUEST['Monto'] . $estado . $cod_referencia;

$trama=socket_write($socket, $msg, strlen($msg)) or die("No se pudo enviar el mensaje al servidor");

$result= socket_read($socket, 1024) or die("No hay respuesta del servidor");



socket_close($socket);


$i++;

}

?>