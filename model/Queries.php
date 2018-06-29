<?php
// *******************************************************************
//                               Fichero Queries
//  ******************************************************************

// ***************************************************
//          LISTA DE UNA SOLA TABLE
// ***************************************************
    //  $Listado   : Nombre listado solicitado
    //  $Inicio    : fila inicial a listar
    //  Num_items  : Por defecto se daran 10 lineas
    //  Return de JSON(succes, data)
        function getList1($table, $inici=0) {

            // Conexion servidor y conexion base de datos
            include ("Config_BD.php");
            
            // Generamos objeto sql
            $sql =  "SELECT * FROM $table
                    LIMIT $inici, 10";    			        
            //echo $sql;
            $consulta = mysqli_query($conexion, $sql)
                or die ("Fallo en la consulta".mysqli_error($conexion));
//print_r($conexion);
            if ($consulta){
                $status = "OK";                      
                $datos  = array();
                while($fila = mysqli_fetch_assoc($consulta)){                 
                    $datos [] = $fila;
                    //print_r($datos);
                    //echo "<br>";
                }                    
            }else{
                $status = "Error: " .$sql.  "<br>" . $mysqli->error;
                $datos  = "Fallo en la consulta <br>";
            }

            // Cierre base de datos.
            mysqli_close($conexion);
        //    print_r($datos);

          return json_encode([ // codifica datos para enviar de vuelta con json
                "status" => "$status",
                "data"   => $datos               
            ]);

        } // FIN funcion







// ***************************************************
//          MOSTRAR UNA FILA DE UNA SOLA TABLA
// ***************************************************
    //$table    = nombre de tabla 
    //$campo_Id = nombre de campo/columna en que buscaremos el $id 
    //$id       = id concreto para get fila 

    function getFila1($tabla, $campo_Id, $id) {

        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");

        switchGetFila($tabla, $id);
        
        // Generamos objeto sql
        $sql =  "SELECT * FROM $tabla
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
            $datos  = "Fallo en la consulta";
        }
    
        // Cierre base de datos.
        mysqli_close($conexion);

        return json_encode([ // codifica datos para enviar de vuelta con json
               "status" => "$status",
               "data"   => $datos               
        ]);
    } // FIN funcion














// ***************************************************
//            MODIFICACIÓN DE REGISTROS
// ***************************************************    
    function updateRegistro1($tabla, $form_data, $field_id, $id) { //$form_data es un array associativo
        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");   
        
        // Generamos objeto sql
        $sql = "UPDATE ".$tabla." SET ";

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
            $datos  = array();
                                
        }else{
            $status = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos  = "Fallo en la modificacion";
        }
                  
        // Cierre base de datos.
        mysqli_close($conexion);

        return json_encode([ // codifica datos para enviar de vuelta con json
            "status"  => "$status",
            "data"    => $datos
        ]);
  } // FIN funcion


  
// ***************************************************
//            ELIMINAR REGISTROS
// ***************************************************
    //  Return de JSON(menu)
    function deleteRegistro1($tabla, $campo_id, $Id) {
      
        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");        
        //$conexion=connectBD();

        // Generamos objeto sql
        $sql = "DELETE FROM $tabla WHERE $campo_id='$Id'";
            
        $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));

        // Hallamos la longitud del objeto obtenido
        if ($consulta){
            $status = "OK";                      
            $datos  = array();
        }else{
            $status = "Error: " .$sql.  "<br>" . $mysqli->error;
            $datos  = "Fallo en el borrado del registro";
        }
                
        // Cierre base de datos.
        mysqli_close($conexion);

        return json_encode([ // codifica datos para enviar de vuelta con json
                "status"  => "$status",
                "data"  => $datos
        ]);
    } // FIN funcion


 
