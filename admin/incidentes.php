<?php

include('./db/session-validate.php');
include('../db/config.php');

$incidentes = $db->query("SELECT * FROM reportes WHERE rondin = 1");
$countInc = $incidentes->rowCount();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

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

                    <h1 class="h1 mb-3 fw-bolder">Incidentes</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Registro de incidentes</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <!-- <a class="btn btn-primary col-md-3" href="agregar-fraccionamiento.php">Agregar</a> -->
                                    </div>
                                </div>

                                <?php
                                if ($countInc > 0) { ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover my-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fraccionamiento</th>
                                                    <th class="d-none d-xl-table-cell">Fecha de Incidente</th>
                                                    <th class="d-none d-xl-table-cell">Incidente</th>
                                                    <th class="d-none d-xl-table-cell">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($incidentes as $row) {
                                                    $fracc = $db->prepare("SELECT * FROM fraccionamiento WHERE id_fraccionamiento = :fk");
                                                    $fracc->bindParam(':fk', $row['fk_fraccionamiento']);
                                                    $fracc->execute();
                                                    $nombre_fracc = $fracc->fetchAll(PDO::FETCH_ASSOC);
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $i++ ?> </td>
                                                        <td> <?php echo $nombre_fracc[0]['nombre'] ?> </td>
                                                        <td> <?php echo $row['created_at'] ?> </td>
                                                        <td> <?php echo $row['incidente'] ?> </td>
                                                        <td>
                                                            <button class="btn btn-primary">PDF</button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="alert alert-info text-center">No hay datos por mostrar</div>
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