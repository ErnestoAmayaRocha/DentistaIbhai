<?php
include('../../db/config.php');

if ($_POST) {
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
    $evolucion = isset($_POST['evolucion']) ? $_POST['evolucion'] : "";
    $fk = isset($_POST['fk']) ? $_POST['fk'] : "";

    if ($fecha == '' || $evolucion = '' || $fecha == '') {
        echo 'info';
    }

    try {
        $saveEvolucion = $db->prepare("INSERT INTO evolucion (fecha, evolucion, fk_paciente) VALUES (:fecha, :evolucion, :fk) ");
        $saveEvolucion->bindParam(':fecha', $fecha);
        $saveEvolucion->bindParam(':evolucion', $evolucion);
        $saveEvolucion->bindParam(':fk', $fk);
        $saveEvolucion->execute();
        echo 'success';
    } catch (\Throwable $th) {
        throw $th;
        echo 'error';
    }
} else {
    echo 'error';
}
