<?php

include('./db/session-validate.php');
include('../db/config.php');

$id = isset($_GET['id']) ? $_GET['id'] : "";
$id == '' && header('Location: reportes.php');

$reportes = $db->prepare("SELECT * FROM reportes WHERE id_reporte = :id");
$reportes->bindParam(':id', $id);
$reportes->execute();
$reporte = $reportes->fetchAll(PDO::FETCH_ASSOC);

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

                    <h1 class="h1 mb-3 fw-bolder">Reportes</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Información de incidente</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-primary col-md-2 mx-2" href="./pdf/reportePDF.php" target="_blank">PDF</a>
                                        <a class="btn btn-secondary col-md-3" href="reportes.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content- mx-5">
                                    <div class="form-group col-md-6 my-3">
                                        <label for="" class="form-label fw-bold">Fraccionamiento</label>
                                        <input type="text" class="form-control" value="<?php echo $reporte[0]['fraccionamiento'] ?>" disabled />
                                    </div>
                                    <div class="form-group col-md-6 my-3">
                                        <label for="" class="form-label fw-bold">Fecha del reporte</label>
                                        <input type="text" class="form-control" value=" <?php echo strftime("%d de %B del %Y", strtotime($reporte[0]['created_at'])) ?>" disabled />
                                    </div>
                                    <div class="form-group col-md-6 my-3">
                                        <label for="" class="form-label fw-bold">Guardia en turno</label>
                                        <input type="tel" class="form-control" value="<?php echo $reporte[0]['guardia'] ?>" disabled />
                                    </div>
                                    <div class="form-group col-md-6 my-3">
                                        <label for="" class="form-label fw-bold">Patrulla</label>
                                        <input type="text" class="form-control" value="<?php echo $reporte[0]['clave_guardia'] ?>" disabled />
                                    </div>
                                    <div class="form-group col-md-12 my-3">
                                        <label for="" class="form-label fw-bold">Incidente reportado</label>
                                        <textarea type="text" class="form-control" disabled><?php echo $reporte[0]['incidente'] ?></textarea>
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

</body>

</html>