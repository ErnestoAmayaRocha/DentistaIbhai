<?php

include('./db/session-validate.php');
include('../db/config.php');

$fk = isset($_GET['id']) ? $_GET['id'] : '';
$fk === '' && header('Location: index.php');

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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

      .card-new {
         background: #FFFFFF;
         /* filter: drop-shadow(5px 5px 5px gray); */
      }
   </style>
</head>

<body>
   <?php
   $id_user = $_GET['id'];

   $stmt = $db->prepare("SELECT * FROM pacientes WHERE id=:id");
   $stmt->execute(['id' => $id_user]);
   $user = $stmt->fetch();


   $consulta = $db->prepare("SELECT * FROM historiaclinica WHERE afil=:id");
   $consulta->execute(['id' => $id_user]);
   $historial = $consulta->fetch();

   $consul = $db->prepare("SELECT * FROM archivo_ortodoncia WHERE fk_paciente=:id");
   $consul->execute(['id' => $id_user]);
   $documentos = $consul->fetch();

   $evolucion = $db->prepare("SELECT * FROM evolucion WHERE fk_paciente = :fk ORDER BY fecha DESC");
   $evolucion->bindParam(':fk', $fk);
   $evolucion->execute();
   $countEvo = $evolucion->rowCount();
   $evolucion = $evolucion->fetchAll(PDO::FETCH_ASSOC);

   ?>
   <div class="wrapper">
      <?php include './components/sidebar.php' ?>

      <div class="main">

         <?php include './components/navbar.php' ?>

         <main class="content">
            <div class="container-fluid p-0">

               <h1 class="h1 mb-3 fw-bolder">Paciente: <?php echo $user['nombre'] ?></h1>

               <div class="row">

                  <div class="card-new shadow-sm p-3 mb-5 rounded">
                     <div class="py-3 flex-fill">
                        <form action='./db/agregar-paciente.php' method="POST">
                           <div class="col-sm-12 row">
                              <div class="col-md-8 mb-3">
                                 <label for="nombre" class="form-label fw-bold">Nombre</label>
                                 <input type="text" class="form-control" name="nombre" value="<?php echo $user['nombre'] ?>" disabled />
                              </div>
                              <div class=" col-md-4 mb-3">
                                 <label for="edad" class="form-label fw-bold">Edad</label>
                                 <input type="number" class="form-control" name="edad" value="<?php echo $user['edad'] ?>" disabled />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="direccion" class="form-label fw-bold">Dirección</label>
                                 <input type="text" class="form-control" name="direccion" value="<?php echo $user['direccion'] ?>" disabled />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="correo" class="form-label fw-bold">Correo</label>
                                 <input type="email" class="form-control" name="correo" value="<?php echo $user['correo'] ?>" disabled />
                              </div>
                              <div class="col-md-4 mb-3">
                                 <label for="telefono" class="form-label fw-bold">Teléfono</label>
                                 <input type="number" class="form-control" name="telefono" maxlength="10" value="<?php echo $user['telefono'] ?>" disabled />
                              </div>

                              <!-- inicia historia clinica -->

                              <?php
                              if (!empty($historial)) {
                              ?>
                                 <h1 class='mt-3'>Historia clinica general</h1>
                                 <hr>
                                 <div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="lugar">Lugar:</label>
                                          <input disabled value="<?php echo $historial['lugar'] ?>" type="text" name="lugar" id="lugar" class="form-control">
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="fecha">Fecha:</label>
                                          <input disabled value="<?php echo $historial['fecha'] ?>" class='form-control' type="date" name="fecha" id="fecha">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="odontologo">Odontologo:</label>
                                          <input disabled value="<?php echo $historial['odontologo'] ?>" type="text" name="odontologo" id="odontologo" class="form-control">
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="matricula">N° de Matrícula:</label>
                                          <input disabled value="<?php echo $historial['matricula'] ?>" type="text" name="matricula" id="matricula" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="paciente">Paciente:</label>
                                          <input disabled value="<?php echo $historial['paciente'] ?>" type="text" name="paciente" id="paciente" class="form-control">
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="afil">N° Afil:</label>
                                          <input disabled value="<?php echo $historial['afil'] ?>" type="text" name="afil" id="afil" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="o_social">O. Social:</label>
                                          <input disabled value="<?php echo $historial['o_social'] ?>" type="text" name="o_social" id="o_social" class="form-control">
                                       </div>
                                       <div class="col-sm-2">
                                          <label class="form-label fw-bold" for="f_nac">F. Nac:</label>
                                          <input disabled value="<?php echo $historial['f_nac'] ?>" type="text" name="f_nac" id="f_nac" class="form-control">
                                       </div>
                                       <div class="col-sm-2">
                                          <label class="form-label fw-bold" for="telefono">Telefono:</label>
                                          <input disabled value="<?php echo $historial['telefono'] ?>" type="number" name="telefono" id="telefono" class="form-control" maxlength='10'>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-2">
                                          <label class="form-label fw-bold" for="edad">Edad:</label>
                                          <input disabled value="<?php echo $historial['edad'] ?>" type="number" name="edad" id="edad" class='form-control'>
                                       </div>
                                       <div class="col-sm-2">
                                          <label class="form-label fw-bold" for="estado_civil">Estado civil:</label>
                                          <input disabled value="<?php echo $historial['estado_civil'] ?>" type="text" name="estado_civil" id="estado_civil" class="form-control">
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="nacionalidad">Nacionalidad:</label>
                                          <input disabled value="<?php echo $historial['nacionalidad'] ?>" type="text" name="nacionalidad" id="nacionalidad" class="form-control">
                                       </div>
                                       <div class="col-sm-2">
                                          <label class="form-label fw-bold" for="n_doc">N° Doc:</label>
                                          <input disabled value="<?php echo $historial['n_doc'] ?>" type="text" name="n_doc" id="n_doc" class="form-control">
                                       </div>
                                       <div class="col-sm-2">
                                          <label class="form-label fw-bold" for="celular">Celular:</label>
                                          <input disabled value="<?php echo $historial['celular'] ?>" type="number" name="celular" id="celular" class="form-control" maxlength='10'>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="calle">Calle:</label>
                                          <input disabled value="<?php echo $historial['calle'] ?>" type="text" name="calle" id="calle" class="form-control">
                                       </div>
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="numero">Número:</label>
                                          <input disabled value="<?php echo $historial['numero'] ?>" type="number" name="numero" id="numero" class="form-control">
                                       </div>
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="colonia">Colonia:</label>
                                          <input disabled value="<?php echo $historial['colonia'] ?>" type="text" name="colonia" id="colonia" class="form-control">
                                       </div>
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="localidad">Localidad:</label>
                                          <input disabled value="<?php echo $historial['localidad'] ?>" type="text" name="localidad" id="localidad" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="profecion">Profesión/Actividad:</label>
                                          <input disabled value="<?php echo $historial['profecion'] ?>" type="text" name="profecion" id="profecion" class="form-control">
                                       </div>
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="titular">Titular:</label>
                                          <input disabled value="<?php echo $historial['titular'] ?>" type="text" name="titular" id="titular" class="form-control">
                                       </div>
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="lugar_trabajo">Lugar de trabajo:</label>
                                          <input disabled value="<?php echo $historial['lugar_trabajo'] ?>" type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control">
                                       </div>
                                       <div class="col-sm-3">
                                          <label class="form-label fw-bold" for="jerarquia">Jerarquia</label>
                                          <input disabled value="<?php echo $historial['jerarquia'] ?>" type="text" name="jerarquia" id="jerarquia" class="form-control">
                                       </div>
                                    </div>
                                    <hr>
                                    <h4>Este cuestionario tiene el tenor de una “Declaración Jurada”</h4>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="padre_vida">¿Padre con vida?</label>
                                          <select disabled value="<?php echo $historial['padre_vida'] ?>" class='form-control' name="padre_vida" id="padre_vida">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="enfermedad_padre">Enfermedad que padece o
                                             padeció</label>
                                          <input disabled value="<?php echo $historial['enfermedad_padre'] ?>" type="text" name="enfermedad_padre" id="enfermedad_padre" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="madre_vida">¿Madre con vida?</label>
                                          <select disabled value="<?php echo $historial['madre_vida'] ?>" class='form-control' name="madre_vida" id="madre_vida">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="enfermedad_madre">Enfermedad que padece o
                                             padeció</label>
                                          <input disabled value="<?php echo $historial['enfermedad_madre'] ?>" type="text" name="enfermedad_madre" id="enfermedad_madre" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="hermanos">¿Hermanos?</label>
                                          <select disabled value="<?php echo $historial['hermanos'] ?>" name="hermanos" id="hermanos" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="hermanos_sanos">¿Sanos?</label>
                                          <input disabled value="<?php echo $historial['hermanos_sanos'] ?>" type="text" name="hermanos_sanos" id="hermanos_sanos" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="enfermedad">¿Sufre de alguna
                                             enfermedad?</label>
                                          <select disabled value="<?php echo $historial['enfermedad'] ?>" name="enfermedad" id="enfermedad" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="enfermedad_cual">¿De que?</label>
                                          <input disabled value="<?php echo $historial['enfermedad_cual'] ?>" type="text" name="enfermedad_cual" id="enfermedad_cual" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-4">
                                          <label class="form-label fw-bold" for="tratamiento_medico">¿Hace algún
                                             tratamiento
                                             médico?</label>
                                          <select disabled value="<?php echo $historial['tratamiento_medico'] ?>" name="tratamiento_medico" id="tratamiento_medico" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-8">
                                          <label class="form-label fw-bold" for="tratamiento_cual">¿Cual?</label>
                                          <input disabled value="<?php echo $historial['tratamiento_cual'] ?>" type="text" name="tratamiento_cual" id="tratamiento_cual" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-12">
                                          <label class="form-label fw-bold" for="medicamentos_habituales">¿Qué
                                             medicamento(s)
                                             consume
                                             habitualmente?</label>
                                          <input type='text' disabled value="<?php echo $historial['medicamentos_habituales'] ?>" name="medicamentos_habituales" id="medicamentos_habituales" cols="30" rows="5" class="form-control"></input>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-12">
                                          <label class="form-label fw-bold" for="medicamentos_anos">¿Qué medicamento(s)
                                             consume
                                             habitualmente?</label>
                                          <input type='text' disabled value="<?php echo $historial['medicamentos_anos'] ?>" name="medicamentos_anos" id="medicamentos_anos" cols="30" rows="5" class="form-control"></input>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="deporte">¿Realiza algún deporte?</label>
                                          <select disabled value="<?php echo $historial['deporte'] ?>" name="deporte" id="deporte" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="molestia_deporte">¿Nota algún malestar al
                                             realizarlo?</label>
                                          <select disabled value="<?php echo $historial['molestia_deporte'] ?>" name="molestia_deporte" id="molestia_deporte" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="alergico">¿Es alérgico a alguna
                                             droga?</label>
                                          <select disabled value="<?php echo $historial['alergico'] ?>" class='form-control' name="alergico" id="alergico">
                                             <option value="anestesia">A la anestesia</option>
                                             <option value="penicilina">A la penicilina</option>
                                             <option value="otro">Otro</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="alergico_otro">Otros:</label>
                                          <input disabled value="<?php echo $historial['alergico_otro'] ?>" type="text" name="alergico_otro" id="alergico_otro" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="cicatriza">¿Cuando le sacan una muela o se
                                             lastima,
                                             cicatriza
                                             bien?</label>
                                          <select disabled value="<?php echo $historial['cicatriza'] ?>" name="cicatriza" id="cicatriza" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="sangra">¿Sangra mucho?</label>
                                          <input disabled value="<?php echo $historial['sangra'] ?>" type="text" name="sangra" id="sangra" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="problema_colageno">¿Tiene problema de
                                             colágeno
                                             (hiperlaxitud)?</label>
                                          <select disabled value="<?php echo $historial['problema_colageno'] ?>" class='form-control' name="problema_colageno" id="problema_colageno">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="fiebre_reumatica">¿Antecedentes de fiebre
                                             reumática?</label>
                                          <select disabled value="<?php echo $historial['fiebre_reumatica'] ?>" class='form-control' name="fiebre_reumatica" id="fiebre_reumatica">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-12">
                                          <label class="form-label fw-bold" for="alguna_medicacion">¿Se protege con alguna
                                             medicación?</label>
                                          <input disabled value="<?php echo $historial['alguna_medicacion'] ?>" type="text" name="alguna_medicacion" id="alguna_medicacion" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="diabetico">¿Es diabético?</label>
                                          <select disabled value="<?php echo $historial['diabetico'] ?>" name="diabetico" id="diabetico" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="diabetes_con">¿Con qué?</label>
                                          <input disabled value="<?php echo $historial['diabetes_con'] ?>" type="text" name="diabetes_con" id="diabetes_con" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="problema_cardiaco">¿Tiene algún problema
                                             cardíaco?</label>
                                          <select disabled value="<?php echo $historial['problema_cardiaco'] ?>" name="problema_cardiaco" id="problema_cardiaco" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="cardiaco_cual">¿Cuál?</label>
                                          <input disabled value="<?php echo $historial['cardiaco_cual'] ?>" type="text" name="cardiaco_cual" id="cardiaco_cual" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="toma_aspirina">¿Toma seguido aspirina y/o
                                             anticoagulante?</label>
                                          <select disabled value="<?php echo $historial['toma_aspirina'] ?>" name="toma_aspirina" id="toma_aspirina" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="frecuencia_aspirina">¿Con qué
                                             frecuencia?</label>
                                          <input disabled value="<?php echo $historial['frecuencia_aspirina'] ?>" type="text" name="frecuencia_aspirina" id="frecuencia_aspirina" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-12">
                                          <label class="form-label fw-bold" for="presion_alta">¿Tiene presión alta?</label>
                                          <select disabled value="<?php echo $historial['presion_alta'] ?>" name="presion_alta" id="presion_alta" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="chagas">¿Chagas?</label>
                                          <select disabled value="<?php echo $historial['chagas'] ?>" name="chagas" id="chagas" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="tratamiento_chagas">¿Está en
                                             tratamiento?</label>
                                          <input disabled value="<?php echo $historial['tratamiento_chagas'] ?>" type="text" name="tratamiento_chagas" id="tratamiento_chagas" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="problemas_renales">¿Tiene problemas
                                             renales?</label>
                                          <select disabled value="<?php echo $historial['problemas_renales'] ?>" name="problemas_renales" id="problemas_renales" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="ulcera_gastrica">¿Ulcera Gástrica?</label>
                                          <select disabled value="<?php echo $historial['ulcera_gastrica'] ?>" name="ulcera_gastrica" id="ulcera_gastrica" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="hepatitis">¿Tuvo hepatitis?</label>
                                          <select disabled value="<?php echo $historial['hepatitis'] ?>" class="form-control" name="hepatitis" id="hepatitis">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="tipo_hepatitis">¿De qué tipo?</label>
                                          <select disabled value="<?php echo $historial['tipo_hepatitis'] ?>" name="tipo_hepatitis" id="tipo_hepatitis" class="form-control">
                                             <option value="A">A</option>
                                             <option value="B">B</option>
                                             <option value="C">C</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="problema_hepatico">¿Tiene algún problema
                                             hepático?</label>
                                          <select disabled value="<?php echo $historial['problema_hepatico'] ?>" name="problema_hepatico" id="problema_hepatico" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="problema_hepatico_cual">¿Cuál?</label>
                                          <input disabled value="<?php echo $historial['problema_hepatico_cual'] ?>" type="text" name="problema_hepatico_cual" id="problema_hepatico_cual" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-12">
                                          <label class="form-label fw-bold" for="convulsiones">¿Tuvo convulsiones?</label>
                                          <select disabled value="<?php echo $historial['convulsiones'] ?>" name="convulsiones" id="convulsiones" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="epileptico">¿Es epiléptico?</label>
                                          <select disabled value="<?php echo $historial['epileptico'] ?>" name="epileptico" id="epileptico" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="epileptico_medicacion">Medicación que
                                             toma</label>
                                          <input disabled value="<?php echo $historial['epileptico_medicacion'] ?>" type="text" name="epileptico_medicacion" id="epileptico_medicacion" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="sifilis_gonorrea">¿Ha tenido Sífilis o
                                             Gonorrea?</label>
                                          <select disabled value="<?php echo $historial['sifilis_gonorrea'] ?>" name="sifilis_gonorrea" id="sifilis_gonorrea" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="infecto_contagiosa">¿Otra enfermedad
                                             infecto-contagiosa?</label>
                                          <select disabled value="<?php echo $historial['infecto_contagiosa'] ?>" name="infecto_contagiosa" id="infecto_contagiosa" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="transfusiones">¿Tuvo
                                             transfusiones?</label>
                                          <select disabled value="<?php echo $historial['transfusiones'] ?>" name="transfusiones" id="transfusiones" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="operado">¿Fue operado alguna vez?</label>
                                          <select disabled value="<?php echo $historial['operado'] ?>" name="operado" id="operado" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="operacion">¿De qué?</label>
                                          <input disabled value="<?php echo $historial['operacion'] ?>" type="text" name="operacion" id="operacion" class="form-control">
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="cuando_operacion">¿Cuándo?</label>
                                          <input disabled value="<?php echo $historial['cuando_operacion'] ?>" type="month" name="cuando_operacion" id="cuando_operacion" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="problema_respiratorio">¿Tiene algún
                                             problema
                                             respiratorio?</label>
                                          <select disabled value="<?php echo $historial['problema_respiratorio'] ?>" name="problema_respiratorio" id="problema_respiratorio" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="respiratorio_cual">¿Cuál?</label>
                                          <input disabled value="<?php echo $historial['respiratorio_cual'] ?>" type="text" name="respiratorio_cual" id="respiratorio_cual" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-12">
                                          <label class="form-label fw-bold" for="fuma">¿Fuma?</label>
                                          <select disabled value="<?php echo $historial['fuma'] ?>" name="fuma" id="fuma" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="embarazo">¿Está embarazada?</label>
                                          <select disabled value="<?php echo $historial['embarazo'] ?>" name="embarazo" id="embarazo" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="meses_embarazo">¿De cuántos meses?</label>
                                          <select disabled value="<?php echo $historial['meses_embarazo'] ?>" name="meses_embarazo" id="meses_embarazo" class="form-control">
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6">6</option>
                                             <option value="7">7</option>
                                             <option value="8">8</option>
                                             <option value="9">9</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="recomendacion_medica">¿Hay alguna otra
                                             recomendación de su médico
                                             que quiera dejar constancia?</label>
                                          <select disabled value="<?php echo $historial['recomendacion_medica'] ?>" name="recomendacion_medica" id="recomendacion_medica" class="form-control">
                                             <option value="1">Si</option>
                                             <option value="0">No</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="recomendacion_medica_cual">¿Cuál?</label>
                                          <input disabled value="<?php echo $historial['recomendacion_medica_cual'] ?>" type="text" name="recomendacion_medica_cual" id="recomendacion_medica_cual" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-12">
                                          <label class="form-label fw-bold" for="tratamiento_extra">¿Realiza algún tipo de
                                             tratamiento homeopático, Acupuntura,
                                             otros?</label>
                                          <input disabled value="<?php echo $historial['tratamiento_extra'] ?>" type="text" name="tratamiento_extra" id="tratamiento_extra" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row mb-3">
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="medico_clinico">Médico clínico</label>
                                          <input disabled value="<?php echo $historial['medico_clinico'] ?>" type="text" name="medico_clinico" id="medico_clinico" class="form-control">
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="form-label fw-bold" for="clinica">Clínica/Hospital en caso de hacer
                                             falta
                                             derivación</label>
                                          <input disabled value="<?php echo $historial['clinica'] ?>" type="text" name="clinica" id="clinica" class="form-control">
                                       </div>
                                    </div>
                                 </div>
                              <?php
                              }

                              ?>

                              <!-- termina historia clinica -->
                              <?php
                              if (!empty($documentos)) {
                              ?>
                           </div>
                           <h1>Examen clínico: <?php echo $documentos['nombre'] ?></h1>
                           <hr>
                           <div class="col-sm-12 d-flex  justify-content-center">


                              <iframe class="pdf" src="https://docs.google.com/viewer?url=https://utdgrupoti.com/IBHAI/<?php echo $documentos['path'] ?>&embedded=true"></iframe>
                           </div>
                        <?php
                              }
                        ?>
                        </form>



                     </div>
                  </div>

                  <div class="">
                     <div class="col-sm-12 mt-5 py-3 border-2 border-top rounded rounded-1">
                        <div>
                           <div class="col-sm-12 mb-3 row d-flex justify-content-end px-5">
                              <label class='fw-bolder mb-2 col-md-12'>Evolución</label>
                           </div>
                           <div class="col-md-12 row d-flex justify-content-center px-5 mb-3">
                              <div class="input-group mb-3">
                                 <input type="date" class="form-control" id="fecha_evolucion" placeholder="" aria-describedby="button-addon1">
                                 <input type="text" class="form-control" id="evolucion" placeholder="Evolución" aria-describedby="button-addon1">
                                 <button class="btn btn-outline-primary" type="button" id="btn-ev" onclick="sendData(<?php echo $id_user ?>)">Agregar</button>
                              </div>
                           </div>
                        </div>
                        <?php
                        if ($countEvo > 0) { ?>
                           <table class="table table-light table-striped text-center">
                              <thead>
                                 <tr>
                                    <th>Fecha</th>
                                    <th>Evolución</th>
                                    <th>Acción</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($evolucion as $row) { ?>
                                    <tr>
                                       <td><?php echo $row['fecha']; ?></td>
                                       <td><?php echo $row['evolucion']; ?></td>
                                       <td>
                                          <button class="btn btn-sm btn-danger" id="btn-el-<?php echo $row['id_evolucion']; ?>" onclick="borrarEvolucion(<?php echo $row['id_evolucion']; ?>)">Eliminar</button>
                                       </td>
                                    </tr>
                                 <?php
                                 }
                                 ?>
                              </tbody>
                           </table>
                        <?php
                        } else { ?>
                           <div class="border-top border-2 text-muted text-center p-3 mt-5 mx-5">
                              No se encontraron registros
                           </div>
                        <?php
                        }
                        ?>
                     </div>
                  </div>

               </div>
            </div>
         </main>

      </div>

   </div>

   <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
   <script src="./assets/js/app.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script>
      console.log(<?php echo $documentos ?>)
   </script>

   <script>
      const sendData = (fk) => {

         const fecha = document.getElementById('fecha_evolucion').value;
         const evolucion = document.getElementById('evolucion').value;
         const btn = document.getElementById('btn-ev');

         if (fecha != "" && evolucion != "") {
            btn.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...`;
            btn.disabled = true;
            $.ajax({
               type: "POST",
               url: "db/evolucion-agregar.php",
               data: {
                  fecha: fecha,
                  evolucion: evolucion,
                  fk: fk
               },
               success: res => {
                  if (res === "success") {
                     window.location.reload();
                  } else if (res === "error") {
                     console.log(res);
                  }
               }
            })
         }
      }

      const borrarEvolucion = (id) => {
         const btn = document.getElementById('btn-el-' + id);
         btn.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Eliminado...`;
         btn.disabled = true;
         $.ajax({
            type: "GET",
            url: `db/evolucion-eliminar.php?id=${id}`,
            success: () => window.location.reload()
         })
      }
   </script>

</body>

</html>