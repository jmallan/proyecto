<?php 

    // *******************************************
    //      Definiciones inciales para conexion
    // *******************************************

    // Definiciones iniciales en array $cfg
    $cfg['server']      = "localhost";
    $cfg['userBD']      = "root";
    $cfg['passwordBD']  = "";  
    $cfg['BD']          = "proyectofinal";

    // Carga valores en variables conexion BD
    $server     = $cfg['server'];
    $user       = $cfg['userBD'];
    $pw         = $cfg['passwordBD'];
    $basedatos  = $cfg['BD'];

    // *******************************************
    //             Conexion con el servidor
    // *******************************************
    $conexion = mysqli_connect ($server, $user, $pw, $basedatos) or die ("No se puede conectar con el servidor".mysqli_error($conexion));
?>