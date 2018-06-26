$(document).ready(function () {
  $("#form-login").click(function () { 
    $.post("vistas/main.php", {seccio: "login"},
      function (data, textStatus, jqXHR) {
        $("#body").html(data);
      }
    );


  });

  $("#logout").click(function(){
    $.post("vistas/main.php", {seccio: "logout"}, function(data,textStatus,jqXHR){
  
    });
  });

  $enllaços = $(".nav-link");
  $.each($enllaços, function(index, value){

  	$(value).click(function (){
	$.post("vistas/main.php", {seccio: "\""+value}+"\"", function (data, textStatus, jqXHR) {
    $("#body").html(data);
  });
   });
  })
 
});