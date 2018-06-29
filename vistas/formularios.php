<?php
session_start();
$seccio = $_SESSION['seccio'];
var_dump($seccio);
$id = $_POST['id'];
var_dump($id);
if($id <> ""){}
//include ("vistas/.php");