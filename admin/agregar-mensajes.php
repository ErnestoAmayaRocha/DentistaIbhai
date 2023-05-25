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

                    <h1 class="h1 mb-3 fw-bolder">Registrar Mensaje</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Mensajes</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-secondary col-md-3" href="mensajes.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <div class="row d-flex justify-content-center">
                                                <div class="form-group col-md-9 my-3">
                                                    <label for="asunto" class="form-label fw-bold">Mensaje</label>
                                                    <input type="text" class="form-control" name="asunto" placeholder="Mensaje" required />
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

    <?php

    include('../db/config.php');

    if ($_POST) {

        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
       

        if ($asunto == '' || $mensaje = '' ) { ?>
            <script>
                Swal.fire(
                    'Error',
                    'Completa todos los campos',
                    'warning'
                )
            </script>
            <?php
        } else {

            try {

                $doc = $db->prepare('INSERT INTO mensajes (asunto, mensaje) VALUES (:asunto, :mensaje)');
                $doc->bindParam(':asunto', $asunto);
                $doc->bindParam(':mensaje', $mensaje);
               
                $doc->execute();
            } catch (\Throwable $th) {
                echo $th;
            ?>
                <script>
                    window.location.href = "mensajes.php?status=error";
                </script>
            <?php
            }
            ?>
            <script>
                window.location.href = "mensajes.php?status=success"
            </script>
    <?php
        }
    }
    ?>
    <?php include '../components/swal.php' ?>

</body>

</html>