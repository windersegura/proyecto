<?php 




while(1){


 $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    
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

?>