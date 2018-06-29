<?php

include("Queries.php");

// ***************************************************
//            NUEVO REGISTRO / 
// ***************************************************

function Listar($case, $form_data){
   $tabla = elegirTabla($case);
   getList($tabla, $form_data);
}

function Fila($case, $form_data){
   $tabla = elegirTabla($case);
   getFila($tabla, $form_data);
}

function Modificar($case, $form_data){
   $tabla = elegirTabla($case);
   updateRegistro($tabla, $form_data);
}

function Eliminar($case, $form_data){
   $tabla = elegirTabla($case);
   deleteRegistro($tabla, $form_data);
}

function Dostablas($case, $form_data1, $form_data2){
   $tabla = elegirTabla($case);
   crearRegistroDosTablas($tabla, $form_data1, $form_data2);
}

function Nuevo($case, $form_data){
   $tabla = elegirTabla($case);
   crearRegistro($tabla, $form_data);
}


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
}

?>