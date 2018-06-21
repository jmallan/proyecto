<?php
if(isset($_REQUEST['user'])){
  $user = $_REQUEST['user'];
  $pass = $_REQUEST['pass'];
  getLogin($user, $pass);
}


function getLogin($user, $pass){
  $data = array("user" => $user, "pass" => $pass);
  $result =array("status" => "success", "data" => $data);
  echo json_encode($result);
}