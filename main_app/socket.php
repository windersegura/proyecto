<?php

set_time_limit(0);

$contenido = array($banco, $trx, $fecha, $hora, $numTarjeta, $institucion, $monto, $estado, $codRef);

$ip= '192.168.1.10';

$puerto= '9999';

$socket= socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_bind($socket, $ip, $puerto) or die ('No se puede vincular el puerto con la direccion ip');

echo socket_strerror(socket_last_error());

socket_listen($socket);


while(1){
    // aceptamos la conexion que nos entre
    $cliente[++$i] = socket_accept($socket);
    // leemos la informacion que nos envian
    $input = socket_read($cliente[$i], 1024);
    // quitamos espacios y saltos de linea de lo que se lee
    $ticker = ereg_replace("[ \t\r\n]", "", $input);
    // escribimos lo que recibimos
    echo "Ticker: $ticker";
    
    if(array_key_exists($ticker, $contenido)){
        // ahora si buscamos la informacion que leimos en el socket
        // dentro del array de contenido
        $datos = $contenido[$ticker];
    }else{
        // si no existe pues le decimos que lo que
        // busco no esta dentro del contenido
        $datos = "No se encontrontraron los datos";
    }
    // escribimos los resultados que encontramos dentro del
    // array en el socket para que el cliente los lea
    socket_write($cliente[$i], $datos . "\n\r", 1024);
    // cerramos la conexion de ese cliente
    socket_close($cliente[$i]);
}
// cerramos la conexion global
socket_close($socket);


?>