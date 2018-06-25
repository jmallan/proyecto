$(document).ready(function () {
$('#login').on("click",loginUser);
});

function loginUser(){
  var user = $("#username").val();
  var pass = $("#psw").val();
    $.ajax({
      type: "post",
      url: "model/model-login.php",
      data: {"user": user, "pass": pass},
      dataType: "json",
      success: function (response) {

         if (response.status == "OK") {
           window.location.replace("../../index.php");
         } 
      }
    });
// / Funcion que logueara al usuario /
}
