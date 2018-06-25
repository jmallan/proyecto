<?php
session_start();
include "Queries.php";
if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];

    $_SESSION['user'] = json_decode(getuser($pass, $user));
   // print_r($_SESSION['user']);
}
