<?php
session_start();
include "QueriesCall.php";
if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];

    $data = json_decode(getuser($pass, $user));
    if($data->status == "OK"){
    	$_SESSION['user']= $data;

    }
}