// ***************************************************
//            NUEVO REGISTRO
// ***************************************************

    function crearRegistro1($tabla, $form_data) { // $form_data es un array associativo
        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");

        // Definciones iniciales          
        $fields="";
        $values="";
        // Cargamos data de $form_data: campos y valores
        foreach ($form_data as $field => $value) {
            $fields.=$field.",";
            $values.="'$value', ";   
        }    
        // Eliminamos la ultima coma
        $fields=substr($fields, 0,-1);
        $values=substr($values, 0,-2);
        // Definimos el SQL 
        $sql = "INSERT INTO ".$tabla." ($fields) VALUES ($values)";
                //echo $sql;  
            
        $consulta = mysqli_query($conexion, $sql) or die ("Fallo en la conexion".mysqli_error($conexion));
                //printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($conexion));

        // Guardamos el ultimo Id
        // para uso de la function crearRegistroDosTablas()
        $ultimoId= mysqli_insert_id($conexion);

        if ($consulta){
            $status = "OK";                      
            $datos  = array();          
        }else{
            $status = "Error";
            $datos  = "Fallo creacion nuevo registro";
        }
              
        // Cierre base de datos.
        mysqli_close($conexion);

        return json_encode([ // codifica datos para enviar de vuelta con json
            "status"    => "$status",
            "data"      => $datos,
            "ultimoId"  => $ultimoId
        ]);

    } // FIN funcion



// ***************************************************
//            NUEVO REGISTRO PARA DOS TABLAS 
// ***************************************************

    function crearRegistroDosTablas1($tabla, $form_data1, $form_data2) { // $form_data es un array associativo
        // Conexion servidor y conexion base de datos
        include ("Config_BD.php");        

        $resultado = crearRegistro1($tabla, $form_data1);
        var_dump($resultado);
        $jsondata = json_decode($resultado,true);   
        $ultimoId = $jsondata["ultimoId"];

        
        switch ($tabla) {
            case 'proveedor':
               $tabla2="proveedor_contacto";           
               $form_data2["Fid_proveedor"]=$ultimoId;
               
                break;

                case 'cliente':
                $tabla2="cliente_contacto";
                $form_data2["Fid_cliente"]=$ultimoId;
                 break;
            
            default:
                echo "Error";
                break;

        }
        
        crearRegistro1($tabla2, $form_data2); 

       
    } // FIN funcion



// ***************************************************
//            CONSULTAS TABLAS DEVOLVER ARRAYS SEPERADAMENTE
// ***************************************************

