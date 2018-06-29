<?php 


function showJumbotron($username) {

	$cabecera = "";
	$cabecera = "<div class=\"container-fluid bg-primary\">";
	$cabecera .= "<div class=\"jumbotron bg-primary mb-0 rounded-0\">";
	$cabecera .= "<div class=\"row m-3\">";
	$cabecera .= "<div class=\"col-4\">";
	$cabecera .= "<img src=\"img/logos/logosarti_j.png\" alt=\"\" class=\"w-100\">";
	$cabecera .= "</div>";
	$cabecera .= "<div class=\"col-8\">";
	$cabecera .= "<p class=\"lead text-light\">Centre de desenvolupament Tecnològic de Sistemes d'Adquisició Remota i Tractament de la Informació</p>";
	$cabecera .= "</div>";
	$cabecera .= "</div>";
	$cabecera .= "<div class=\"row\">";
	$cabecera .= "<nav class=\"navbar navbar-dark bg-primary w-100 border-top border-light\"><span></span>";
   	$cabecera .= "<form method = \"post\" class=\"form-inline\">";
   	$cabecera .= "<span class=\"navbar-text mr-3\">";
	$cabecera .= "<h5><a href=\"#\" class=\"btn btn-link btn-large\">".$username."</a></h5></span>";
	$cabecera .= "<button id=\"logout\" class=\"btn btn-outline-light\" type=\"submit\">Sortir</button>";
	$cabecera .= "</form>";
	$cabecera .= "</nav>";
	$cabecera .= "</div>";
	$cabecera .= "</div>";
	$cabecera .= "</div>";


	return $cabecera;
}



?>