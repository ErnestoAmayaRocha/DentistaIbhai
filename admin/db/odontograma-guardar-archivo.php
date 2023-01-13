<?php

include('../../db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['nombre']) || isset($_POST['archivo']) || isset($_POST['fk'])) {

        $nombre = trim($_POST['nombre']);
        $fk = trim($_POST['fk']);

        $file_name = $_FILES['archivo']['name'];
        $file_type = $_FILES['archivo']['type'];
        $file_temp_name = $_FILES['archivo']['tmp_name'];

        $file_extencion = explode('.', $file_name);
        $file_extencion = '.' . $file_extencion[1];
        $file_name = $nombre . '_' . md5(uniqid($_SERVER['PHP_SELF'])) . $file_extencion;
        $route_files = '../upload/odontogramas/';

        if (!file_exists($route_files)) {
            mkdir($route_files, 0777, true);
            if (file_exists($route_files)) {
                if (move_uploaded_file($file_temp_name, $route_files . $file_name)) {
                    $file_route = 'upload/odontogramas/' . $file_name;
                } else {
                    $file_route = '';
                }
            }
        } else {
            if (move_uploaded_file($file_temp_name, $route_files . $file_name)) {
                $file_route = 'upload/odontogramas/' . $file_name;
            } else {
                $file_route = '';
            }
        }

        try {
            $saveFile = $db->prepare("INSERT INTO odontograma (nombre, path, fk_paciente) VALUES (:nombre, :path, :fk)");
            $saveFile->bindParam(':nombre', $nombre);
            $saveFile->bindParam(':path', $file_route);
            $saveFile->bindParam(':fk', $fk);
            $saveFile->execute();
            header('location: ../odontograma.php?status=success');
        } catch (\Throwable $th) {
            unlink('../' . $file_route);
            echo $th;
            header('location: ../odontograma.php?status=error');
        }
    } else {
        header('location: ../odontograma.php?status=error');
    }
}
