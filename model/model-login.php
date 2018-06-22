<?php

function getuser($pass, $usuario) {
  include ("Config_BD.php");        
  $conexion=connectBD();

 $pass0 = md5($pass); // Decodificacion pasword entrada a formato almacenado en BD
  $sql =  "SELECT * FROM usuario WHERE User  = '$usuario' AND Password= '$pass0'";
          // echo $sql;
  // Generamos objeto sql
  $consulta = mysqli_query($conexion, $sql)
              or die ("Fallo en la consulta".mysqli_error($conexion));

  // ********************************
  //  Condicion carga sesion usuario
  // ********************************
  if ($consulta){ 
     //echo " <br>hola <br>"; 
      $error = "Registros leídos correctamente";                      
      $datos = array();
      $nfilas=mysqli_num_rows($consulta);
      //echo$nfilas;
      while($fila = mysqli_fetch_assoc($consulta)){  
         //echo " <br>hola";               
         $datos [] = $fila;
     }      
  }else{
      $error = "Error: " .$sql.  "<br>" . $mysqli->error;
      $datos = "La query no ha funcionado";
  }
  
  echo json_encode([ // codifica datos para enviar de vuelta con json
      "status"  => "success",
      "data"  => $datos,
      "error"     => $error,
      "resultado" => "Conexión con la base de datos correcta"
      ]);

  // Cierre base de datos.
  mysqli_close($conexion);
} // FIN funcion