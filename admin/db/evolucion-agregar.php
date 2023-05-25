<?php
include('../../db/config.php');

if ($_POST) {
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
    // $evolucion = isset($_POST['evolucion']) ? $_POST['evolucion'] : "";
    $evolucion = $_POST['evolucion'];
    $fk = isset($_POST['fk']) ? $_POST['fk'] : 1;


    if ($fecha == '' && $evolucion = '') {
        echo 'error';
    } else {
        try {
            $saveEv = $db->query("INSERT INTO evolucion (fecha, evolucion, fk_paciente) VALUES ('$fecha', '$evolucion', '$fk') ");
            echo 'success';
        } catch (\Throwable $th) {
            throw $th;
            echo 'error';
        }
    }
} else {
    echo 'error';
}
