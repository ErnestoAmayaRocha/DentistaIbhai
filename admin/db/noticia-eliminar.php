<?php

if (isset($_GET['id']) && isset($_GET['img'])) {

    include('../../db/config.php');

    $id_noticia = $_GET['id'];
    $image_path = $_GET['img'];

    $query = "DELETE FROM noticias WHERE id_noticia = " . $id_noticia;
    $db->query($query);
    unlink('../' . $image_path);

    header('location: ../noticias.php?status=success');
}
