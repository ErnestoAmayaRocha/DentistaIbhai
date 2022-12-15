<?php

include('../../db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['titulo']) || isset($_POST['subtitulo']) || isset($_POST['descripcion']) || isset($_POST['imagen'])) {

        $img_name = $_FILES['imagen']['name'];
        $img_type = $_FILES['imagen']['type'];
        $img_temp_name = $_FILES['imagen']['tmp_name'];

        if ($img_type != 'image/jpg' && $img_type != 'image/png' && $img_type != 'image/jpeg' & $img_type != 'image/gif') {
            header('location: ../agregar-noticia.php?status=file_error');
        } else {

            $img_extencion = explode('.', $img_name);
            $img_extencion = '.' . $img_extencion[1];
            $img_name = md5(uniqid($_SERVER['PHP_SELF'])) . $img_extencion;
            $route_images = '../upload/images/';

            if (!file_exists($route_images)) {
                mkdir($route_images, 0777, true);
                if (file_exists($route_images)) {
                    if (move_uploaded_file($img_temp_name, '../upload/images/' . $img_name)) {
                        $imagen_ruta = 'upload/images/' . $img_name;
                    } else {
                        $imagen_ruta = '';
                    }
                }
            } else {
                if (move_uploaded_file($img_temp_name, '../upload/images/' . $img_name)) {
                    $imagen_ruta = 'upload/images/' . $img_name;
                } else {
                    $imagen_ruta = '';
                }
            }

            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descripcion = $_POST['descripcion'];

            $query = "INSERT INTO noticias (titulo, subtitulo, descripcion, imagen_path) VALUES ('$titulo', '$subtitulo', '$descripcion', '$imagen_ruta')";
            $db->query($query);
            header('location: ../noticias.php?status=success');

            // if ($db->query($query);) {
            //     header('location: ../noticias.php?status=success');
            // } else {
            //     unlink('../' . $imagen_ruta);
            //     header('location: ../noticias.php?status=error');
            // }
        }
    } else {
        header('location: ../noticias.php?status=error');
    }
}
