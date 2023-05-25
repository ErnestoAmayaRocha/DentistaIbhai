<?php

include('./db/session-validate.php');
include('../db/config.php');

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
   <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
   <meta name="author" content="AdminKit">
   <meta name="keywords"
      content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link rel="shortcut icon" href="../assets/img/logo_DMSP.png" />

   <link rel="canonical" href="https://demo-basic.adminkit.io/" />

   <title>IBHAI</title>
   <style>
   textarea {
      resize: none;
   }

   input[type=number]::-webkit-inner-spin-button,
   input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
   }

   input[type=number] {
      -moz-appearance: textfield;
   }
   </style>
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

               <h1 class="h1 mb-3 fw-bolder">Caja</h1>

               <div class="row">

                  <div class="card">
                     <div class="flex-fill pb-4">
                        <div class="card-header row d-flex pt-4 border border-bottom border-1">
                           <div class="col-md-6">
                              <h5 class="card-title mb-0">Caja</h5>
                           </div>
                        </div>
                        <form class="row p-3 gap-2" action='./db/agregar-caja.php' method="POST">
                           <div class="col-sm-12">
                              <label class="form-label fw-bold" for="odontologo">Doctor:</label>
                              <select class='form-control' name="odontologo" id="odontologo">
                                 <option value="" selected disabled>Selecciona una opción</option>
                                 <?php
                                    foreach ($doctores as $doc) { ?>
                                 <option value="<?php echo $doc['cedula_profesional']; ?>"><?php echo $doc['nombre'] ?>
                                 </option>
                                 <?php
                                    }
                                    ?>
                              </select>
                           </div>
                           <div class="col-sm-12">
                              <label class="form-label fw-bold" for="paciente">Paciente:</label>
                              <select name="paciente" id="paciente" class='form-control'>
                                 <option value="" selected disabled>Selecciona una opción</option>
                                 <?php
                                    foreach ($pacientes as $paci) { ?>
                                 <option value="<?php echo $paci['id']; ?>">
                                    <?php echo $paci['nombre'] ?>
                                 </option>
                                 <?php
                                    }
                                    ?>
                              </select>
                           </div>
                           <div class="col-sm-12">
                              <label for="concepto" class="form-label fw-bold">Concepto:</label>
                              <input type="text" name="concepto" id="concepto" class="form-control">
                           </div>
                           <div class="col-sm-12">
                              <label for="monto" class="form-label fw-bold">Monto:</label>
                              <input class='form-control' type="number" name="monto" id="monto">
                           </div>
                           <div class="col-sm-12">
                              <label for="tipo_pago" class="form-label fw-bold">Tipo de pago:</label>
                              <select class='form-control' name="tipo_pago" id="tipo_pago">
                                 <option value="Efectivo">Efectivo</option>
                                 <option value="Tarjeta">Tarjeta</option>
                                 <option value="Transferencia">Transferencia</option>
                              </select>
                           </div>
                           <div class="col-sm-12">
                              <label for="comprobante" class="form-label fw-bold">Comprobante:</label>
                              <select class='form-control' name="comprobante" id="comprobante">
                                 <option value="Recibo">Recibo</option>
                              </select>
                           </div>
                           <div class="col-sm-12">
                              <label for="comentario" class="form-label fw-bold">Comentario:</label>
                              <textarea class='form-control' name="comentario" id="comentario" cols="30"
                                 rows="10"></textarea>
                           </div>
                           <div class="col-sm-12 d-flex justify-content-center align-items-center mt-3">
                              <input class='btn btn-success' type="submit" value="Guardar">
                           </div>
                        </form>
                     </div>

                  </div>
               </div>

            </div>
      </div>
      </main>

   </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
      crossorigin="anonymous"></script>
   <script src="./assets/js/app.js"></script>
   <?php include '../components/swal.php' ?>

   <script>
   const eliminarDoc = (id) => {
      $.get("db/doctor-eliminar.php", {
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