<?php
include ("menu.php");

$user = $_SESSION['user']->data[0]->User;
$navbar = json_decode(getNavbar($user));
$_SESSION['roles'] = array();

foreach($navbar->data as $menu){
	$seccion = $menu->seccion;
	$acceso = $menu->Fid_data_rol;
	$permisos = array($seccion, $acceso);
	array_push($_SESSION['roles'], $permisos);
}

echo showNavbar();