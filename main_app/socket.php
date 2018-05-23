<?php

set_time_limit(0);

$contenido = array($banco, $trx, $fecha, $hora, $numTarjeta, $institucion, $monto, $estado, $codRef);

$ip= '192.168.1.10';

$puerto= '9999';

$socket= socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_bind($socket, $ip, $puerto) or die ('No se puede vincular el puerto con la direccion ip');

echo socket_strerror(socket_last_error());

socket_listen($socket);


?>