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

    <title>Odontograma | IBHAI</title>

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

                    <h1 class="h1 mb-3 fw-bolder">Agregar Odontograma</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill p-5">
                                <form method="POST" action="./db/odontograma-guardar-archivo.php" enctype="multipart/form-data">
                                    <div class="row d-flex">
                                        <div class="form-group col-md-12 mb-4">
                                            <label for="paciente" class="form-label fw-bold">Paciente</label>
                                            <select class='form-control' name="fk" id="fk" required>
                                                <option value="" disabled selected>Selecciona una opción</option>
                                                <?php
                                                foreach ($pacientes as $paciente) { ?>
                                                    <option value="<?php echo $paciente['id'] ?>"><?php echo $paciente['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class='fw-bolder mb-2' for="archivo">Nombre del archivo</label>
                                            <input type="text" name="nombre" id="nombre" placeholder="Nombre del archivo" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class='fw-bolder mb-2' for="archivo">Archivo</label>
                                            <input type="file" name="archivo" id="archivo" class="form-control" required>
                                        </div>
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-sm-4">
                                                <input type="submit" value="Guardar" class="btn btn-success form-control mt-4">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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