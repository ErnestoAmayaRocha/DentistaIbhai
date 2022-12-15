<?php

if (isset($_GET['id'])) {

    include('../../db/config.php');

    $id = $_GET['id'];

    try {
        $query = "DELETE FROM fraccionamiento WHERE id_fraccionamiento = " . $id;
        $db->query($query);
        echo 'success';
        // header('Location: ../bitacora.php?status=success');
    } catch (\Throwable $th) {
        echo 'error';
    }
}
