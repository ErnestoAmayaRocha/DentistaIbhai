<?php

include('./db/session-validate.php');
include('../db/config.php');

$doctoes = $db->query("SELECT * FROM mensajes");
$countDoctores = $doctoes->rowCount();

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

                    <h1 class="h1 mb-3 fw-bolder">Mensajes</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Registro de mensajes</h5>
                                    </div>
                                    
                                </div>

                                <?php
                                if ($countDoctores > 0) { ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover my-0 text-center">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Asunto</th>
                                                   
                                                     <th>Acciones</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($doctoes as $doc) { ?>
                                                    <tr>
                                                        <td> <?php echo $i++ ?> </td>
                                                        <td> <?php echo $doc['asunto'] ?> </td>
                                                       
                                                      
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" onclick="eliminarDoc(<?php echo $doc['id'] ?>)">Eliminar</button>
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
                                    <div class="alert alert-info text-center pt-5 pb-4">No hay datos por mostrar</div>
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

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="./assets/js/app.js"></script>
    <?php include '../components/swal.php' ?>

    <script>
        const eliminarDoc = (id) => {
            $.get("db/mensaje-eliminar.php", {
                id
            }, function(data) {
                Swal.fire(
                    '',
                    '',
                    data
                )
                setTimeout(function() {
                    window.location.reload();
                }, 2000);

            });
        }
    </script>


</body>

</html>