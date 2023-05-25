<?php

include './db/session-validate.php';
include '../db/config.php';

$reportes = $db->query("SELECT * FROM reportes ORDER BY created_at");
$countReportes = $reportes->rowCount();

$doctores = $db->query("SELECT * FROM doctores");
$doctores = $doctores->fetchAll(PDO::FETCH_ASSOC);

// Lista todos los album

/* Consulta para cuando se tenga el paciente y obtener solo un album */
// $album = $db->prepare("SELECT * FROM album WHERE album.fk_paciente = :id_paciente");
$albums = $db->prepare("SELECT * FROM album");
$albums->execute();
$albums = $albums->fetchAll(PDO::FETCH_ASSOC);

$evolucion = $db->prepare("SELECT * FROM evolucion");
$evolucion->execute();
$evolucion = $evolucion->fetchAll(PDO::FETCH_ASSOC);

$pacientes = $db->query("SELECT * FROM pacientes");
$pacientes->execute();
$pacientes = $pacientes->fetchAll(PDO::FETCH_ASSOC);


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

   <title>Ortodoncia | IBHAI</title>

   <link href="./assets/css/app.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
   <style>
      textarea {
         resize: none;
      }

      .fotografias {
         height: 300px;
         overflow-x: auto;
      }
   </style>
</head>

<body>
   <div class="wrapper">
      <?php include './components/sidebar.php' ?>

      <div class="main">

         <?php include './components/navbar.php' ?>

         <main class="content">
            <div class="container-fluid p-0">

               <h1 class="h1 mb-3 fw-bolder">Ortodoncia</h1>

               <div class="row">

                  <div class="card">
                     <nav>
                        <div class="nav nav-tabs pt-3" id="nav-tab" role="tablist">
                           <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Resumen</button>
                           <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Examen clínico</button>
                           <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Plan de trabajo</button>
                           <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Fotografías</button>
                        </div>
                     </nav>
                     <div class="tab-content p-3 row" id="nav-tabContent">
                        <!-- Resumen -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                           <div class="col-12 row mt-3">
                               
                               
                               
                               
                               
                                <div class="card-body">
                                    <div class="container">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <div class="row d-flex justify-content-center">
                                                <div class="form-group col-md-6 my-3">
                                                    <label class='fw-bolder mb-2' for="doctor">Doctor</label>
                                 <select class='form-control' name="doctor" id="doctor">
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <?php
                                    foreach ($doctores as $doc) { ?>
                                       <option value="<?php echo $doc['id_doctor']; ?>"><?php echo $doc['nombre'] ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                                                   
                                                   
                                                   
                                                   
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label class='fw-bolder mb-2' for="doctor">Paciente</label>
                                  <select class='form-control' name="fk" id="fk" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <?php
                                    foreach ($pacientes as $paciente) { ?>
                                       <option value="<?php echo $paciente['id'] ?>"><?php echo $paciente['nombre'] ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label class='fw-bolder mb-2' for="fecha_inicio">Fecha de inicio</label>
                                 <input class='form-control' type="date" name="fecha_inicio" id="fecha_inicio">
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label class='fw-bolder mb-2' for="fecha_fin">Fecha final</label>
                                 <input class='form-control' type="date" name="fecha_fin" id="fecha_fin">
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label class='fw-bolder mb-2' for="tiempo_estimado">Tiempo estimado</label>
                                 <input class='form-control' type="text" name="tiempo_estimado" id="tiempo_estimado" placeholder="Ingrese tiempo estimado">
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                     <label class='fw-bolder mb-2' for="tipo_brackets">Tipo de brackets</label>
                                 <select class='form-control' name="tipo_brackets" id="tipo_brackets">
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                 </select>
                                                </div>
                                                <div class="form-group col-md-12 my-3">
                                                    <label class='fw-bolder mb-2' for="diagnostico">Diagnóstico</label>
                                 <textarea class='form-control' name="diagnostico" id="diagnostico" cols="30" rows="5" placeholder="Diagnóstico"></textarea>
                                                </div>
                                                
                                                 <div class="form-group col-md-6 my-3">
                                                   <label class='fw-bolder mb-2' for="anclaje_sup">Anclaje superior</label>
                                 <select class='form-control' name="anclaje_sup" id="anclaje_sup">
                                    <option value="1">Ejemplo</option>
                                    <option value="1">Ejemplo</option>
                                    <option value="1">Ejemplo</option>
                                 </select>
                                                </div>
                                                 <div class="form-group col-md-6 my-3">
                                                   <label class='fw-bolder mb-2' for="anclaje_inf">Anclaje inferior</label>
                                 <select name="anclaje_inf" id="anclaje_inf" class="form-control">
                                    <option value="1">Ejemplo</option>
                                    <option value="1">Ejemplo</option>
                                    <option value="1">Ejemplo</option>
                                 </select>
                                                </div>
                                                
                                                
                                                <div class="col-12">
                                 <label class='fw-bolder mb-2' for="nota">Nota</label>
                                 <textarea class='form-control' name="nota" id="nota" cols="30" rows="3"></textarea>
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

   <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
   <script src="./assets/js/app.js"></script>
   <?php include '../components/swal.php' ?>





 <?php

    include('../db/config.php');

    if ($_POST) {

        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $edad =  $_POST['edad'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $especialidad = $_POST['especialidad'];
        $cedula = $_POST['cedula'];

        if ($nombre == '' || $direccion = '' || $correo = '' || $telefono == ''  || $especialidad == '' || $cedula == '') { ?>
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
    <?php include '../components/swal.php' 
    ?>






   <script>
      const sendData = () => {

         const fecha = document.getElementById('fecha_evolucion').value;
         const evolucion = document.getElementById('evolucion').value;
         const fk = document.getElementById('fk_paciente').value;

         $.ajax({
            type: "POST",
            url: "db/evolucion-agregar.php",
            data: {
               fecha: fecha,
               evolucion: evolucion,
               fk: fk
            },
            success: res => {
               console.log(res);
               if (res === "success") {
                  window.location.reload();
               } else if (res === "error") {
                  console.log(res);
               }
            }
         })
      }

      const borrarEvolucion = (id) => {
         $.ajax({
            type: "GET",
            url: `db/evolucion-eliminar.php?id=${id}`,
            success: () => window.location.reload()
         })
      }
   </script>

</body>

</html>