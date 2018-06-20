<?php 
include "navbar.php";
if(isset($_POST['seccio'])){
//echo $_REQUEST['login'];
switch ($_POST['seccio']) {
  case 'home':
    // include "body/home.php";
    break;
  case 'ventas':
    // include "body/ventas.php";
    break;
  case 'provedores':
    // include "body/provedores.php";
    break;
  case 'login':
    include "body/login.php";
    break;
  default:
   
    // include "body/home.php";
    break;
}
}
else include ("body/home.php");

include "footer.php";
?>