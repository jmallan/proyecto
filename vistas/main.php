<?php 
if(isset($_GET['logout'])){
  session_start();
  session_destroy();
  header("Location: ../index.php");
}
if(isset($_POST['seccio'])){
//echo $_REQUEST['login'];
  switch ($_POST['seccio']) {
    case 'home':
      // include "body/home.php";
      break;
    case 'ventas':
      // include "body/ventas.php";
      break;
    case 'proyectos':
      // include "body/proyectos.php";
      break;
    case 'compras':
      //include "body/compras.php";
      break;
    case 'clientes':
      //include "body/clientes.php";
      break;
    case 'ctrl-usuarios':
      //include "body/users.php";
      break;
    case 'forms':
      //include "body/forms.php";
      break;
    case 'logout':
      session_start();
      session_destroy();
      header("Location: ../index.php");
      break;
    default:
      include "body/home.php";
      break;
  }
}
elseif(isset($_SESSION['user'])){
  include "body/home.php";
}
else{
  include ("body/login.php");
} 

?>