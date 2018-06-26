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


// ***************************************************
//                      LISTA DE UNA SOLA TABLE
// ***************************************************

function getList($table, $inici) {

    // Conexion servidor y conexion base de datos
    include ("Config_BD.php");
    
    // Generamos objeto sql
    $sql =  "SELECT * FROM $table
            LIMIT $inici, 10";    			        
    
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
    
    return json_encode([ // codifica datos para enviar de vuelta con json
           "status"  => "$status",
           "data"  => $datos               
    ]);

    // Cierre base de datos.
    mysqli_close($conexion);
} // FIN funcion


// ***************************************************
//                      LISTA TABLA COMPLETA (CON INNER JOINTS)
// ***************************************************

    function getListCompleto($lista, $inici) {

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

            case 'usuarios':           // 3 tablas de formularios
            $sql =  "SELECT * FROM usuario
                    INNER JOIN usuario_rol ur
                    ON Id_usuario=ur.Fid_usuario                    
                    INNER JOIN usuario_rol_data urd
                    ON ur.Fid_data_rol=urd.Id_rol                    
                    INNER JOIN usuario_navbar
                    ON ur.Fid_navbar=Id_navbar
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
        
        return json_encode([ // codifica datos para enviar de vuelta con json
               "status"  => "$status",
               "data"  => $datos               
        ]);

        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion



// ***************************************************
//   MOSTRAR UNA FILA DE UNA SOLA TABLA
// ***************************************************
//$table    = nombre de tabla 
//$campo_Id = nombre de campo/columna en que buscaremos el $id 
//$id       = id concreto para get fila 

    function getFila($table, $campo_Id, $id) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");
        
        // Generamos objeto sql
        $sql =  "SELECT * FROM $table
                WHERE $campo_Id = '$id' "; 			        
        
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
        
        return json_encode([ // codifica datos para enviar de vuelta con json
               "status"  => "$status",
               "data"  => $datos               
        ]);
    
        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion


// ****************************************************************************************
//   MOSTRAR FILAS CONCRETAS CON UN ID DENTRO DE UNA CONSULTA COMPLETA (TABLAS CON INNER JOIN)
// ****************************************************************************************

    function getFilaCompleta($lista, $id) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");

    	// Opcion acceso por switch ****************************
        switch ($lista) {
            case 'proveedores': //proveedor y su contacto
                $sql =  "SELECT * FROM proveedor
                        LEFT JOIN proveedor_contacto
                        ON Fid_proveedor=Id_proveedor
                        WHERE  Id_proveedor = '$id' ";
    			break;
    		
    	    case 'clientes':    //cliente y su contacto
                $sql =  "SELECT * FROM cliente
                        LEFT JOIN cliente_contacto
                        ON fid_cliente=Id_cc
                        WHERE  Id_cliente= '$id' ";
                break;

            case 'ventas':  //clieteventa cliente factura y crentelp
                $sql =  "SELECT * FROM cliente
                        INNER JOIN cliente_venta
                        ON Id_cliente=Fid_cliente
                        INNER JOIN cliente_lineaventa
                        ON Id_venta=Fid_venta
                        INNER JOIN cliente_factura
                        ON Id_lineapedido=Fid_lineaventa
                        WHERE  Id_venta= '$id' ";
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
                        WHERE  Id_compra= '$id' ";
            break;

            case 'usuarios':  // 3 tablas de formularios
            $sql =  "SELECT * FROM usuario
                        INNER JOIN usuario_rol ur
                        ON Id_usuario=ur.Fid_usuario                    
                        INNER JOIN usuario_rol_data urd
                        ON ur.Fid_data_rol=urd.Id_rol                    
                        INNER JOIN usuario_navbar
                        ON ur.Fid_navbar=Id_navbar
                        WHERE  Id_usuario = '$id' ";
            break;

            case 'encuestas':           // 3 tablas de formularios
                $sql =  "SELECT * FROM formulario
                        INNER JOIN formulario_preguntas
                        ON Id_formulario=Fid_formulario
                        INNER JOIN formulario_respuestas
                        ON Id_preguntas=Fid_pregunta
                        WHERE  Id_formulario = '$id' ";
            break;

            default:        
                        echo"Error. Id no existe en la consulta.";
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
        
        return json_encode([ // codifica datos para enviar de vuelta con json
               "status"  => "$status",
               "data"  => $datos               
        ]);

        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion






// ***************************************************
//             Menus opciones por usuario (NAVBAR)
// *************************************************** 

//$User = es el USERNAME del ususario  

    function getNavbar($User) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");       

        $sql =  "SELECT Id_usuario, User, seccion, Fid_data_rol FROM usuario_navbar 
                    INNER JOIN usuario_rol
                    ON Id_navbar = Fid_navbar
                    INNER JOIN usuario
                    on Id_usuario = Fid_usuario                    
                    WHERE User = '$User';";

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
        
        return json_encode([ // codifica datos para enviar de vuelta con json
               "status"  => "$status",
               "data"  => $datos
               
            ]);
            
        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion



// ***************************************************
//                  Control usuario
// ***************************************************
    //  Return de JSON(succes, data)
    function getUser($pass, $usuario) {

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
        $nfilas=mysqli_num_rows($consulta);

        if ($consulta && $nfilas>0 ){          
           
            $status = "OK";                      
            $datos = array();
            
            //echo $nfilas;

            while($fila = mysqli_fetch_assoc($consulta)){                              
               $datos [] = $fila;
           }  

        }else{
            $status = "Error";
            $datos = "La combinacion de este usuario con esta contrasenya no existe.";
        }
        
        return json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "$status",
            "data"  => $datos
        ]);

        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion



// ***************************************************
//            MODIFICACIÓN DE REGISTROS
// ***************************************************    
    function updateRegistro($tabla, $form_data, $field_id, $id) { //$form_data es un array associativo
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
        
        return json_encode([ // codifica datos para enviar de vuelta con json
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
    function deleteRegistro($tabla, $campo_id, $value_id) {
      
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
        
        return json_encode([ // codifica datos para enviar de vuelta con json
                "status"  => "$status",
                "data"  => $datos
            ]);
            
        // Cierre base de datos.
        mysqli_close($conexion);
    } // FIN funcion



 
// ***************************************************
//            NUEVO REGISTRO
// ***************************************************
function crearRegistro($tabla, $form_data) { // $form_data es un array associativo
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
    
    return json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "$status",
            "data"  => $datos
        ]);
      
  // Cierre base de datos.
  mysqli_close($conexion);
} // FIN funcion

  


?>