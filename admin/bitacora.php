<?php

include('./db/session-validate.php');
include('../db/config.php');

$fraccionamientos = $db->query("SELECT * FROM fraccionamiento");
$countFracc = $fraccionamientos->rowCount();

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

                    <h1 class="h1 mb-3 fw-bolder">Bitácora Digital</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Información general</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-primary col-md-3" href="agregar-fraccionamiento.php">Agregar</a>
                                    </div>
                                </div>

                                <?php
                                if ($countFracc > 0) { ?>
                                    <div class="table-responsive">
                                        <table id="dTable" class="table table-hover my-0">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fraccionamiento</th>
                                                    <th class="d-none d-xl-table-cell">Dirección</th>
                                                    <th class="d-none d-xl-table-cell">Teléfono</th>
                                                    <th class="text-center">Incidentes</th>
                                                    <th class="d-none d-md-table-cell">No. Guardias</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php
                                                $i = 1;
                                                foreach ($fraccionamientos as $fracc) { ?>
                                                    <tr>
                                                        <td> <?php echo $i++ ?> </td>
                                                        <td> <?php echo $fracc['nombre'] ?> </td>
                                                        <td> <?php echo $fracc['direccion'] ?> </td>
                                                        <td> <?php echo $fracc['telefono'] ?> </td>
                                                        <td> <?php echo $fracc['celular'] ?> </td>
                                                        <td> <a href="guardias.php?fk_fraccionamiento=<?php echo $fracc['id_fraccionamiento'] ?>"> <?php echo $fracc['num_guardias'] ?></a> </td>
                                                        <td>
                                                            <a class="btn btn-warning" href="editar-fraccionamiento.php?fk=<?php echo $fracc['id_fraccionamiento'] ?>">Editar</a>
                                                            <button class="btn btn-danger" onclick="deleteFracc(<?php echo $fracc['id_fraccionamiento'] ?>)">Eliminar</button>
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <?php include('../components/swal.php') ?>
    <!-- <?php include('./components/datatable.php') ?> -->

    <script>
        const deleteFracc = (id) => {
            Swal.fire({
                title: '¿Estás seguro de eliminar?',
                text: "Esta acción no se puede deshacer. Y se eliminarán todos los registros relacionadosa este.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancelar",
                confirmButtonText: '¡Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // window.location.href = './db/fracc-eliminar.php?id='.id;
                    $.get(`./db/fracc-eliminar.php?id=${id}`, function(status) {
                        if (status == 'success') {
                            Swal.fire(
                                'Operación Realizada',
                                '',
                                'success'
                            )
                            location.reload();
                        } else {
                            Swal.fire(
                                'Error',
                                'Ha ocurrido un error al realizar la operación',
                                'error'
                            )
                        }
                    });
                }
            })
        }
    </script>



</body>

</html>