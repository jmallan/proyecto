<?php

include("Queries.php");
include("Switch.php");

// ***************************************************
//            NUEVO REGISTRO / 
// ***************************************************

function getList($case, $inicio){
   $tabla = elegirTabla($case);
   //echo $tabla;
   return getList1($tabla, $inicio);

}

function getFila($case, $campo, $id){
   $tabla = elegirTabla($case);
   return getFila1($tabla, $campo,$id);
}

function updateRegistro($case,$form_data, $field_id, $id){
   $tabla = elegirTabla($case);
   return updateRegistro1($tabla, $form_data, $field_id, $id);
}

function deleteRegistro($case, $campo,$id){
   $tabla = elegirTabla($case);
   return deleteRegistro1($tabla, $campo,$id);
}

function crearRegistroDosTablas($case, $form_data1, $form_data2){
   $tabla = elegirTabla($case);
   return crearRegistroDosTablas1($tabla, $form_data1, $form_data2);
}

function crearRegistro($case, $form_data){
   $tabla = elegirTabla($case);
   return crearRegistro1($tabla, $form_data);
}

// ***************************************************
//          LISTA TABLA COMPLETA (CON INNER JOINTS)
// ***************************************************
//$lista puede ser: 
    function getListCompleto($lista, $inici=0) {

   // Conexion servidor y conexion base de datos
   include ("Config_BD.php");
   $lista=strtolower($lista);

   //llamar function switch para definir consulta 

   // Generamos objeto sql  
   $consulta = mysqli_query($conexion, switchGetListCompleto($lista))
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
   
   // Cierre base de datos.
   mysqli_close($conexion);

   return json_encode([ // codifica datos para enviar de vuelta con json
          "status"  => "$status",
          "data"  => $datos               
   ]);
} // FIN funcion

// ****************************************************************************************
//   MOSTRAR FILAS CONCRETAS CON UN ID DENTRO DE UNA CONSULTA COMPLETA (TABLAS CON INNER JOIN)
// ****************************************************************************************

// ****************************************************************************************
//   MOSTRAR FILAS CONCRETAS CON UN ID DENTRO DE UNA CONSULTA COMPLETA (TABLAS CON INNER JOIN)
// ****************************************************************************************

function getFilaCompleta($lista, $id) {

    // Conexion servidor y conexion base de datos
    include ("Config_BD.php");
    $lista=strtolower($lista);

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
                        LEFT JOIN cliente_lineaventa
                            ON Id_venta=Fid_venta
                        LEFT JOIN cliente_factura
                            ON Id_lineapedido=Fid_lineaventa
                        WHERE  Id_venta= '$id' ";
        break;

        case 'compras': //proveedor compra factura lp albaran
            $sql =  "SELECT * FROM proveedor AS p
                        RIGHT JOIN proveedor_compra AS pc
                            ON  p.Id_proveedor = pc.Fid_proveedor
                        INNER JOIN usuario AS u
                            ON  pc.Fid_usuario = u.Id_usuario
                        LEFT JOIN proveedor_lineapedido as pl
                            ON  pl.Fid_compra = pc.Id_pedido
                        LEFT JOIN proveedor_factura AS pf
                            ON  pl.Id_lineapedido = pf.Fid_pedido
                        LEFT JOIN proveedor_albaran AS pa
                            ON  pf.Id_factura = pa.Fid_factura                                
                        WHERE  pc.Id_pedido = '$id'";
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

        case 'home':           // 3 tablas de formularios
        $sql =  "SELECT * FROM usuario_home
                    LEFT JOIN usuario
                        ON Fid_usuario=Id_usuario                    
                    WHERE  Id_usuario = '$id' ";
        break;

        default:        
                    echo"Error. Id no existe en la consulta.";
                    return;
    }
    
    // Generamos objeto sql
    $consulta = mysqli_query($conexion, $sql)
        or die ("Fallo en la consulta".mysqli_error($conexion));

    print_r($consulta);
    echo "<br><br><br><br>";
    $nfila = mysqli_num_rows($consulta);       

    if ($consulta && $nfila>0){
        $status = "OK";                      
        $datos = array();
        while($fila = mysqli_fetch_assoc($consulta)){                 
            $datos [] = $fila;
        }                    
    }else{
        $status = "Error";
        $datos  = "Error. Id solicitado no existe.";
    }

    // Cierre base de datos.
    mysqli_close($conexion);

    return json_encode([ // codifica datos para enviar de vuelta con json
           "status"  => "$status",
           "data"    => $datos,
           "nfilas"  => $nfila
    ]);
} // FIN funcion



// ***************************************************
//          Menus opciones por usuario (NAVBAR)
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
            $datos  = "Fallo en la consulta";
        }
                    
        // Cierre base de datos.
        mysqli_close($conexion);

        return json_encode([ // codifica datos para enviar de vuelta con json
           "status"  => "$status",
           "data"  => $datos
           
        ]);
    } // FIN funcion

// ***************************************************
//           Control usuario
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
            //echo $nfilas;
        if ($consulta && $nfilas>0 ){          
           
            $status = "OK";                      
            $datos = array();

            while($fila = mysqli_fetch_assoc($consulta)){                              
               $datos [] = $fila;
            }  

        }else{
            $status = "Error";
            $datos  = "La combinacion de este usuario con esta contrasenya no existe.";
        }
        // Cierre base de datos.
        mysqli_close($conexion);

        return json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "$status",
            "data"  => $datos
        ]);
    } // FIN funcion


?>