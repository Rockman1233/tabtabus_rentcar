<?php

ini_set('display_errors', 0);
error_reporting(E_ALL);
session_start(); //для авторизашки

include('components/route.php');

$router = new Route();
$router->start();

