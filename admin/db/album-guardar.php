<?php

include('../../db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nombre']) || isset($_POST['paciente']) || isset($_POST['imagen'])) {

        $fk = trim($_POST['paciente']);
        $albumName = $_POST['nombre'];
        $images = $_FILES;
        $albumPath = md5(trim($albumName));
        $route_files = 'upload/albums/' . $albumPath . '/';

        try {
            $saveAlbum = $db->prepare("INSERT INTO album (nombre, path_name, fk_paciente) VALUES (:nombre, :path_name, :fk)");
            $saveAlbum->bindParam(':nombre', $albumName);
            $saveAlbum->bindParam(':path_name', $albumPath);
            $saveAlbum->bindParam(':fk', $fk);
            $saveAlbum->execute();
            $fk_album = $db->lastInsertId();
        } catch (\Throwable $th) {
            throw $th;
        }

        foreach ($images as $img) {
            $numImages = count($img['name']);

            for ($i = 0; $i < $numImages; $i++) {
                $file_name = $img['name'][$i];
                $file_type = $img['type'][$i];
                $file_temp_name = $img['tmp_name'][$i];

                $file_extencion = explode('.', $file_name);
                $file_extencion = '.' . $file_extencion[1];
                $file_name = md5(uniqid($file_name)) . $file_extencion;

                if (!file_exists('../' . $route_files)) {
                    mkdir('../' . $route_files, 0777, true);
                    if (file_exists('../' . $route_files)) {
                        if (move_uploaded_file($file_temp_name, '../' . $route_files . $file_name)) {
                            $file_route = $route_files . $file_name;
                        } else {
                            $file_route = '';
                        }
                    }
                } else {
                    if (move_uploaded_file($file_temp_name, '../' . $route_files . $file_name)) {
                        $file_route = $route_files . $file_name;
                    } else {
                        $file_route = '';
                    }
                }

                try {
                    $saveFile = $db->prepare("INSERT INTO album_imagen (nombre, path, fk_album) VALUES (:nombre, :path, :fk)");
                    $saveFile->bindParam(':nombre', $file_name);
                    $saveFile->bindParam(':path', $file_route);
                    $saveFile->bindParam(':fk', $fk_album);
                    $saveFile->execute();
                    header('location: ../Ortodoncia.php?status=success');
                } catch (\Throwable $th) {
                    unlink('../' . $file_route);
                    echo $th;
                    header('location: ../Ortodoncia.php?status=error');
                }
            }
        }
    } else {
        header('location: ../Ortodoncia.php?status=error');
    }
}
