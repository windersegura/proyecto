<?php 

define(banco,"00");
define(institucion,"0001");
$trx= $_POST['codigo'];
$fecha=strftime("%d%m%y");
$hora= strftime("%H:%S");
$num_tarjeta=$_POST['Tarjeta'];
$codigo_seg=$_POST['Seguridad'];
$estado="0000";
$monto= $_POST['Monto'];
$cod_referencia="0000";


$port=9999;
$addres='192.168.1.10';


 $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);


if ($socket === false) {
    echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK.\n";
}

echo "Intentando conectar a '$address' en el puerto '$service_port'...";
$result = socket_connect($socket, $addres, $port);
if ($result === false) {
    echo "socket_connect() falló.\nRazón: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "OK.\n";
}


 
 




do{
    if (($msgsock = socket_accept($socket)) === false) {
        echo "socket_accept() falló: razón: " . socket_strerror(socket_last_error($socket)) . "\n";
        break;
    }

    $msg=banco . $trx . $fecha . $hora . $num_tarjeta . institucion . $monto . $estado . $cod_referencia;
     socket_write($msgsock, $msg, strlen($msg));

    do{
        if ( $out = socket_read($msgsock, 2048, PHP_NORMAL_READ) === false ) {
            echo "socket_read() falló: razón: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }

        echo "$out\n";

    }while(true);

    socket_close($msgsock);

}while(true);
echo "OK.\n";

echo "Cerrando socket...";
socket_close($socket);
echo "OK.\n\n";



?>