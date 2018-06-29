$( document ).ready(function() {
    $('#newContacto').on('click',newContacto);
    $('#newCliente').on('click',newCliente);
    $('#modifyCliente').on('click',modifyCliente);

    (function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
});

/*  ------------------------------------------ ValidaciÃƒÂ³ campos  ----------------------------------------  */



/*  -----------------------------------------------------------------------------------------------------  */

function newContacto(){
	nuevocontacto = "<div class=\"form-group col-md-4\">";
	nuevocontacto += " <input type=\"text\" class=\"form-control\" id=\"Nombre\" placeholder=\"Nom Persona de Contacte\" name=\"Nombre\">";
	nuevocontacto += "</div>";
	nuevocontacto += "<div class=\"form-group col-md-2\">";
	nuevocontacto += "<input type=\"text\" class=\"form-control\" id=\"Cargo\" placeholder=\"Carreg\" name=\"Cargo\">" ;
	nuevocontacto += "</div>";
	nuevocontacto += "<div class=\"form-group col-md-2\">";
	nuevocontacto += "<input type=\"email\" class=\"form-control\" id=\"Telefono\" placeholder=\"TelÃƒÂ©fon\" name=\"Telefono\">";
	nuevocontacto += "</div>";
	nuevocontacto += "<div class=\"form-group col-md-4\">" ;
	nuevocontacto +=  "<input type=\"email\" class=\"form-control\" id=\"Email\" placeholder=\"Email\" name=\"Email\">";
	nuevocontacto += "</div>";
	$('#contactos').append(nuevocontacto);

	
}


function newCliente(){
	console.log("Nuevo elemento");

	console.log($('#formularioCliente'));
}

function modifyCliente(){

}
