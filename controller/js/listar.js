$( document ).ready(function() {
    $('tr').on('click',showElemento);
    $('button[name=nuevo]').on('click',newElemento);
});

function showElemento(){
	var idReg = $(this).attr('id');
	$.post("vistas/formularios.php", {id: idReg}, function (data){
		 $("#body").html(data);
	});
	
}
function newElemento(){
	var idReg = "";
	$.post("vistas/formularios.php", {id: idReg}, function (data){
		 $("#body").html(data);
	});
	console.log("Nuevo elemento");
}