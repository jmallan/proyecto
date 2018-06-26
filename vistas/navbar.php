<?php
include ("menu.php");

$user = $_SESSION['user']->data[0]->User;
$navbar = getNavbar($user);
$_SESSION['roles'] = array();
foreach($navbar->data as $rol){

	$seccion = $rol;
	if($key == "Fid_data_rol") $rol = $value;

	array_push($_SESSION['roles'], array(var))
}


//foreach($){}
echo showNavbar();