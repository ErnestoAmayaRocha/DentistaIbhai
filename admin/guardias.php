<?php

include('./db/session-validate.php');
include('../db/config.php');

$fk_fraccionamiento = isset($_GET['fk_fraccionamiento']) ? $_GET['fk_fraccionamiento'] : "";
$fk_fraccionamiento == '' && header('Location: bitacora.php');

$guardias = $db->prepare("SELECT * FROM guardias WHERE fk_fraccionamiento = :fk");
$guardias->bindParam(':fk', $fk_fraccionamiento);
$guardias->execute();
$countGuardias = $guardias->rowCount();

$fracc = $db->query("SELECT nombre FROM fraccionamiento WHERE id_fraccionamiento = '$fk_fraccionamiento'");
$nombre_fracc = $fracc->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../assets/img/logo_DMSP.png" />

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

                    <h1 class="h1 mb-3 fw-bolder">Guardias</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Guardias del fraccionamiento <?php echo $nombre_fracc[0]['nombre'] ?> </h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <!-- <a class="btn btn-primary col-md-2 mx-1" href="agregar-guardia.php">Agregar</a> -->
                                        <a class="btn btn-secondary col-md-2" href="bitacora.php">Regresar</a>
                                    </div>
                                </div>

                                <?php
                                if ($countGuardias > 0) { ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover my-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th class="d-none d-xl-table-cell">Dirección</th>
                                                    <th class="d-none d-xl-table-cell">Teléfono</th>
                                                    <th>Antecedentes</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($guardias as $row) { ?>
                                                    <tr>
                                                        <td> <?php echo $i++ ?> </td>
                                                        <td> <?php echo $row['nombre'] ?> </td>
                                                        <td> <?php echo $row['direccion'] ?> </td>
                                                        <td> <?php echo $row['telefono'] ?> </td>
                                                        <td> <?php echo $row['antecedentes'] ?> </td>
                                                        <td> <button class="btn btn-danger">Eliminar</button> </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="my-5 alert alert-info text-center">No hay datos por mostrar</div>
                                <?php
                                }
                                ?>


                            </div>
                        </div>

                    </div>
                </div>
            </main>

        </div>
    </div>

    <script src="./assets/js/app.js"></script>

</body>

</html>