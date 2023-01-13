<?php

if (isset($_GET['id']) && isset($_GET['path'])) {

    include('../../db/config.php');

    $id = $_GET['id'];
    $image_path = $_GET['path'];

    try {
        $query = "DELETE FROM odontograma WHERE id_odontograma = " . $id;
        $db->query($query);
        unlink('../' . $image_path);
        header('location: ../odontograma.php?status=success');
    } catch (\Throwable $th) {
        // throw $th;
        header('location: ../odontograma.php?status=error');
    }
}
