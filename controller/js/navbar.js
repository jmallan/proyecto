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

  var link = $(".nav-link");
  //console.log(link);//
  $.each(link, function(index, value){
    //console.log(value.id);

  	$(value).click(function (){
     var seccioMenu = value.id;

	   $.post("vistas/main.php", {seccio: seccioMenu }, function (data, textStatus, jqXHR) {
        $("#body").html(data);
     });
    });
  })


  $("h5 > a").click(function (){
    $.post("vistas/main.php", {seccio: "personal"}, function(data, textStatus, jqXHR){
      console.log(data);
      $("#body").html(data);
    });
  });

});
