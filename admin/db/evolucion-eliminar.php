<?php

include('../../db/config.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id == '') {
    echo 'error';
} else {
    try {
        $query = "DELETE FROM evolucion WHERE id_evolucion = " . $id;
        $db->query($query);
        echo 'success';
    } catch (\Throwable $th) {
        echo 'error';
    }
}
