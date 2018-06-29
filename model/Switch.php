<?php


function elegirTabla($case){  

    $case = strtolower($case);
    
    switch ($case) {

        case 'cliente':
        $tabla="cliente";
        break;

        case 'contactoCliente':
        $tabla="cliente_contacto";
        break;

        case 'facturaCliente':
        $tabla="cliente_factura";
        break;

        case 'lineaVenta':
        $tabla="cliente_lineaventa";
        break;

        case 'venta':
        $tabla="cliente_venta";
        break;

        case 'formulario':
        $tabla="formulario";
        break;

        case 'formPreguntas':
        $tabla="formulario_preguntas";
        break;

        case 'formRespuestas':
        $tabla="formulario_preguntas";
        break;

        case 'proveedor':
        $tabla="proveedor";

        break;

        case 'albaranProveedor':
        $tabla="proveedor_albaran";
        break;

        case 'facturaProveedor':
        $tabla="proveedor_factura";
        break;

        case 'lineapedido':
        $tabla="proveedor_lineaproveedor";
        break;

        case 'usuario':
        $tabla="usuario";
        break;

        case 'home':
        $tabla="usuario_home";
        break;

        case 'navbar':
        $tabla="usuario_navbar";
        break;

        case 'rol':
        $tabla="usuario_rol";
        break;

        case 'rolData':
        $tabla="usuario_rol_data";
        break;

        default:
        echo "Error. Tabla no encontrada.";
        break;
   }
   return $tabla;
}



function switchGetListCompleto($lista,$inici=0){
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
     return $sql;
   }





function switchGetFila($lista, $id){

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

      case 'usuario':  // 3 tablas de formularios
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
  return $sql;
}


function switchConsultaFilas($consulta){
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
                        var_dump($resultado1); //var_dump : echo en json
                        echo "<br><br><br><br>";
               
                $jsondata1 = json_decode($resultado1, true);    // pasamos de PHP a json
                $data1 = $jsondata1["data"];                    // pasamos de json a PHP
                        print_r($data1);
                        echo "<br><br><br><br>";
               
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

                    print_r($data);
                    echo "<br><br>";
                    print_r($otro1);
                    echo "<br><br>";
                    print_r($otro2);
                    echo "<br><br>"; 

                $i++;                   
            }
                                             
        break;

        default:
            echo "Error";
            break;
    }
    return $resultado;
}








?>