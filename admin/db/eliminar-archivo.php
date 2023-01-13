<?php

if (isset($_GET['id']) && isset($_GET['path'])) {

    include('../../db/config.php');

    $id = $_GET['id'];
    $image_path = $_GET['path'];

    try {
        $query = "DELETE FROM archivo_ortodoncia WHERE id_archivo = " . $id;
        $db->query($query);
        unlink('../' . $image_path);
        header('location: ../examenes-clinicos.php?status=success');
    } catch (\Throwable $th) {
        // throw $th;
        header('location: ../examenes-clinicos.php?status=error');
    }
}
