<?php 


function showList($json, $tabla){
  //var_dump(json_decode($json,true));
  
  $datos = json_decode($json);
  //var_dump($datos);
  $infoDatos = $datos->data;
  //var_dump($infoDatos);

  $listado = "<h2>Listado de $tabla</h2>";

  /* Mostrar botón de agregar elemento si se tiene el permiso adecuado */

  $perfil = buscarPermiso($tabla);
  //echo  $perfil;
  if ( $perfil == 2 ) {
    $listado .= "<button type=\button\" id=\"$tabla\" name=\"nuevo\">Nuevo $tabla</button>";
  }

  $listado .= "<table>";
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

  $lista = "<tr><th>Fecha</th><th>Num compra</th><th>Proveedor</th><th>Estado</th></tr>" ;

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

  $lista = "<tr><th>Código</th><th>Empresa</th><th>Población</th><th>Fecha Alta</th></tr>" ;

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

  $lista = "<tr><th>Código</th><th>Empresa</th><th>Población</th><th>Fecha Alta</th></tr>" ;

  foreach ($info as $valores) {
    $codigo = $valores->Id_cliente;
    $nombre = $valores->Nombre;
    $fecha = $valores->Fecha_alta;
    $poblacion = $valores->Poblacion;
    $lista .= "<tr id='".$id."'>";
    $lista .= "<td>$codigo</td><td>$nombre</td><td>$poblacion</td><td>$fecha</td>" ;
    $lista .= "</tr>";
    
  }
  return $lista;

}

function showListProveedores($info){

  /* Listado de los proveedores */

  $lista = "<tr><th>Código</th><th>Empresa</th><th>Población</th><th>Fecha Alta</th></tr>" ;
 

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

  $lista = "<tr><th>Nom Usuari</th><th>Nom</th><th>Cognoms</th><th>Telefon</th></tr>" ;
 

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