<?php

include('./db/session-validate.php');
include('../db/config.php');

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

               <h1 class="h1 mb-3 fw-bolder">Pacientes</h1>

               <div class="row">

                  <div class="card">
                     <div class="py-3 flex-fill">
                         <div class="card-header row d-flex pt-4 ">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Registro de Pacientes</h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-primary col-md-3" href="agregar-pacientee.php">Agregar</a>
                                    </div>
                                </div>
                        <div class="col-sm-12 my-3">
                           <label class="form-label fw-bold" for="odontologo">Odontologo:</label>
                           <select class='form-control' name="odontologo" id="odontologo">
                              <option value="" selected disabled>Selecciona una opción</option>
                              <option value="ninguno">Ninguno</option>
                              <?php
                              foreach ($doctores as $doc) { ?>
                                 <option value="<?php echo $doc['id_doctor']; ?>"><?php echo $doc['nombre'] ?>
                                 </option>
                              <?php
                              }
                              ?>
                           </select>
                        </div>
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

                              <?php
                              $doc = isset($_GET['doctor']) ? $_GET['doctor'] : false;
                              
                              if ($doc === false) {
                                 foreach ($db->query('SELECT * from pacientes') as $row) { ?>
                                    <tr>
                                       <th scope="row">
                                          <?php echo $row['id'] ?>
                                       </th>
                                       <td><?php echo $row['nombre'] ?></td>
                                       <td><?php echo $row['direccion'] ?></td>
                                       <td><?php echo $row['edad'] ?></td>
                                       <td><?php echo $row['correo'] ?></td>
                                       <td><?php echo $row['telefono'] ?></td>
                                       <td><a href="./paciente-desc.php?id=<?php echo $row['id'] ?>" class="btn btn-success">
                                             <i class="align-middle" data-feather="eye"></i>
                                          </a>
                                          <button class="btn btn-sm btn-danger" onclick="eliminarDoc(<?php echo $row['id'] ?>)">Eliminar</button></td>
                                    </tr>
                                 <?php
                                 }
                              } else {

                                 $paciente = $db->prepare("SELECT * from pacientes WHERE fk_doctor = :doctor");
                                 $paciente->bindParam(':doctor', $doc);
                                 $paciente->execute();
                                 foreach ($paciente as $row) { ?>
                                    <tr>
                                       <th scope="row">
                                          <?php echo $row['id'] ?>
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
  <?php include '../components/swal.php' ?>
   <script src="./assets/js/app.js"></script>
   <script>
      document.getElementById("odontologo").onchange = function() {
         myFunction()
      };

      function myFunction() {
         const x = document.getElementById("odontologo").value;
         if (x === 'ninguno') {
            window.location.href = window.location.href.split('php')[0] + "php";
         } else {
            window.location.href = window.location.href.split('php')[0] + "php?doctor=" + x;
         }
      }
   </script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="./assets/js/app.js"></script>

    <script>
        const eliminarDoc = (id) => {
            $.get("db/paciente-eliminar.php", {
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