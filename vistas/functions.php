<?php

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
}?>