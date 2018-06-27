$( document ).ready(function() {
    $('tr').on('click',showElemento);
    $('button[name=nuevo]').on('click',newElemento);
});

function showElemento(){
	id = $(this).attr('id');
	console.log(id);
	
}
function newElemento(){
	console.log("Nuevo elemento");
}