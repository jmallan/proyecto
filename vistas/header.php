<?php
include "jumbotron.php";
include "model/Queries.php";
$user = $_SESSION['user']->data[0]->User;
echo showJumbotron($user);
