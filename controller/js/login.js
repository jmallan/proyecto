$(document).ready(function () {
$('#login').on("click",loginUser);
});

function loginUser(){
  var user = $("#username").val();
  var pass = $("#psw").val();
  console.log(pass);
  $("#formularioLogin").submit(function (e) { 
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "model/model-login.php",
      data: {"user": user, "pass": pass},
      dataType: "json",
      success: function (response) {
        console.log(response.data);
      }
    });
  });
/ Funcion que logueara al usuario /
}
