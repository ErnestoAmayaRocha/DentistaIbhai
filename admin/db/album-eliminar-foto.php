<?php

if (isset($_GET['id'])) {

    include('../../db/config.php');

    $id = $_GET['id'];

    try {
        $query = "DELETE FROM album_imagen WHERE id_imagen = " . $id;
        $db->query($query);
        echo 'success';
    } catch (\Throwable $th) {
        echo 'error';
    }
}
