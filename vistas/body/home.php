<?php 
function showHome($json){


	/* Buscar el permiso del usuario para la Home */
	$permiso = buscarPermiso('Home');


	/* Recoger información a mostrar en el home  */

	$datos = json_decode($json,true);
	$infoDatos = $datos['data'];
	$infoUsuario = $datos['otro'];
	$contenidor = $infoDatos['Contenidor'];
	$fecha = $infoDatos['Fecha'];
	$usuario = $infoUsuario['Nombre']." ".$infoUsuario['Apellidos'];
    $seccio = "cuerpo";

    $contenido = "<script>var content = '<?php echo $contenidor; ?>';</script>";
    $contenido .= "<div id=\"container\" class=\"m-2\">";
    $contenido .= "<div id=\"contenido\" class=\" container border fondo p-3\">" ;
    if ( $permiso == 2 ) {

	    $contenido .= "<div class=\"row pt-2\">";
	    $contenido .= "<div class=\"col-md-6 mb-3\">";
	    $contenido .= "<span class=\"font-weight-bold\">Pàgina creada per</span> <span class=\"userold\">$usuario</span>";
	    $contenido .= "</div>";
	    $contenido .= "<div class=\"col-md-6 mb-3\">";
	    $contenido .= "<span class=\"font-weight-bold\">Data de creació</span> <span class=\"dateold\">$fecha</span>";
	    $contenido .= "</div>";
	    $contenido .= "</div>";
	    $contenido .= "</div>";
	    $contenido .= "<div id=\"container\" class=\"p-5\">";
	    $contenido .= '<button class="editar btn btn-primary float-right" data-seccio="'.$seccio.'">Modificar</button><button class="guardar btn btn-primary" id="'.$seccio.'">Guardar</button>';
	    $contenido .= "<div class=\"info border p-3\">$contenidor</div>";
	    $contenido .= "</div>";
    }
    else {
    	$contenido = "<div id=\"container\" class=\"p-5\">";
        $contenido .= $contenidor;	
        $contenido .= "</div>";
    }
    
    $contenido .= "</div>";
    
	return $contenido;
}

function buscarPermiso($rol){

  $roles = $_SESSION['roles'];

  // $roles = array(
  //         array("Home",1),
  //         array("Compras",1),
  //         array("Clientes",2),
  //         array("Proveedores",2)
  // );

  foreach ($roles as $posicion) {
    if ( $posicion[0] == $rol ) {
      $permiso = $posicion[1];
    }
  }

  return $permiso;
}
  
?>