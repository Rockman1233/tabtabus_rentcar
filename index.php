<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('components/route.php');

$router = new Route();
$router->start();

