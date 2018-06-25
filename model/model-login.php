<?php
include "Queries18.06.21.php";
if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];

    $_SESSION['user'] = getuser($pass, $user);
   //  var_dump($_SESSION['user']);

}
