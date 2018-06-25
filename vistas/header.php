<?php
include "jumbotron.php";
echo showJumbotron();
if(isset($_SESSION['user'])) {
	//crear Json amb les dades d'usuari.
	$data = $_SESSION['user'];
	echo $data;
	$navbar = showNavbar($data);
	echo $navbar[0];

}