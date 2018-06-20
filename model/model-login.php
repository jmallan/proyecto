<?php

$data = array("user" => "skeleton", "pass" =>"1234");
$result =array("status" => "success", "data" => $data);
echo json_encode($result);