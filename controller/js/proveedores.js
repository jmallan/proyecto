$( document ).ready(function() {
    $('#newContacto').on('click',newContacto);
    $('#newProveedor').on('click',newProveedor);
    $('#modifyProveedor').on('click',modifyProveedor);

});

/*  ------------------------------------------ Validació campos  ----------------------------------------  */



/*  -----------------------------------------------------------------------------------------------------  */

function newContacto(){
	nuevocontacto = "<div class=\"form-group col-md-4\">";
	nuevocontacto += " <input type=\"text\" class=\"form-control\" id=\"Nombre\" placeholder=\"Nom Persona de Contacte\" name=\"Nombre\">";
	nuevocontacto += "</div>";
	nuevocontacto += "<div class=\"form-group col-md-2\">";
	nuevocontacto += "<input type=\"text\" class=\"form-control\" id=\"Cargo\" placeholder=\"Carreg\" name=\"Cargo\">" ;
	nuevocontacto += "</div>";
	nuevocontacto += "<div class=\"form-group col-md-2\">";
	nuevocontacto += "<input type=\"email\" class=\"form-control\" id=\"Telefono\" placeholder=\"Teléfon\" name=\"Telefono\">";
	nuevocontacto += "</div>";
	nuevocontacto += "<div class=\"form-group col-md-4\">" ;
	nuevocontacto +=  "<input type=\"email\" class=\"form-control\" id=\"Email\" placeholder=\"Email\" name=\"Email\">";
	nuevocontacto += "</div>";
	$('#contactos').append(nuevocontacto);

	
}

function crearProveedor(){

}

function modificarProveedor(){

}