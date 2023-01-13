<?php

include('./db/session-validate.php');
include('../db/config.php');

$pacientes = $db->query("SELECT * FROM pacientes");
$pacientes->execute();
$pacientes = $pacientes->fetchAll(PDO::FETCH_ASSOC);


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

    <title>IBHAI</title>

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

                    <h1 class="h1 mb-3 fw-bolder">Crear Álbum</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Crear un nuevo álbum de fotos</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <button class="btn btn-info col-md-3" onclick="addImg()">Añadir Imagen</button>
                                        <a class="btn btn-secondary col-md-3 mx-2" href="Ortodoncia.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="./db/album-guardar.php" method="POST" enctype="multipart/form-data">
                                            <div class="row d-flex justify-content-center">
                                                <div class="form-group col-md-6 9 my-3">
                                                    <label for="paciente" class="form-label fw-bold">Paciente</label>
                                                    <select class='form-control' name="paciente" id="paciente">
                                                        <option disabled selected>Selecciona una opción</option>
                                                        <?php
                                                        foreach ($pacientes as $paciente) { ?>
                                                            <option value="<?php echo $paciente['id'] ?>"><?php echo $paciente['nombre'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="nombre" class="form-label fw-bold">Nombre del Álbum</label>
                                                    <input type="text" class="form-control" name="nombre" placeholder="Ej. Progreso ortodoncia" required />
                                                </div>
                                                <div id="images">
                                                    <div class="form-group col-md-12 my-3">
                                                        <label for="imagen-1" class="form-label fw-bold">Imagen 1</label>
                                                        <input type="file" id="imagen-1" class="form-control" name="imagen[]" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pt-3">
                                                    <button class="btn btn-primary form-control my-3" type="submit">Guardar</button>
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

    <script>
        let i = 1;
        const addImg = () => {
            let images = document.getElementById('images');
            i++;

            if (i > 20) {
                alert('Limite de imagenes excedido');
            } else {
                images.innerHTML += `<div class="form-group col-md-12 my-3">
                                        <label for="imagen-${i}" class="form-label fw-bold">Imagen ${i} </label>
                                        <input type="file" id="imagen-${i}" class="form-control" name="imagen[]" required />
                                    </div>`;
            }


        }
    </script>

</body>

</html>