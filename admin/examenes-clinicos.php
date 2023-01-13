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

    <title>Examenes Cínicos | IBHAI</title>

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

                    <h1 class="h1 mb-3 fw-bolder">Examenes Cínicos</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Información guardada</h5>
                                    </div>
                                </div>
                                <?php
                                include('../db/config.php');

                                $odonto = $db->query("SELECT *, pacientes.nombre AS nameP, archivo_ortodoncia.nombre AS oName FROM archivo_ortodoncia INNER JOIN pacientes ON archivo_ortodoncia.fk_paciente = pacientes.id ORDER BY created_at DESC");
                                $countOdonto = $odonto->rowCount();

                                if ($countOdonto > 0) {
                                    $i = 1;
                                ?>
                                    <div class="table-responsive text-center">
                                        <table class="table table-hover my-0 table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Paciente</th>
                                                    <th>Nombre del archivo</th>
                                                    <th class="d-none d-xl-table-cell">Fecha de creación</th>
                                                    <th class="d-none d-xl-table-cell">Archivo</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($odonto as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $row['nameP'] ?></td>
                                                        <td><?php echo $row['oName'] ?></td>
                                                        <td> <?php echo strftime("%Y-%m-%d", strtotime($row['created_at'])) ?> </td>
                                                        <td class="d-none d-xl-table-cell w-25"> <a class="btn btn-sm btn-primary" target="_blank" href="./<?php echo $row['path'] ?>">Ver Arcivo</a></td>
                                                        <td class="d-none d-md-table-cell">
                                                            <a class="btn btn-danger" href="<?php echo './db/eliminar-archivo.php?id=' . $row['id_archivo'] . '&path=' . $row['path'] ?>">Eliminar</a>
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