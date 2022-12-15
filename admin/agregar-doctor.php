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

                    <h1 class="h1 mb-3 fw-bolder">Registrar Doctor</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Información del Doctor</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-secondary col-md-3" href="doctores.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <div class="row d-flex justify-content-center">
                                                <div class="form-group col-md-9 my-3">
                                                    <label for="nombre" class="form-label fw-bold">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del doctor" required />
                                                </div>
                                                <div class="form-group col-md-3 my-3">
                                                    <label for="edad" class="form-label fw-bold">Edad</label>
                                                    <input type="number" class="form-control" name="edad" placeholder="Edad del doctor" required />
                                                </div>
                                                <div class="form-group col-md-4 my-3">
                                                    <label for="direccion" class="form-label fw-bold">Dirección</label>
                                                    <input type="text" class="form-control" name="direccion" placeholder="Ej. Calle #123" required />
                                                </div>
                                                <div class="form-group col-md-4 my-3">
                                                    <label for="correo" class="form-label fw-bold">Correo</label>
                                                    <input type="email" class="form-control" name="correo" placeholder="Ej. correo@ejemplo.com" required />
                                                </div>
                                                <div class="form-group col-md-4 my-3">
                                                    <label for="telefono" class="form-label fw-bold">Teléfono</label>
                                                    <input type="tel" class="form-control" name="telefono" placeholder="Ej. 000-000-000" maxlength="12" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="especialidad" class="form-label fw-bold">Especialidad</label>
                                                    <input type="text" class="form-control" name="especialidad" placeholder="Especialidad del doctor" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="cedula" class="form-label fw-bold">Cédula Profesional</label>
                                                    <input type="text" class="form-control" name="cedula" placeholder="Ingrese cédula profesional" required />
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

        echo $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        echo '<br />';
        echo $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
        echo $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
        echo '<br />';
        echo $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
        echo '<br />';
        echo $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
        echo '<br />';
        echo $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : "";
        echo '<br />';
        echo $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : "";
        echo '<br />';

        if ($nombre == '' || $direccion = '' || $correo = '' || $telefono == ''  || $especialidad == '' || $cedula == '') { ?>
            <script>
                alert('Completa los campos requeridos');
            </script>
            <?php
        } else {

            try {

                $doc = $db->prepare('INSERT INTO doctores (nombre, edad, direccion, correo, telefono, especialidad, cedula_profesional) VALUES (:nombre, :edad, :direccion, :correo, :telefono, :especialidad, :cedula)');
                $doc->bindParam(':nombre', $nombre);
                $doc->bindParam(':direccion', $direccion);
                $doc->bindParam(':edad', $edad);
                $doc->bindParam(':correo', $correo);
                $doc->bindParam(':telefono', $telefono);
                $doc->bindParam(':especialidad', $especialidad);
                $doc->bindParam(':cedula', $cedula);
                $doc->execute();
            } catch (\Throwable $th) {
                echo $th;
            ?>
                <script>
                    window.location.href = "doctores.php?status=error";
                </script>
            <?php
            }
            ?>
            <script>
                window.location.href = "doctores.php?status=success"
            </script>
    <?php
        }
    }
    ?>

</body>

</html>