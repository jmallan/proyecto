<?php
// *******************************************************************
//                               Fichero Queries
//  ******************************************************************


// ***************************************************
//                       Listados
// ***************************************************
    //  $Listado   : Nombre listado solicitado
    //  $Inicio    : fila inicial a listar
    //  Num_items  : Por defecto se daran 10 lineas
    //  Return de JSON(succes, data)
    
    //include("Config_BD.php");
    //include("cfg.php");
    //initCfg();

    function getlist($seccio, $inici) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");

    	// Opcion acceso por switch ****************************
        switch ($seccio) {
            case 'List_pv':
    			    $sql =  "SELECT * 
        				FROM proveedor
                        LIMIT $inici, 10";
    			break;
    		
    	    case 'List_cl':
    			    $sql =  "SELECT * 
        				FROM cliente
                        LIMIT $inici, 10";
    			break;
    	}

        // Generamos objeto sql
        $consulta = mysqli_query($conexion, $sql)
            or die ("Fallo en la consulta".mysqli_error($conexion));

        if ($consulta){
            $error = "Registros leidos correctamente";                      
            $datos = array();
            while($fila = mysqli_fetch_assoc($consulta)){                 
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
               "resultado" => "Conexion con la base de datos correcta"
            ]);

        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion



// ***************************************************
//             Menus opciones por usuario (NAVBAR)
// ***************************************************    
    function getnavbar($User) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");       

        $sql =  "SELECT Id_usuario, User, seccion FROM navbar 
                    INNER JOIN roles
                    ON Id_navbar = Fid_navbar
                    INNER JOIN usuario
                    on Id_usuario = Fid_usuario
                    WHERE User = '$User';";

        // Generamos objeto sql        
        $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

        // Hallamos la longitud del objeto obtenido
        if ($consulta){
            $error = "Datos leidos correctamente";                      
            $datos = array();
            while($fila = mysqli_fetch_assoc($consulta)){                 
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
               "resultado" => "Conexion con la base de datos correcta"
            ]);
            
        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion



// ***************************************************
//                  Control usuario
// ***************************************************
    //  Return de JSON(succes, data)
    function getuser($pass, $usuario) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");        
        //$conexion=connectBD();

        $pass0 = md5($pass); // Decodificacion pasword entrada a formato almacenado en BD
       
        // SQL a mostrar
        $sql =  "SELECT * FROM usuario WHERE User = '$usuario' AND Password = '$pass0' ";
        //echo $sql;

        // Generamos objeto sql
        $consulta = mysqli_query($conexion, $sql)
                    or die ("Fallo en la consulta".mysqli_error($conexion));

        // ********************************
        //  Condicion carga sesion usuario
        // ********************************
        if ($consulta){          
           
            $error = "Registros leidos correctamente";                      
            $datos = array();
            $nfilas=mysqli_num_rows($consulta);
            //echo $nfilas;

            while($fila = mysqli_fetch_assoc($consulta)){                              
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
            "resultado" => "Conexion con la base de datos correcta"
            ]);

        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion



// ***************************************************
//            MODIFICACIÓN DE REGISTROS
// ***************************************************    
    function update_reg($tabla, $form_data, $field_id, $id) { //$form_data es un array associativo
        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");   
        
        // Generamos objeto sql

        $sql = "UPDATE ".$tabla." SET ";

            //$data = array();
            $data="";

            foreach ($form_data as $key => $value) {

                $data.= $key."='".$value."', "; 
                //  $data[] = $key."="."'".$value."'";

            }
                   
        //$sql .= implode(',',$data);
        $sql .= substr("".$data."", 0,-2);
        $sql .=" WHERE ".$field_id." = ".$id."; ";
        echo $sql;
        
        
        $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

        if ($consulta){
            $error = "Registro MODIFICADO correctamente";                      
            $datos = array();
                                
        }else{
            $error = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
        echo json_encode([ // codifica datos para enviar de vuelta con json
                "status"  => "success",
                "data"  => $datos,
                "error"     => $error,
                "resultado" => "Conexion con la base de datos correcta"
            ]);
          
      // Cierre base de datos.
      mysqli_close($conexion);
  } // FIN funcion


  
// ***************************************************
//            ELIMINAR REGISTROS
// ***************************************************
    //  Return de JSON(menu)
    function delete_reg($tabla, $campo_id, $value_id) {
      
      // Conexion servidor y conexion base de datos
      include ("Config_BD.php");        
      //$conexion=connectBD();

      // Generamos objeto sql
      $sql = "DELETE FROM $tabla WHERE $campo_id='$value_id'";
           
      $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

      // Hallamos la longitud del objeto obtenido
      if ($consulta){
        $error = "El registro esta ELIMINADO correctamente";                      
        $datos = array();
                             
      }else{
        $error = "Error: " .$sql.  "<br>" . $mysqli->error;
        $datos = "La query no ha funcionado";
      }
      
      echo json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "success",  
            "data"  => $datos,           
            "error"     => $error,
            "resultado" => "Conexion con la base de datos correcta"
          ]);
          
      // Cierre base de datos.
      mysqli_close($conexion);
  } // FIN funcion



 
// ***************************************************
//            NUEVO REGISTRO
// ***************************************************
function crear_reg($tabla, $form_data) { 
    // Conexion servidor y conexion base de datos
    include ("Config_BD.php");

    // Generamos objeto sql           
        $fields="";
        $values="";
        foreach ($form_data as $field => $value) {

            $fields.=$field.",";
            $values.="'$value', ";
                
        }    
            $fields=substr($fields, 0,-1);
            $values=substr($values, 0,-2);
                

        $sql = "INSERT INTO ".$tabla." ($fields) VALUES ($values)";

        //echo $sql;  
        
    $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

    if ($consulta){
        $error = "Registro CREADO correctamente";                      
        $datos = array();
                            
    }else{
        $error = "Error: " .$sql.  "<br>" . $mysqli->error;
        $datos = "La query no ha funcionado";
    }
    
    echo json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "success",
            "data"  => $datos,
            "error"     => $error,
            "resultado" => "Conexion con la base de datos correcta"
        ]);
      
  // Cierre base de datos.
  mysqli_close($conexion);
} // FIN funcion

  


?>