function consultaFilas($consulta, $Id) { 
    // Conexion servidor y conexion base de datos
    include ("Config_BD.php");
    $consulta=strtolower($consulta);

    $data = array();
    $otro1 = array();
    $otro2 = array();
    $otro3 = array();
    $otro4 = array();
    $otro5 = array();
    
    switch ($consulta) {
        case 'proveedores':
           $resultado1 = getFilaCompleta($consulta, $Id);

                        //var_dump($resultado1);                  // var_dump : echo en json
                        //echo "<br><br><br><br>";
               
                $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
                $data1 = $jsondata1["data"];                    // pasamos de json a PHP
                        //print_r($data1);
                        //echo "<br><br><br><br>";
               
                $status ="OK";
                $data = array_slice($data1[0], 0,12); 
                $otro1 = array_slice($data1[0], 12,3); 

                        // print_r($data);
                        // echo "<br><br>";
                        // print_r($otro1);
                        // echo "<br><br>";               
        break;

        case 'clientes':
                $resultado1 = getFilaCompleta($consulta, $Id);
                        //var_dump($resultado1); //var_dump : echo en json
                        //echo "<br><br><br><br>";
               
                $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
                $data1 = $jsondata1["data"];                    // pasamos de json a PHP
                        //print_r($data1);
                        //echo "<br><br><br><br>";
               
                $status = "OK";
                $data   = array_slice($data1[0], 0, 13); 
                $otro1   = array_slice($data1[0], 13, 4); 

                        // print_r($data);
                        // echo "<br><br>";
                        // print_r($otro1);
                        // echo "<br><br>";    
            break;

        case 'home':
                $resultado1 = getFilaCompleta($consulta, $Id);
                        // var_dump($resultado1); //var_dump : echo en json
                        // echo "<br><br><br><br>";
               
                $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
                $data1 = $jsondata1["data"];                    // pasamos de json a PHP
                        // print_r($data1);
                        // echo "<br><br><br><br>";
               
                $status = "OK";
                $data  = array_slice($data1[0], 0, 4); 
                $otro1  = array_slice($data1[0], 4, 8); 

                        // print_r($data);
                        // echo "<br><br>";
                        // print_r($otro1);
                        // echo "<br><br>";    
            break;

        case 'ventas':
                $resultado1 = getFilaCompleta($consulta, $Id);
                        // var_dump($resultado1); //var_dump : echo en json
                        // echo "<br><br><br><br>";
               
                $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
                $data1 = $jsondata1["data"];                    // pasamos de json a PHP
                        // print_r($data1);
                        // echo "<br><br><br><br>";
               
                $status = "OK";
                $data   = array_slice($data1[0], 13, 7); 
                $otro1  = array_slice($data1[0], 0, 13);
                $otro2  = array_slice($data1[0], 20, 3);
                $otro3  = array_slice($data1[0], 23, 3);

                        // print_r($data);
                        // echo "<br><br>";
                        // print_r($otro1);
                        // echo "<br><br>";
                        // print_r($otro2);
                        // echo "<br><br>";
                        // print_r($otro3);
                        // echo "<br><br>";    
            break;

        case 'compras':
            $resultado1 = getFilaCompleta($consulta, $Id);                        
                    //var_dump($resultado1); //var_dump : echo en json 
            $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
            $data1 = $jsondata1["data"];                    // pasamos de json a PHP
                    //print_r($data1);
                    //echo "<br><br><br><br>";
           
            $status = "OK";
            $otro1  = array_slice($data1[0], 0, 12);
            $data   = array_slice($data1[0], 12, 7); 
            $otro2  = array_slice($data1[0], 19, 8);
            $otro3  = array_slice($data1[0], 26, 6);
            $otro4  = array_slice($data1[0], 32, 6);
            $otro5  = array_slice($data1[0], 38, 5);                

                    // print_r($data);
                    // echo "<br><br>";
                    // print_r($otro1);
                    // echo "<br><br>";
                    // print_r($otro2);
                    // echo "<br><br>";
                    // print_r($otro3);
                    // echo "<br><br>";    
                    // print_r($otro4);
                    // echo "<br><br>";
                    // print_r($otro5);
                    // echo "<br><br>";                          
        break;

        case 'usuarios':
            
            $resultado1 = getFilaCompleta($consulta, $Id);                        
                    //var_dump($resultado1); //var_dump : echo en json 
            $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
            $data1 = $jsondata1["data"]; 
            $nfila = $jsondata1["nfilas"];                   // pasamos de json a PHP
                    //print_r($data1);
                    //print_r($nfila);                         
                    //echo "<br><br><br><br>";
           
            $status = "OK";

            $i= 1;
            while ($i<=$nfila){

                $data[$i]   = array_slice($data1[0], 0, 8);
                $otro1[$i]  = array_slice($data1[0], 8, 4); 
                $otro2[$i]  = array_slice($data1[0], 12, 2);
                $otro3[$i]  = array_slice($data1[0], 14, 2);               
                        
                    // print_r($data);
                    // echo "<br><br>";
                    // print_r($otro1);
                    // echo "<br><br>";
                    // print_r($otro2);
                    // echo "<br><br>";
                    // print_r($otro3);
                    // echo "<br><br>";   
                $i++;                   
            }
                                             
        break;

        case 'encuestas':
            $resultado1 = getFilaCompleta($consulta, $Id);                        
                    //var_dump($resultado1); //var_dump : echo en json 
            $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
            $data1 = $jsondata1["data"];                    // pasamos de json a PHP
                    // print_r($data1);
                    // echo "<br><br><br><br>";
           
            $status = "OK";

            $i= 1;
            while ($i<=$nfila){

                $data  = array_slice($data1[0], 0, 5);
                $otro1   = array_slice($data1[0], 5, 3); 
                $otro2  = array_slice($data1[0], 8, 4);   

                    // print_r($data);
                    // echo "<br><br>";
                    // print_r($otro1);
                    // echo "<br><br>";
                    // print_r($otro2);
                    // echo "<br><br>"; 

                $i++;                   
            }
                                             
        break;

        default:
            echo "Error";
            break;
    }

    return json_encode([
        "status"    => "$status",
        "data"      => $data,
        "otro1"     => $otro1,
        "otro2"     => $otro2,
        "otro3"     => $otro3,
        "otro4"     => $otro4,
        "otro5"     => $otro5


    ]);
       
} // FIN funcion



?>