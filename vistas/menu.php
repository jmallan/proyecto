<?php 

	function showNavbar(){
		$menuLateral = "";
		
		/* Generar menu del usuario dependiendo de los roles que tiene asignados y que se encuentra en la variable $_SESSION['roles'] */

		$roles = $_SESSION['roles'];


		/* Test */
		// $roles = array(
  //         array("Home",1),
  //         array("Clientes",2),
  //         array("Proveedores",2),
  //         array("Proyectos",2),
  //         array("Encuestas",2),
  //         array("Empleados",2)
  // 		);
		
		$menuLateral .= "<div class=\"container bg-primary\" id=\"navbarV\">";  
		$menuLateral .= "<div class=\"container\">";
		$menuLateral .= "<ul class=\"nav flex-column d-flex justify-content-center mt-5\">";


	   	foreach ($roles as $campo) {
	   		$menuLateral .= "<li class=\"nav-item m-3\" >";
    		$menuLateral .= "<a class=\"nav-link btn btn-outline-light btn-large shadow\" href=\"#\" id=\"$campo[0]\">".$campo[0]."</a>";
    		$menuLateral .= "</li>";
	
		}
        	
      
        $menuLateral .= "</ul></div></div>";		


		return $menuLateral;
	}


?>


 