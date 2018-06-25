<?php

function showNavbar($contenido)
{
	$menuLateral = "";
	$menuLogin = "";
	/* Generar menu del usuario dependiendo de los roles que tiene asignados y que se encuentra en la variable $_SESSION['roles'] */
	$roles = $_SESSION['roles'];
	$menuLateral .= "<nav class=\"nav flex-column\"> ";
	foreach ($roles as $campo) {
			$menuLateral .= "<a id=\"".$campo[0]."\" class=\"nav-link\" href=\"#\">" . $campo[0] . "</a>";
	}
	$menuLateral .= "</nav>";

	/* Menu Login: contiene Nombre usuario y botón Logout */

	$consulta = json_decode($contenido, true);

	$botones = $consulta['data'];
	foreach ($botones as $valores) {
			$usuario = $valores['User'];
	}

	$menuLogin .= "<nav class=\"navbar navbar-light bg-light justify-content-between\">";
	$menuLogin .= "<a class=\"navbar-brand\">" . $usuario . "</a>";
	$menuLogin .= "<form class=\"form-inline\">";
	$menuLogin .= "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"button\">Logout</button>";
	$menuLogin .= "</form>";
	$menuLogin .= "</nav>";

	/* Crear el array asociativo */

	$mensaje = array(
			'login' => $menuLogin,
			'menu' => $menuLateral,
	);

    return $mensaje;
}
