<?php       
  include "functions.php";
if(isset($_POST['seccio'])){
  session_start();
  $_SESSION['seccio'] = $_POST['seccio'];
  include "../model/QueriesCall.php";
  include "listados.php";

  switch ($_POST['seccio']) {
    case 'Home':
      include "body/home.php";
      $id = (int)$_SESSION['user']->data[0]->Id_usuario; 
      echo showHome(consultaFilas('home', $id));
      break;
    case 'Ventas':
      echo showList(getListCompleto($_SESSION['seccio'],0), $_SESSION['seccio']);
      break;
    case 'Compras':
      echo showList(getListCompleto($_SESSION['seccio'],0), $_SESSION['seccio']);
      //include "body/compras.php";
      break;
    case 'Clientes':
      echo showList(getListCompleto($_SESSION['seccio'],0), $_SESSION['seccio']);
      //include "body/clientes.php";
      break;

    case 'Usuaris':
      echo showList(getListCompleto($_SESSION['seccio'],0), $_SESSION['seccio']);
      //include "body/users.php";
      break;
    case 'Formularios':
      echo showList(getListCompleto($_SESSION['seccio'],0), $_SESSION['seccio']);
      //include "body/forms.php";
      break;
    case 'personal':
      include ("Upersonal.php");
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
// elseif(isset($_SESSION['user'])){
//   include "body/home.php";
//   var_dump($_SESSION['user']->data[0]->Id_usuario);
//   var_dump($_SESSION['roles']);
//   echo showHome(consultaFilas('home', $_SESSION['user']->data[0]->Id_usuario));
//   echo "hola";
// }
else{
  include "body/home.php";
  $id = (int)$_SESSION['user']->data[0]->Id_usuario; 
  echo showHome(consultaFilas('home', $id)); //$_SESSION['user']->data[0]->Id_usuario));
  } 

?>