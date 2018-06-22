<?php
include "Queries18.06.21.php";
if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];

    getuser($pass, $user);
}
