<?php

if (isset($_GET['id'])) {

    include('../../db/config.php');

    $id = $_GET['id'];

    try {
        $query = "DELETE FROM pacientes WHERE id = " . $id;
        $db->query($query);
        echo 'success';
    } catch (\Throwable $th) {
        echo 'error';
    }
}
