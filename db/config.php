<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, "spanish");

$server = "localhost";
$user = "u646610080_dentista";
$password = "Dentistaibai1";
 $db_name = "u646610080_dentista";
//$db_name = "dentista";

// $user = "dmsp";
// $password = "Nouammiavfz)";
// $db_name = "dmsp";

$DB_server = "mysql:dbname=" . $db_name . ";host=" . $server;

try {
    $db = new PDO(
        $DB_server,
        $user,
        $password,
        array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $e) {
    throw $e;
}