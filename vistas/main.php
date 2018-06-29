<?php       

if(isset($_POST['seccio'])){
  session_start();
  $_SESSION['seccio'] = $_POST['seccio'];
  include "../model/Queries.php";
  include "listados.php";
  switch ($_POST['seccio']) {
    case 'Home':
      
      // include "body/home.php";
      break;
    case 'Ventas':
      echo showList(getListCompleto('ventas',0), 'Ventas');
      break;
    case 'Compras':
      echo showList(getListCompleto('compras',0), 'Compras');
      //include "body/compras.php";
      break;
    case 'Clientes':
      echo showList(getListCompleto('clientes',0), 'Clientes');
      //include "body/clientes.php";
      break;
    case 'HHRR':
      echo showList(getListCompleto('hhrr',0), 'HHRR');
      //include "body/users.php";
      break;
    case 'Formularios':
      echo showList(getListCompleto('formularios',0), 'Formularios');
      //include "body/forms.php";
      break;
    case 'logout':
      session_destroy();
      header("Location: ../index.php");
      break;
    default:
      include "body/home.php";
      break;
  }
  echo "<script src=\"controller/js/listar.js\"></script>";
}
elseif(isset($_SESSION['user'])){
  include "body/home.php";
  var_dump($_SESSION['user']->data[0]->Id_usuario);
  var_dump($_SESSION['roles']);
  echo showHome(consultaFilas('home', $_SESSION['user']->data[0]->Id_usuario));
  echo "hola";
}
else{
  include ("body/login.php");
  echo "hola";
  } 

?>