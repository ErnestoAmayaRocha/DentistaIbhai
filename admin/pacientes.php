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
   </style>
</head>

<body>
   <div class="wrapper">
      <?php include './components/sidebar.php' ?>

      <div class="main">

         <?php include './components/navbar.php' ?>

         <main class="content">
            <div class="container-fluid p-0">

               <h1 class="h1 mb-3 fw-bolder">Pacientes</h1>

               <div class="row">

                  <div class="card">
                     <div class="py-3 flex-fill">

                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Nombre</th>
                                 <th scope="col">Dirección</th>
                                 <th scope="col">Edad</th>
                                 <th scope="col">Correo</th>
                                 <th scope="col">Telefono</th>
                                 <th scope="col">Acciones</th>
                              </tr>
                           </thead>
                           <tbody>

                              <?php foreach ($db->query('SELECT * from pacientes') as $row){?>
                              <tr>
                                 <th scope="row">
                                    <?php echo $row['id']?>
                                 </th>
                                 <td><?php echo $row['nombre'] ?></td>
                                 <td><?php echo $row['direccion'] ?></td>
                                 <td><?php echo $row['edad'] ?></td>
                                 <td><?php echo $row['correo'] ?></td>
                                 <td><?php echo $row['telefono'] ?></td>
                                 <td><a href="./paciente-desc.php?id=<?php echo $row['id'] ?>" class="btn btn-success">
                                       <i class="align-middle" data-feather="eye"></i>
                                    </a></td>
                              </tr>
                              <?php
	}
?>

                           </tbody>
                        </table>

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