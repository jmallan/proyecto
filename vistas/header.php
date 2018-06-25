<?php
include "jumbotron.php";
include "model/Queries.php";
echo showJumbotron();
if(isset($_SESSION['user'])) {
	//crear Json amb les dades d'usuari.
	include "menu.php";
	//var_dump($_SESSION['user']);
	$user = "'".$_SESSION['user']->data[0]->User."'";
	echo $user;
	var_dump($user);
	$userNavbar = json_decode(getnavbar($user));
	var_dump($userNavbar);
	//$navbar = showNavbar($);
	//echo $navbar[0];

}