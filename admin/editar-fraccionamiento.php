<?php

include('./db/session-validate.php');
include('../db/config.php');

$fk = isset($_GET['fk']) ? $_GET['fk'] : "";
$fk == '' && header('Location: bitacora.php');

$fracc = $db->prepare("SELECT * FROM fraccionamiento WHERE id_fraccionamiento = :fk");
$fracc->bindParam(':fk', $fk);
$fracc->execute();

$mesa = $db->prepare("SELECT * FROM mesa_directiva WHERE fk_fraccionamiento = :fk");
$mesa->bindParam(':fk', $fk);
$mesa->execute();

$countFracc = $fracc->rowCount();
$countFracc == 0 && header('Location: bitacora.php');

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

                    <h1 class="h1 mb-3 fw-bolder">Editar Fraccionamiento</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Registra la Información de un fraccionamiento </h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-secondary col-md-3" href="bitacora.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <?php foreach ($fracc as $row) { ?>
                                                <div class="row d-flex justify-content-center">
                                                    <div class="border-bottom border-1 border-primary my-3">
                                                        <h4 class="fw-bolder">Información del Fraccionamiento</h4>
                                                    </div>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="fracc_nombre" class="form-label fw-bold">Nombre *</label>
                                                        <input type="text" class="form-control" name="fracc_nombre" value="<?php echo $row['nombre'] ?>" placeholder="Nombre del Fraccionamiento" required />
                                                    </div>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="fracc_direccion" class="form-label fw-bold">Dirección *</label>
                                                        <input type="text" class="form-control" name="fracc_direccion" value="<?php echo $row['direccion'] ?>" placeholder="Dirección del Fraccionamiento" required />
                                                    </div>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="fracc_correo" class="form-label fw-bold">Correo *</label>
                                                        <input type="email" class="form-control" name="fracc_correo" value="<?php echo $row['correo'] ?>" placeholder="Ej. correo@ejemplo.com" required />
                                                    </div>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="fracc_telefono" class="form-label fw-bold">Teléfono</label>
                                                        <input type="tel" class="form-control" name="fracc_telefono" value="<?php echo $row['telefono'] ?>" placeholder="Ej. 000-000-000" maxlength="12" required />
                                                    </div>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="fracc_celular" class="form-label fw-bold">Celular</label>
                                                        <input type="tel" class="form-control" name="fracc_celular" value="<?php echo $row['celular'] ?>" placeholder="Ej. 000-000-000" maxlength="12" />
                                                    </div>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="fracc_url" class="form-label fw-bold">URL Sitio del fraccionamiento *</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['url_sitio'] ?>" name="fracc_url" placeholder="Ej. fraccionamiento.com" />
                                                    </div>
                                                <?php
                                            }
                                                ?>
                                                <div class="border-bottom border-1 border-primary my-3">
                                                    <h4 class="fw-bolder">Mesa Directiva</h4>
                                                </div>


                                                <?php foreach ($mesa as $row) { ?>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="<?php echo strtolower($row['puesto']) ?>_nombre" class="form-label fw-bold"> <?php echo $row['puesto'] ?> </label>
                                                        <input type="text" class="form-control" name="<?php echo strtolower($row['puesto']) ?>_nombre" value="<?php echo $row['nombre'] ?>" placeholder="Nombre del Presidente" required />
                                                        <input type="hidden" name="id_<?php echo strtolower($row['puesto']) ?>">
                                                    </div>
                                                    <div class="form-group col-md-6 my-3">
                                                        <label for="<?php echo strtolower($row['puesto']) ?>_telefono" class="form-label fw-bold">Teléfono</label>
                                                        <input type="tel" class="form-control" name="<?php echo strtolower($row['puesto']) ?>_telefono" value="<?php echo $row['telefono'] ?>" placeholder="Ej. 000-000-000" maxlength="12" />
                                                    </div>
                                                <?php } ?>

                                                <div class="col-md-6 pt-3">
                                                    <button class="btn btn-primary form-control my-3">Guardar</button>
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

        $fracc_nombre = isset($_POST['fracc_nombre']) ? $_POST['fracc_nombre'] : "";
        $fracc_direccion = isset($_POST['fracc_direccion']) ? $_POST['fracc_direccion'] : ""; // check
        $fracc_correo = isset($_POST['fracc_correo']) ? $_POST['fracc_correo'] : ""; // check
        $fracc_telefono = isset($_POST['fracc_telefono']) ? $_POST['fracc_telefono'] : "";
        $fracc_celular = isset($_POST['fracc_celular']) ? $_POST['fracc_celular'] : "";
        $fracc_url = isset($_POST['fracc_url']) ? $_POST['fracc_url'] : "";

        $presidente_nombre = isset($_POST['presidente_nombre']) ? $_POST['presidente_nombre'] : "";
        $presidente_telefono = isset($_POST['presidente_telefono']) ? $_POST['presidente_telefono'] : "";
        $id_presi = isset($_POST['id_presidente']) ? $_POST['id_presidente'] : "";

        $secretario_nombre = isset($_POST['secretario_nombre']) ? $_POST['secretario_nombre'] : "";
        $secretario_telefono = isset($_POST['secretario_telefono']) ? $_POST['secretario_telefono'] : "";
        $id_secre = isset($_POST['id_secretario']) ? $_POST['id_secretario'] : "";

        $tesorero_nombre = isset($_POST['tesorero_nombre']) ? $_POST['tesorero_nombre'] : "";
        $tesorero_telefono = isset($_POST['tesorero_telefono']) ? $_POST['tesorero_telefono'] : "";
        $id_teso = isset($_POST['id_tesorero']) ? $_POST['id_tesorero'] : "";

        $admin_nombre = isset($_POST['admin_nombre']) ? $_POST['admin_nombre'] : "";
        $admin_telefono = isset($_POST['admin_telefono']) ? $_POST['admin_telefono'] : "";
        $id_admin = isset($_POST['id_administrador']) ? $_POST['id_administrador'] : "";

        if ($fracc_nombre == '' || $fracc_direccion = '' || $fracc_correo = '' || $fracc_telefono == '' || $presidente_nombre = '' || $presidente_telefono = '' || $secretario_nombre = '' || $secretario_telefono = '' || $tesorero_nombre = '' || $tesorero_telefono = '' || $admin_nombre = '' || $admin_telefono = '') { ?>
            <script>
                alert('Completa los campos requeridos');
            </script>
            <?php
        } else {

            try {

                $fraccionamiento = $db->prepare('UPDATE fraccionamiento SET nombre = :nombre, direccion = :direccion, correo = :correo, telefono = :telefono, celular = :celular, url_sitio = :url_sitio WHERE id_fraccionamiento = :id_fraccionamiento');
                $fraccionamiento->bindParam(':id_fraccionamiento', $fk);
                $fraccionamiento->bindParam(':nombre', $fracc_nombre);
                $fraccionamiento->bindParam(':direccion', $fracc_direccion);
                $fraccionamiento->bindParam(':correo', $fracc_correo);
                $fraccionamiento->bindParam(':telefono', $fracc_telefono);
                $fraccionamiento->bindParam(':celular', $fracc_celular);
                $fraccionamiento->bindParam(':url_sitio', $fracc_url);
                $fraccionamiento->execute();


                $queryPresi = $db->prepare("UPDATE mesa_directiva SET (nombre = :presidente_nombre, telefono = :presidente_tel WHERE id_mesadirectiva = :id");
                $queryPresi->bindParam(':presidente_nombre', $presidente_nombre);
                $queryPresi->bindParam(':presidente_tel', $presidente_telefono);
                $queryPresi->bindParam(':id', $id_presi);

                $querySecre = $db->prepare("UPDATE mesa_directiva SET (nombre = :presidente_nombre, telefono = :presidente_tel WHERE id_mesadirectiva = :id");
                $querySecre->bindParam(':presidente_nombre', $secretario_nombre);
                $querySecre->bindParam(':presidente_tel', $secretario_telefono);
                $querySecre->bindParam(':id', $id_secre);

                $queryTesorero = $db->prepare("UPDATE mesa_directiva SET (nombre = :presidente_nombre, telefono = :presidente_tel WHERE id_mesadirectiva = :id");
                $queryTesorero->bindParam(':presidente_nombre', $tesorero_nombre);
                $queryTesorero->bindParam(':presidente_tel', $tesorero_telefono);
                $queryTesorero->bindParam(':id', $id_teso);

                $queryAdmin = $db->prepare("UPDATE mesa_directiva SET (nombre = :presidente_nombre, telefono = :presidente_tel WHERE id_mesadirectiva = :id");
                $queryAdmin->bindParam(':presidente_nombre', $admin_nombre);
                $queryAdmin->bindParam(':presidente_tel', $admin_telefono);
                $queryAdmin->bindParam(':id', $id_admin);

                $queryPresi->execute();
                $querySecre->execute();
                $queryTesorero->execute();
                $queryAdmin->execute();
            } catch (\Throwable $th) {
                echo $th;
            ?>
                <script>
                    window.location.href = "bitacora.php?status=error";
                </script>
            <?php
            }
            ?>
            <script>
                window.location.href = "bitacora.php?status=success"
            </script>
    <?php
        }
    }

    ?>

</body>

</html>