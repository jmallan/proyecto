$(document).ready(function () {
  $("#form-login").click(function () { 
    $.post("vistas/main.php", {seccio: "login"},
      function (data, textStatus, jqXHR) {
        $("#body").html(data);
        $('#login').click(loginUser);
      }
    );
    
  });
});