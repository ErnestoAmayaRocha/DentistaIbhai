<?php

include('./db/session-validate.php');
include('../db/config.php');

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

   .card {
      height: 100vh;
   }

   .pdf {
      margin-top: 1rem;
      width: 100%;
      height: 550px;
   }
   </style>
</head>

<body>
   <?php 
      $id_user = $_GET['id'];
      $stmt = $db->prepare("SELECT * FROM pacientes WHERE id=:id");
      $stmt->execute(['id' => $id_user]); 
      $user = $stmt->fetch();
   ?>
   <div class="wrapper">
      <?php include './components/sidebar.php' ?>

      <div class="main">

         <?php include './components/navbar.php' ?>

         <main class="content">
            <div class="container-fluid p-0">

               <h1 class="h1 mb-3 fw-bolder">Paciente: <?php echo $user['nombre']?></h1>

               <div class="row">

                  <div class="card">
                     <div class="py-3 flex-fill">
                        <form action='./db/agregar-paciente.php' method="POST">
                           <div class="col-sm-12 row">
                              <div class="col-md-8 mb-3">
                                 <label for="nombre" class="form-label fw-bold">Nombre</label>
                                 <input type="text" class="form-control" name="nombre"
                                    value="<?php echo $user['nombre']?>" disabled />
                              </div>
                              <div class=" col-md-4 mb-3">
                                 <label for="edad" class="form-label fw-bold">Edad</label>
                                 <input type="number" class="form-control" name="edad"
                                    value="<?php echo $user['edad']?>" disabled />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="direccion" class="form-label fw-bold">Dirección</label>
                                 <input type="text" class="form-control" name="direccion"
                                    value="<?php echo $user['direccion']?>" disabled />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="correo" class="form-label fw-bold">Correo</label>
                                 <input type="email" class="form-control" name="correo"
                                    value="<?php echo $user['correo']?>" disabled />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="telefono" class="form-label fw-bold">Teléfono</label>
                                 <input type="number" class="form-control" name="telefono" maxlength="10"
                                    value="<?php echo $user['telefono']?>" disabled />
                              </div>
                           </div>
                           <div class="col-sm-12 d-flex  justify-content-center">
                              <iframe class="pdf"
                                 src="https://docs.google.com/viewer?url=https://riuma.uma.es/xmlui/static/pdf/politica-riuma_es.pdf&embedded=true"></iframe>
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