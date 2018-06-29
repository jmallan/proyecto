<?php
include "jumbotron.php";
include "model/QueriesCall.php";
$user = $_SESSION['user']->data[0]->User;
echo showJumbotron($user);
