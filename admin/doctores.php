<?php

include('./db/session-validate.php');
include('../db/config.php');

$reportes = $db->query("SELECT * FROM doctores");
$countReportes = $reportes->rowCount();

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

                    <h1 class="h1 mb-3 fw-bolder">Doctores</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Registro de doctores</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-primary col-md-3" href="agregar-doctor.php">Agregar</a>
                                    </div>
                                </div>

                                <?php
                                if ($countReportes > 0) { ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover my-0 text-center">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Dia</th>
                                                    <th>Mes</th>
                                                    <th>Año</th>
                                                    <th>Fraccionamiento</th>
                                                    <th>Visitas</th>
                                                    <th>Patrulla</th>
                                                    <th>Responsable</th>
                                                    <th>Incidente</th>
                                                    <th>Archivo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($reportes as $fracc) { ?>
                                                    <tr>
                                                        <td> <?php echo $i++ ?> </td>
                                                        <td> <?php echo strftime("%d", strtotime($fracc['created_at'])) ?> </td>
                                                        <td> <?php echo ucfirst(strftime("%B", strtotime($fracc['created_at']))) ?> </td>
                                                        <td> <?php echo strftime("%Y", strtotime($fracc['created_at'])) ?> </td>
                                                        <td> <?php echo $fracc['fraccionamiento'] ?> </td>
                                                        <td> <?php echo 3 ?> </td>
                                                        <td> <?php echo $fracc['clave_guardia'] ?> </td>
                                                        <td> <?php echo $fracc['guardia'] ?> </td>
                                                        <td> <?php echo $fracc['rondin'] != 1 ? 'Sin Incidentes' : "<a href='info-reporte.php?id=" . $fracc['id_reporte'] . "' class='btn btn-warning'>Ver Incidente</a>" ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary" href="./pdf/reportePDF.php" target="_blank">PDF</a>
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