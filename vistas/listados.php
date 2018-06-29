<?php 


function showList($json, $tabla){
  //var_dump(json_decode($json,true));
  
  $datos = json_decode($json);
  //var_dump($datos);
  $infoDatos = $datos->data;
  //var_dump($infoDatos);

  $listado = "<h2 class=\"border border-primary text-primary rounded p-3 text-uppercase\">Listado de $tabla</h2>";

  /* Mostrar botón de agregar elemento si se tiene el permiso adecuado */

  $perfil = buscarPermiso($tabla);
  //echo  $perfil;
  if ( $perfil == 2 ) {
    $listado .= "<button type=\button\" id=\"$tabla\" name=\"nuevo\" class=\"btn btn-primary p-3 text-uppercase\">Nuevo $tabla</button>";
  }

  $listado .= "<table class=\"table table-hover\">";
  switch($tabla){
    case "Compras":
      $listadoInfo = showListCompras($infoDatos);
      break;
    case "Ventas":
      $listadoInfo = showListVentas($infoDatos);
      break;
    case "Clientes":
      $listadoInfo = showListClientes($infoDatos);
      break;
    case "Proveedores":
      //echo "Entrando en proveedores";
      $listadoInfo = showListProveedores($infoDatos);
      //echo "Info obtenida de la funcion showListProveedores<br>";
      //var_dump($listadoInfo);
      break;
    case "Usuarios":
      $listadoInfo = showListUsuarios($infoDatos);
      break;


  }

  $listado .= $listadoInfo;
  $listado .= "</table>";
  //var_dump($listado);
  return $listado;

}

function showListCompras($info){
  /* Listado de compras */

  $lista = "<thead class=\"bg-primary\"><tr><th>Fecha</th><th>Num compra</th><th>Proveedor</th><th>Estado</th></tr></thead>" ;

  foreach ($info as $valores) {
    $id = $valores->Id_proveedor;
    $codigo = $valores->Id_proveedor;
    $fecha = $valores->Fechaalta;
    $poblacion = $valores->Poblacion_p;
    $nombre = $valores->Nombre;
    $lista .= "<tr id='".$id."'>";
    $lista .= "<td>$codigo</td><td>$nombre</td><td>$poblacion</td><td>$fecha</td>" ;
    $lista .= "</tr>";
    
  }
  return $lista;
  


}

function showListVentas($info){

  /* Listado de proyectos */

  $lista = "<thead class=\"bg-primary\"><tr><th>Fecha</th><th>Num compra</th><th>Proveedor</th><th>Estado</th></tr></thead>" ;

  foreach ($info as $valores) {
    $id = $valores->Id_cliente;
    $codigo = $valores->NIF;
    $fecha = $valores->Fecha_alta;
    $poblacion = $valores->Poblacion;
    $nombre = $valores->Nombre;
    $lista .= "<tr id='".$id."'>";
    $lista .= "<td>$codigo</td><td>$nombre</td><td>$poblacion</td><td>$fecha</td>" ;
    $lista .= "</tr>";
    
  }
  return $lista;
  
}

function showListClientes($info){

  /* Listado de los clientes */

  $lista = "<thead class=\"bg-primary\"><tr><th>Fecha</th><th>Num compra</th><th>Proveedor</th><th>Estado</th></tr></thead>";

  foreach ($info as $valores) {
    $codigo = $valores->Id_cliente;
    $nombre = $valores->Nombre;
    $fecha = $valores->Fecha_alta;
    $poblacion = $valores->Poblacion;
    $lista .= "<tr id='".$codigo."'>";
    $lista .= "<td>$codigo</td><td>$nombre</td><td>$poblacion</td><td>$fecha</td>" ;
    $lista .= "</tr>";
    
  }
  return $lista;

}

function showListProveedores($info){

  /* Listado de los proveedores */

  $lista = "<thead class=\"bg-primary\"><tr><th>Fecha</th><th>Num compra</th><th>Proveedor</th><th>Estado</th></tr></thead>" ;
 

  foreach ($info as $valores) {
    $id = $valores->Id_proveedor;
    $fecha = $valores->Fecha_alta;
    $poblacion = $valores->Poblacion;
    $nombre = $valores->Nombre;
    $lista .= "<tr id='".$id."'>";
    $lista .= "<td>$id</td><td>$nombre</td><td>$poblacion</td><td>$fecha</td>" ;
    $lista .= "</tr>";
    
  }
  return $lista;
}

function showListUsuarios($info){

  /* Listado de los empleados */

  $lista = "<thead class=\"bg-primary\"><tr><th>Fecha</th><th>Num compra</th><th>Proveedor</th><th>Estado</th></tr></thead>";
 

  foreach ($info as $valores) {
    $id = $valores->Id_usuario;
    $username = $valores->User;
    $telefono = $valores->Telefono;
    $apellidos = $valores->Apellidos;
    $nombre = $valores->Nombre;
    $lista .= "<tr id='".$id."'>";
    $lista .= "<td>$username</td><td>$nombre</td><td>$apellidos</td><td>$telefono</td>" ;
    $lista .= "</tr>";
    
  }
  return $lista;
}

