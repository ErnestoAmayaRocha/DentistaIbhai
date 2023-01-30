<?php

include('./db/session-validate.php');
include '../db/config.php';

$doctores = $db->query("SELECT * FROM doctores");
$doctores = $doctores->fetchAll(PDO::FETCH_ASSOC);
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
   <style>
   input[type=number]::-webkit-inner-spin-button,
   input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
   }

   input[type=number] {
      -moz-appearance: textfield;
   }

   .btn-regresar {
      visibility: hidden;
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

               <h1 class="h1 mb-3 fw-bolder">Registrar Paciente</h1>

               <div class="row">

                  <div class="card">
                     <div class="py-3 flex-fill">
                        <form action='./db/agregar-paciente.php' method="POST">
                           <div class="col-sm-12 row">
                              <div class="col-md-8 mb-3">
                                 <label for="nombre" class="form-label fw-bold">Nombre</label>
                                 <input type="text" class="form-control" name="nombre" required />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="edad" class="form-label fw-bold">Edad</label>
                                 <input type="number" class="form-control" name="edad" required />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="direccion" class="form-label fw-bold">Dirección</label>
                                 <input type="text" class="form-control" name="direccion" required />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="correo" class="form-label fw-bold">Correo</label>
                                 <input type="email" class="form-control" name="correo" required />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="telefono" class="form-label fw-bold">Teléfono</label>
                                 <input type="number" class="form-control" name="telefono" maxlength="10" required />
                              </div>
                              <div class="col-sm-12">
                                 <label class="form-label fw-bold" for="odontologo">Odontologo:</label>
                                 <select class='form-control' name="odontologo" id="odontologo">
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <?php
                                    foreach ($doctores as $doc) { ?>
                                    <option value="<?php echo $doc['id_doctor']; ?>">
                                       <?php echo $doc['nombre'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="col-sm-12 my-3">
                                 <input type="submit" value="Guardar" class="btn btn-success col-sm-12">
                              </div>
                           </div>
                        </form>

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