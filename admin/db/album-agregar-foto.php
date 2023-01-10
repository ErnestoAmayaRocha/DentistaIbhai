<?php

include('../../db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fk = $_POST['fk'];
    $albumPath = $_POST['path'];

    $file_name = $_FILES['archivo']['name'];
    $file_type = $_FILES['archivo']['type'];
    $file_temp_name = $_FILES['archivo']['tmp_name'];

    $file_extencion = explode('.', $file_name);
    $file_extencion = '.' . $file_extencion[1];
    $file_name = md5(uniqid($file_name)) . $file_extencion;

    if ($file_type != 'image/jpg' && $file_type != 'image/png' && $file_type != 'image/jpeg' & $file_type != 'image/gif') {
        header('location: ../agregar-imagen-album.php?id=' . $fk . '&status=file_error');
    }

    $route_files = '../upload/albums/' . $albumPath . '/';

    if (!file_exists($route_files)) {
        mkdir($route_files, 0777, true);
        if (file_exists($route_files)) {
            if (move_uploaded_file($file_temp_name, $route_files . $file_name)) {
                $file_route = 'upload/albums/' . $albumPath . '/' . $file_name;
            } else {
                $file_route = '';
            }
        }
    } else {
        if (move_uploaded_file($file_temp_name, $route_files . $file_name)) {
            $file_route = 'upload/albums/' . $albumPath . '/' . $file_name;
        } else {
            $file_route = '';
        }
    }

    try {
        $saveFile = $db->prepare("INSERT INTO album_imagen (nombre, path, fk_album) VALUES (:nombre, :path, :fk)");
        $saveFile->bindParam(':nombre', $file_name);
        $saveFile->bindParam(':path', $file_route);
        $saveFile->bindParam(':fk', $fk);
        $saveFile->execute();
        header('location: ../agregar-imagen-album.php?id=' . $fk . '&status=success');
    } catch (\Throwable $th) {
        unlink('../' . $file_route);
        echo $th;
        header('location: ../agregar-imagen-album.php?id=' . $fk . '&status=error');
    }
}
