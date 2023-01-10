<?php
header('Content-Type: application/json');
$pdo= new PDO("mysql:dbname=u646610080_dentista;host=localhost","root","");
//select events

$sentenciaSQL =$pdo->prepare("select * from calendario");
$sentenciaSQL->execute();
$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>