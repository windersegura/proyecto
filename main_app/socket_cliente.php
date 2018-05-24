<?php 

define(banco,'00');
define(institucion,'0001');
$trx;
$fecha=strftime("%d-%m-%y");
$hora= strftime("%H:%S");
$num_tarjeta;
$estado;
$cod_referencia;
$port='9999';
$addres='192.168.1.10';


 $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

 if ($socket === false) {
    echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK.\n";
}

echo "Intentando conectar a '$address' en el puerto '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() falló.\nRazón: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "OK.\n";
}

while(1){

    cod_refernecia+=1;
echo "Enviando petición de datos ...";
socket_write($socket, banco, strlen(banco));
socket_write($socket, institucion, strlen(institucion));
socket_write($socket, $txr, strlen($txr));
socket_write($socket, $fecha, strlen($fecha));
socket_write($socket, $hora, strlen($hora));
socket_write($socket, $num_tarjeta, strlen($num_tarjeta));
socket_write($socket, $cod_referencia, strlen($cod_referencia));

echo "OK.\n";

}

echo "Cerrando socket...";
socket_close($socket);
echo "OK.\n\n";


/*while(1){    
    // La comparacion para verificar si el socket se creo correctamente
    // debe ser con triple =
    if($socket === FALSE){
        echo 'Creacion del socket fallida.';
    }else{
        // nos conectamos al socket servidor
        $resultado = socket_connect($socket, '127.0.0.1', '7001');
        if($resultado === FALSE){
            echo 'Conexion al socket fallida.'; 
        }else{
            // ahora escribimos en el socket para que el servidor
            // lea lo que nosotros le enviamos
            socket_write($socket, $ticker, strlen($ticker));
            // leemos el resultado que el socket nos envio
            $precio = socket_read($socket, 1024);
            // imprimimos el resultado que leimos
            echo " $precio";
        }
    }
}
*/
?>