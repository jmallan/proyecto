<?php       

if(isset($_POST['seccio'])){
  session_start();
  include "../model/Queries.php";
  switch ($_POST['seccio']) {
    case 'Home':
      // include "body/home.php";
      break;
    case 'Ventas':
      echo "<p>Hola</p>";

      break;
    case 'Proyectos':
      // include "body/proyectos.php";
      break;
    case 'Compras':
    var_dump(getListCompleto('compras'));
      //include "body/compras.php";
      break;
    case 'Clientes':
    var_dump(getListCompleto('Clientes',0));
      //include "body/clientes.php";
      break;
    case 'HHRR':
      var_dump(getListCompleto('HHRR',0));
      //include "body/users.php";
      break;
    case 'Formularios':

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
}
elseif(isset($_SESSION['user'])){
  include "body/home.php";
  echo "hola";
}
else{
  include ("body/login.php");
  echo "hola";
  } 

?>