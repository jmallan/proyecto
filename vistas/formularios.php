<?php
session_start();
$seccio = $_SESSION['seccio'];
include "functions.php";
$id = $_POST['id'];

if($id <> ""){
//consulta amb les dades del registre
	//$datosjson = getFila();

}

switch ($seccio) {
	case 'Ventas':
		include "";
		break;
	case 'Compras':
		include "proveedores.php";
		break;
	case 'Clientes':
		include "clientes.php";
		break;
	case 'Usuaris':
		include "usurios.php";
		break;

}

