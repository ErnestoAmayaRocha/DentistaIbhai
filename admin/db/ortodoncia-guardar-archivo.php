<?php

include('../../db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nombre']) || isset($_POST['archivo'])) {

        $nombre = trim($_POST['nombre']);

        $file_name = $_FILES['archivo']['name'];
        $file_type = $_FILES['archivo']['type'];
        $file_temp_name = $_FILES['archivo']['tmp_name'];

        $file_extencion = explode('.', $file_name);
        $file_extencion = '.' . $file_extencion[1];
        $file_name = $nombre . '_' . md5(uniqid($_SERVER['PHP_SELF'])) . $file_extencion;
        $route_files = '../upload/archivos_ortodoncia/';

        if (!file_exists($route_files)) {
            mkdir($route_files, 0777, true);
            if (file_exists($route_files)) {
                if (move_uploaded_file($file_temp_name, $route_files . $file_name)) {
                    $file_route = 'upload/archivos_ortodoncia/' . $file_name;
                } else {
                    $file_route = '';
                }
            }
        } else {
            if (move_uploaded_file($file_temp_name, $route_files . $file_name)) {
                $file_route = 'upload/archivos_ortodoncia/' . $file_name;
            } else {
                $file_route = '';
            }
        }

        try {
            $saveFile = $db->prepare("INSERT INTO archivo_ortodoncia (nombre, path) VALUES (:nombre, :path)");
            $saveFile->bindParam(':nombre', $nombre);
            $saveFile->bindParam(':path', $file_route);
            $saveFile->execute();
            header('location: ../Ortodoncia.php?status=success');
        } catch (\Throwable $th) {
            unlink('../' . $file_route);
            echo $th;
            header('location: ../Ortodoncia.php?status=error');
        }
    } else {
        header('location: ../Ortodoncia.php?status=error');
    }
}
