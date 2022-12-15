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

    <title>Adminisración | DMSP</title>

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

                    <h1 class="h1 mb-3 fw-bolder">Agregar Noticia</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Subir una noticia</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-secondary col-md-3" href="noticias.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="./db/noticia-agregar.php" method="POST" enctype="multipart/form-data">
                                            <div class="row d-flex justify-content-center">
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="titulo" class="form-label fw-bold">Título *</label>
                                                    <input type="text" class="form-control" name="titulo" placeholder="Título de la publicación" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="subtitulo" class="form-label fw-bold">Subtítulo</label>
                                                    <input type="text" class="form-control" name="subtitulo" placeholder="Subtítulo de la publicación (opcional)" />
                                                </div>
                                                <div class="form-group col-md-12 my-3">
                                                    <label for="subtitulo" class="form-label fw-bold">Descripción *</label>
                                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Subtítulo de la publicación" required></textarea>
                                                </div>
                                                <div class="form-group col-md-12 my-3">
                                                    <label for="imagen" class="form-label fw-bold">Imagen *</label>
                                                    <input type="file" class="form-control" name="imagen" required />
                                                </div>
                                                <div class="col-md-6 pt-3">
                                                    <button class="btn btn-primary form-control my-3">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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