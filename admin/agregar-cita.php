<?php

include('./db/session-validate.php');
include '../db/config.php';

$doctores = $db->query("SELECT * FROM doctores");
$doctores = $doctores->fetchAll(PDO::FETCH_ASSOC);

$pacientes = $db->query("SELECT * FROM pacientes");
$pacientes = $pacientes->fetchAll(PDO::FETCH_ASSOC);
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

                    <h1 class="h1 mb-3 fw-bolder">Registrar Cita</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Información de la Cita</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-secondary col-md-3" href="eventolista.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <div class="row d-flex justify-content-center">
                                                <div class="form-group col-md-6 ">
                                                    <label for="nombre" class="form-label fw-bold">Titulo</label>
                                                    <input type="text" class="form-control" name="titulo" placeholder="Titulo de la cita" required />
                                                </div>
                                                  <div class="col-sm-6">
                                 <label class="form-label fw-bold" for="odontologo">Paciente:</label>
                                 <select class='form-control' name="paciente" id="odontologo">
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <?php
                                    foreach ($pacientes as $pac) { ?>
                                    <option value="<?php echo $pac['nombre']; ?>">
                                       <?php echo $pac['nombre'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                                                
                                               <div class="col-sm-6">
                                 <label class="form-label fw-bold" for="odontologo">Doctor:</label>
                                 <select class='form-control' name="doctor" id="odontologo">
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <?php
                                    foreach ($doctores as $doc) { ?>
                                    <option value="<?php echo $doc['nombre']; ?>">
                                       <?php echo $doc['nombre'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                                                <div class="form-group col-md-6">
                                                    <label for="descripcion" class="form-label fw-bold">Descripcion</label>
                                                    <input type="text" class="form-control" name="descripcion" placeholder="desc" required />
                                                </div>
                                                
                                                <div class="form-group col-md-4 my-3">
                                                    <label for="fecha" class="form-label fw-bold">fecha</label>
                                                    <input type="datetime-local" class="form-control" name="fecha"  required />
                                                </div>
                                                <div class="form-group col-md-4 my-3">
                                                    <label for="color" class="form-label fw-bold">Color</label>
                                                    <input type="color" class="form-control" name="color"  required />
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

        $titulo = $_POST['titulo'];
        $paciente = $_POST['paciente'];
        $doctor =  $_POST['doctor'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $color = $_POST['color'];
       

        if ($titulo == '' || $paciente == '' || $doctor == '' || $descripcion == ''  || $fecha == '' || $color == '') { ?>
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
                $doc = $db->prepare('INSERT INTO calendario (title, paciente, doctor, descripcion, fecha, color, start) VALUES (:titulo, :paciente, :doctor, :descripcion, :fecha, :color, :start)');
                $doc->bindParam(':titulo', $titulo);
                $doc->bindParam(':paciente', $paciente);
                $doc->bindParam(':doctor', $doctor);
                $doc->bindParam(':descripcion', $descripcion);
                $doc->bindParam(':fecha', $fecha);
                $doc->bindParam(':start', $fecha);
                $doc->bindParam(':color', $color);
                
                $doc->execute();
              
            } catch (\Throwable $th) {
                echo $th;
            ?>
            
                <script>
                    window.location.href = "eventoslista.php?status=error";
                </script>
              
            <?php
            }
            ?>
            <script>
                window.location.href = "eventoslista.php?status=success"
            </script>
    <?php
        }
    }
    ?>
    <?php include '../components/swal.php' ?>

</body>

</html>