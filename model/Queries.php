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

    function getlist($lista, $inici) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");

    	// Opcion acceso por switch ****************************
        switch ($lista) {
            case 'proveedores': //proveedor y su contacto
                $sql =  "SELECT * FROM proveedor
                        INNER JOIN proveedor_contacto
                        ON Fid_proveedor=Id_proveedor
                        LIMIT $inici, 10";
    			break;
    		
    	    case 'clientes':    //cliente y su contacto
                $sql =  "SELECT * FROM cliente
                        INNER JOIN cliente_contacto
                        ON fid_cliente=Id_cc
                        LIMIT $inici, 10";
                break;

            case 'ventas':  //clieteventa cliente factura y crentelp
                $sql =  "SELECT * FROM cliente
                        INNER JOIN cliente_venta
                        ON Id_cliente=Fid_cliente
                        INNER JOIN cliente_lineaventa
                        ON Id_venta=Fid_venta
                        INNER JOIN cliente_factura
                        ON Id_lineapedido=Fid_lineaventa
                        LIMIT $inici, 10";
            break;

            case 'compras': //proveedor compra factura lp albaran
                $sql =  "SELECT * FROM proveedor
                        INNER JOIN proveedor_compra
                        ON Id_proveedor=Fid_proveedor
                        INNER JOIN usuario
                        ON Fid_usuario=Id_usuario
                        INNER JOIN proveedor_lineapedido
                        ON Fid_compra=Id_pedido
                        INNER JOIN proveedor_factura
                        ON Id_lineapedido=Fid_pedido
                        INNER JOIN proveedor_albaran
                        ON Id_factura=Fid_factura
                        LIMIT $inici, 10";
            break;

            case 'encuestas':           // 3 tablas de formularios
                $sql =  "SELECT * FROM formulario
                        INNER JOIN formulario_preguntas
                        ON Id_formulario=Fid_formulario
                        INNER JOIN formulario_respuestas
                        ON Id_preguntas=Fid_pregunta
                        LIMIT $inici, 10";
            break;
            
            default:        
                        echo"Lista solicitado no existe";
                        return;
    	}

        // Generamos objeto sql
        $consulta = mysqli_query($conexion, $sql)
            or die ("Fallo en la consulta".mysqli_error($conexion));

        if ($consulta){
            $status = "OK";                      
            $datos = array();
            while($fila = mysqli_fetch_assoc($consulta)){                 
                $datos [] = $fila;
            }                    
        }else{
            $status = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
        echo json_encode([ // codifica datos para enviar de vuelta con json
               "status"  => "$status",
               "data"  => $datos               
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

        $sql =  "SELECT Id_usuario, User, seccion FROM usuario_navbar 
                    INNER JOIN usuario_rol
                    ON Id_navbar = Fid_navbar
                    INNER JOIN usuario
                    on Id_usuario = Fid_usuario
                    WHERE User = $User;";

        // Generamos objeto sql        
        $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

        // Hallamos la longitud del objeto obtenido
        if ($consulta){
            $status = "OK";                      
            $datos = array();
            while($fila = mysqli_fetch_assoc($consulta)){                 
                $datos [] = $fila;
            }                    
        }else{
            $status = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
       
            
        // Cierre base de datos.
        mysqli_close($conexion);

        return json_encode([ // codifica datos para enviar de vuelta con json
               "status"  => "$status",
               "data"  => $datos
               
            ]);
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
           
            $status = "OK";                      
            $datos = array();
            $nfilas=mysqli_num_rows($consulta);
            //echo $nfilas;

            while($fila = mysqli_fetch_assoc($consulta)){                              
               $datos [] = $fila;
           }  

        }else{
            $status = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }

         mysqli_close($conexion);
        return json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "$status",
            "data"  => $datos
        ]);

        // Cierre base de datos.
       
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

            }                   
       
        $sql .= substr("".$data."", 0,-2);
        $sql .=" WHERE ".$field_id." = ".$id."; ";
        //echo $sql;
        
        
        $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

        if ($consulta){
            $status = "OK";                      
            $datos = array();
                                
        }else{
            $status = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
        echo json_encode([ // codifica datos para enviar de vuelta con json
                "status"  => "$status",
                "data"  => $datos
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
        $status = "OK";                      
        $datos = array();
                                
        }else{
            $status = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos = "La query no ha funcionado";
        }
        
        echo json_encode([ // codifica datos para enviar de vuelta con json
                "status"  => "$status",
                "data"  => $datos
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
        $status = "OK";                      
        $datos = array();
                            
    }else{
        $status = "Error: " .$sql.  "<br>" . $mysqli->error;
        $datos = "La query no ha funcionado";
    }
    
    echo json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "$status",
            "data"  => $datos
        ]);
      
  // Cierre base de datos.
  mysqli_close($conexion);
} // FIN funcion

  


?>