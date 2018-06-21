$(document).ready(function () {
  $("#form-login").click(function () { 
    $.post("vistas/main.php", {seccio: "login"},
      function (data, textStatus, jqXHR) {
        $("#body").html(data);
        $('#login').on('click',loginUser);
      }
    );
    
  });
// $('#login').click(loginUser);


});

function loginUser(){
  $("#formularioLogin").submit(function (e) { 
    e.preventDefault();
    var user = $(this.username).val();
    var pass = $(this.psw).val();
    $.ajax({
      type: "post",
      url: "model/model-login.php",
      data: {"user": user, "pass": pass},
      dataType: "json",
      success: function (response) {
        console.log(response);
      }
    });
  });
/ Funcion que logueara al usuario /
}
