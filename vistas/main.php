<?php       

if(isset($_POST['seccio'])){
  session_start();
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
      //include "body/compras.php";
      break;
    case 'Clientes':
      //include "body/clientes.php";
      break;
    case 'HHRR':
    echo "HOLA";
      //include "body/users.php";
      break;
    case 'Formularios':

    print_r($_SESSION['roles']);
    echo "SON FORMS";
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