<?php
header('Content-Type: application/json');
$pdo = new PDO("mysql:dbname=u646610080_dentista;host=localhost", "root", "");
//select events
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';
switch ($accion) {
    case 'agregar':
        $sentenciaSQL = $pdo->prepare("INSERT INTO `calendario` (`id`, `title`, `paciente`, `doctor`,`descripcion`,`start`, `end`,`color`,`textColor`,`fecha`) VALUES (NULL, :title, :paciente ,:doctor,:descripcion,:start,:end,:color,:textcolor,:fecha)");
        $respuesta =  $sentenciaSQL->execute(array(
            "title" => "title",
            "paciente" => "paciente",
            "doctor" => "doctor",
            "descripcion" => "descripcion",
            "start" => '2023-01-12 00:09:59',
            "end" => '2023-01-12 00:09:59',
            "color" => '#ff0000',
            "textcolor" => '#ff0001',
            "fecha"=> '2023-01-12 00'
        ));

        break;
    case 'eliminar':
        echo "accion eliminar";
        break;
    case 'modificar':
        echo "accion modificar";
        break;
    default:
        $sentenciaSQL = $pdo->prepare("select * from calendario");
        $sentenciaSQL->execute();
        $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;
}
