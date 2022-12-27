<?php

include './db/session-validate.php';
include '../db/config.php';

$reportes = $db->query("SELECT * FROM reportes ORDER BY created_at");
$countReportes = $reportes->rowCount();

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
      <?php include './components/sidebar.php'?>

      <div class="main">

         <?php include './components/navbar.php'?>

         <main class="content">
            <div class="container-fluid p-0">

               <h1 class="h1 mb-3 fw-bolder">Ortodoncia</h1>

               <div class="row">

                  <div class="card">
                     <nav>
                        <div class="nav nav-tabs pt-3" id="nav-tab" role="tablist">
                           <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                              aria-selected="true">Resumen</button>
                           <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                              aria-selected="false">Examen clínico</button>
                           <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                              aria-selected="false">Plan de trabajo</button>
                           <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled"
                              aria-selected="false">Fotografías</button>
                        </div>
                     </nav>
                     <div class="tab-content p-3 row" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                           aria-labelledby="nav-home-tab" tabindex="0">
                           <div class="col-sm-12 row mt-3">
                              <div class="col-sm-12">
                                 <label class='' for="doctor">Doctor:</label>
                                 <select class='form-control' name="doctor" id="doctor">
                                    <option value="doc">Doc ejemplo</option>
                                    <option value="doc">Doc ejemplo</option>
                                    <option value="doc">Doc ejemplo</option>
                                    <option value="doc">Doc ejemplo</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-sm-12 row mt-3">
                              <div class="col-sm-6">
                                 <label for="fecha_inicio">Fecha de inicio:</label>
                                 <input class='form-control' type="text" name="fecha_inicio" id="fecha_inicio">
                              </div>
                              <div class="col-sm-6">
                                 <label for="fecha_fin">Fecha final:</label>
                                 <input class='form-control' type="text" name="fecha_fin" id="fecha_fin">
                              </div>
                           </div>
                           <div class="col-sm-12 row mt-3">
                              <div class="col-sm-6">
                                 <label for="tiempo_estimado">Tiempo estimado:</label>
                                 <input class='form-control' type="text" name="tiempo_estimado" id="tiempo_estimado">
                              </div>
                              <div class="col-sm-6">
                                 <label for="tipo_brackets">Tipo de brackets:</label>
                                 <select class='form-control' name="tipo_brackets" id="tipo_brackets">
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-sm-12 row mt-3">
                              <div class="col-sm-12">
                                 <label for="diagnostico">Diagnóstico:</label>
                                 <textarea class='form-control' name="diagnostico" id="diagnostico" cols="30"
                                    rows="10"></textarea>
                              </div>
                           </div>
                           <div class="col-sm-12 row mt-3">
                              <div class="col-sm-6">
                                 <label for="anclaje_sup">Anclaje superior:</label>
                                 <select class='form-control' name="anclaje_sup" id="anclaje_sup">
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                 </select>
                              </div>
                              <div class="col-sm-6">
                                 <label for="anclaje_inf">Anclaje inferior:</label>
                                 <select name="anclaje_inf" id="anclaje_inf" class="form-control">
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                    <option value="">Ejemplo</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-3">
                              <div class="col-sm 12">
                                 <label for="nota">Nota:</label>
                                 <textarea class='form-control' name="nota" id="nota" cols="30" rows="10"></textarea>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-3">
                              <div class="col-sm-12">
                                 <label for="evolucion">Evolución:</label>
                                 <p>pendiente para que tire paro Luis</p>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-3 row justify-content-center">
                              <div class="col-sm-1">
                                 <input type="submit" value="Guardar" class="btn btn-success">
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                           tabindex="0">
                           <form>
                              <label for="archivo">Archivo:</label>
                              <input type="file" name="archivo" id="archivo" class="form-control">
                              <div class="row justify-content-center">
                                 <div class="col-sm-1">
                                    <input type="submit" value="Guardar" class="btn btn-success mt-3">
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                           tabindex="0">...</div>
                        <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab"
                           tabindex="0">
                           <div class="d-flex">
                              <div class="col-sm-2 d-flex flex-column justify-content-center align-items-center">
                                 <h3>Titulo album</h3>
                                 <h4>fecha creación</h4>
                              </div>
                              <div class="fotografias col-sm-10">
                                 <!-- <div class="col"> -->
                                 <img src="https://via.placeholder.com/300" width='300' alt="img">
                                 <!-- </div> -->
                                 <!-- <div class="col"> -->
                                 <img src="https://via.placeholder.com/300" width='300' alt="img">
                                 <!-- </div> -->
                                 <!-- <div class="col"> -->
                                 <img src="https://via.placeholder.com/300" width='300' alt="img">
                                 <!-- </div> -->
                                 <!-- <div class="col"> -->
                                 <img src="https://via.placeholder.com/300" width='300' alt="img">
                                 <!-- </div> -->
                                 <!-- <div class="col"> -->
                                 <img src="https://via.placeholder.com/300" width='300' alt="img">
                                 <!-- </div> -->
                              </div>
                           </div>
                           <div class='col-sm-2 d-flex justify-content-center align-items-center'>
                              <button class="btn btn-primary">Agregar</button>
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