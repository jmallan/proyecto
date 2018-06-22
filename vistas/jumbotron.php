<?php 

function showJumbotron() {

	$cabecera = "";
	$cabecera .= "<div class=\"jumbotron jumbotron-fluid bg-primary\">";
	$cabecera .= "<div class=\"container\">";
	$cabecera .= "<div class=\"row\">";
	$cabecera .= "<div class=\"col-4\">";
	$cabecera .= "<img src=\"img/logos/logosarti.png\" alt=\"\" class=\"w-100\">";
	$cabecera .= "</div>";
	$cabecera .= "<div class=\"col-8\">";
	$cabecera .= "<p class=\"lead text-light\">Centro de Desarrollo Tecnológico de Sistemas de Adquisición Remota y Tratamiento de la Información</p>";
	$cabecera .= "</div>";
	$cabecera .= "</div>";
	$cabecera .= "</div>";
	$cabecera .= "</div>";


	return $cabecera;
}

?>