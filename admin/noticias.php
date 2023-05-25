<?php

include('./db/session-validate.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../assets/img/logo_DMSP.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Administración | IBHAI</title>

    <link href="./assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php include './components/sidebar.php' ?>

        <div class="main">

            <?php include './components/navbar.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h1 mb-3 fw-bolder">Noticias</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Historial de noticias</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-primary col-md-3" href="agregar-noticia.php">Agregar</a>
                                    </div>
                                </div>
                                <?php
                                include('../db/config.php');

                                $noticias = $db->query("SELECT * FROM noticias ORDER BY fecha DESC");
                                $countNoticias = $noticias->rowCount();

                                if ($countNoticias > 0) {
                                    $i = 1;
                                ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover my-0 table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Título</th>
                                                    <th class="d-none d-xl-table-cell">Subtítulo</th>
                                                    <th class="d-none d-xl-table-cell">Descripción</th>
                                                    <th class="d-none d-xl-table-cell">Fecha de creación</th>
                                                    <th>Imagen</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($noticias as $noticia) { ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $noticia['titulo'] ?></td>
                                                        <td class="d-none d-xl-table-cell"><?php echo $noticia['subtitulo'] ?></td>
                                                        <td><span class="text-truncate"> <?php echo $noticia['descripcion'] ?> </span></td>
                                                        <td class="d-none d-xl-table-cell"><?php echo $noticia['fecha'] ?></td>
                                                        <td class="d-none d-xl-table-cell w-25"> <img src="./<?php echo $noticia['imagen_path'] ?>" width="100"></td>
                                                        <td class="d-none d-md-table-cell">
                                                            <!-- <button class="btn btn-warning">Editar</button> -->
                                                            <a class="btn btn-danger" href="<?php echo './db/noticia-eliminar.php?id=' . $noticia['id_noticia'] . '&img=' . $noticia['imagen_path'] ?>">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else { ?>

                                                <div class="text-center py-5">
                                                    No hay información para mostrar
                                                </div>

                                            <?php
                                            }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="./assets/js/app.js"></script>
    <?php include('../components/swal.php') ?>


</body>

</html>