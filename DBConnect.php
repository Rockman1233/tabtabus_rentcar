<?php

$dsn = 'mysql:dbname=rentacar;host=localhost';
$user = 'root';
$password = 'root';

try {
    Object::$db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    var_dump($e->getMessage());
}