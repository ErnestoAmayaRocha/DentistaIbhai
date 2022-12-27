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
   <title>Historia clínica | IBHAI</title>
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
               <h1 class="h1 mb-3 fw-bolder">Historia clinica general</h1>
               <form action='./db/historial-clinico-agregar.php' method="POST" class="row">
                  <div class="card p-3">
                     <div class="d-flex flex-column">
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="lugar">Lugar:</label>
                              <input type="text" name="lugar" id="lugar" class="form-control">
                           </div>
                           <div class="col-sm-6">
                              <label for="fecha">Fecha:</label>
                              <input class='form-control' type="date" name="fecha" id="fecha">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-8">
                              <label for="odontologo">Odontologo:</label>
                              <select class='form-control' name="odontologo" id="odontologo">
                                 <option value="">Ejemplo</option>
                                 <option value="">Ejemplo</option>
                                 <option value="">Ejemplo</option>
                              </select>
                           </div>
                           <div class="col-sm-4">
                              <label for="matricula">N° de Matrícula:</label>
                              <input type="text" name="matricula" id="matricula" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-8">
                              <label for="paciente">Paciente:</label>
                              <input type="text" name="paciente" id="paciente" class="form-control">
                           </div>
                           <div class="col-sm-4">
                              <label for="afil">N° Afil:</label>
                              <input type="text" name="afil" id="afil" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-8">
                              <label for="o_social">O. Social:</label>
                              <input type="text" name="o_social" id="o_social" class="form-control">
                           </div>
                           <div class="col-sm-2">
                              <label for="f_nac">F. Nac:</label>
                              <input type="text" name="f_nac" id="f_nac" class="form-control">
                           </div>
                           <div class="col-sm-2">
                              <label for="telefono">Telefono:</label>
                              <input type="tel" name="telefono" id="telefono" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-2">
                              <label for="edad">Edad:</label>
                              <input type="number" name="edad" id="edad" class='form-control'>
                           </div>
                           <div class="col-sm-2">
                              <label for="estado_civil">Estado civil:</label>
                              <input type="text" name="estado_civil" id="estado_civil" class="form-control">
                           </div>
                           <div class="col-sm-4">
                              <label for="nacionalidad">Nacionalidad:</label>
                              <input type="text" name="nacionalidad" id="nacionalidad" class="form-control">
                           </div>
                           <div class="col-sm-2">
                              <label for="n_doc">N° Doc:</label>
                              <input type="text" name="n_doc" id="n_doc" class="form-control">
                           </div>
                           <div class="col-sm-2">
                              <label for="celular">Celular:</label>
                              <input type="tel" name="celular" id="celular" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-3">
                              <label for="calle">Calle:</label>
                              <input type="text" name="calle" id="calle" class="form-control">
                           </div>
                           <div class="col-sm-3">
                              <label for="numero">Número:</label>
                              <input type="number" name="numero" id="numero" class="form-control">
                           </div>
                           <div class="col-sm-3">
                              <label for="colonia">Colonia:</label>
                              <input type="text" name="colonia" id="colonia" class="form-control">
                           </div>
                           <div class="col-sm-3">
                              <label for="localidad">Localidad:</label>
                              <input type="text" name="localidad" id="localidad" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-3">
                              <label for="profesion">Profesión/Actividad:</label>
                              <input type="text" name="profesion" id="profecion" class="form-control">
                           </div>
                           <div class="col-sm-3">
                              <label for="titular">Titular:</label>
                              <input type="text" name="titular" id="titular" class="form-control">
                           </div>
                           <div class="col-sm-3">
                              <label for="lugar_trabajo">Lugar de trabajo:</label>
                              <input type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control">
                           </div>
                           <div class="col-sm-3">
                              <label for="jerarquia">Jerarquia</label>
                              <input type="text" name="jerarquia" id="jerarquia" class="form-control">
                           </div>
                        </div>
                        <hr>
                        <h4>Este cuestionario tiene el tenor de una “Declaración Jurada”</h4>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-4">
                              <label for="padre_vida">¿Padre con vida?</label>
                              <select class='form-control' name="padre_vida" id="padre_vida">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-8">
                              <label for="enfermedad_padre">Enfermedad que padece o padeció</label>
                              <input type="text" name="enfermedad_padre" id="enfermedad_padre" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-4">
                              <label for="madre_vida">¿Madre con vida?</label>
                              <select class='form-control' name="madre_vida" id="madre_vida">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-8">
                              <label for="enfermedad_madre">Enfermedad que padece o padeció</label>
                              <input type="text" name="enfermedad_madre" id="enfermedad_madre" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-4">
                              <label for="hermanos">¿Hermanos?</label>
                              <select name="hermanos" id="hermanos" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-8">
                              <label for="hermanos_sanos">¿Sanos?</label>
                              <input type="text" name="hermanos_sanos" id="hermanos_sanos" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-4">
                              <label for="enfermedad">¿Sufre de alguna enfermedad?</label>
                              <select name="enfermedad" id="enfermedad" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-8">
                              <label for="enfermedad_cual">¿De que?</label>
                              <input type="text" name="enfermedad_cual" id="enfermedad_cual" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-4">
                              <label for="tratamiento_medico">¿Hace algún tratamiento médico?</label>
                              <select name="tratamiento_medico" id="tratamiento_medico" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-8">
                              <label for="tratamiento_cual">¿Cual?</label>
                              <input type="text" name="tratamiento_cual" id="tratamiento_cual" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-12">
                              <label for="medicamentos_habituales">¿Qué medicamento(s) consume
                                 habitualmente?</label>
                              <textarea name="medicamentos_habituales" id="medicamentos_habituales" cols="30" rows="5"
                                 class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-12">
                              <label for="medicamentos_anos">¿Qué medicamento(s) consume
                                 habitualmente?</label>
                              <textarea name="medicamentos_anos" id="medicamentos_anos" cols="30" rows="5"
                                 class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="deporte">¿Realiza algún deporte?</label>
                              <select name="deporte" id="deporte" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="molestia_deporte">¿Nota algún malestar al realizarlo?</label>
                              <select name="molestia_deporte" id="molestia_deporte" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="alergico">¿Es alérgico a alguna droga?</label>
                              <select class='form-control' name="alergico" id="alergico">
                                 <option value="anestesia">A la anestesia</option>
                                 <option value="penicilina">A la penicilina</option>
                                 <option value="otro">Otro</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="alergico_otro">Otros:</label>
                              <input type="text" name="alergico_otro" id="alergico_otro" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="cicatriza">¿Cuando le sacan una muela o se lastima, cicatriza
                                 bien?</label>
                              <select name="cicatriza" id="cicatriza" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="sangra">¿Sangra mucho?</label>
                              <input type="text" name="sangra" id="sangra" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="problema_colageno">ùTiene problema de colágeno (hiperlaxitud)?</label>
                              <select class='form-control' name="problema_colageno" id="problema_colageno">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="fiebre_reumatica">¿Antecedentes de fiebre reumática?</label>
                              <select class='form-control' name="fiebre_reumatica" id="fiebre_reumatica">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-12">
                              <label for="alguna_medicacion">¿Se protege con alguna medicación?</label>
                              <input type="text" name="alguna_medicacion" id="alguna_medicacion" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="diabetico">¿Es diabético?</label>
                              <select name="diabetico" id="diabetico" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="diabetes_con">¿Con qué?</label>
                              <input type="text" name="diabetes_con" id="diabetes_con" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="problema_cardiaco">¿Tiene algún problema cardíaco?</label>
                              <select name="problema_cardiaco" id="problema_cardiaco" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="cardiaco_cual">¿Cuál?</label>
                              <input type="text" name="cardiaco_cual" id="cardiaco_cual" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="toma_aspirina">¿Toma seguido aspirina y/o anticoagulante?</label>
                              <select name="toma_aspirina" id="toma_aspirina" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="frecuencia_aspirina">¿Con qué frecuencia?</label>
                              <input type="text" name="frecuencia_aspirina" id="frecuencia_aspirina"
                                 class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-12">
                              <label for="presion_alta">¿Tiene presión alta?</label>
                              <select name="presion_alta" id="presion_alta" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="chagas">¿Chagas?</label>
                              <select name="chagas" id="chagas" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="tratamiento_chagas">¿Está en tratamiento?</label>
                              <input type="text" name="tratamiento_chagas" id="tratamiento_chagas" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="problemas_renales">¿Tiene problemas renales?</label>
                              <select name="problemas_renales" id="problemas_renales" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="ulcera_gastrica">¿Ulcera Gástrica?</label>
                              <select name="ulcera_gastrica" id="ulcera_gastrica" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="hepatitis">¿Tuvo hepatitis?</label>
                              <select class="form-control" name="hepatitis" id="hepatitis">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="tipo_hepatitis">¿De qué tipo?</label>
                              <select name="tipo_hepatitis" id="tipo_hepatitis" class="form-control">
                                 <option value="A">A</option>
                                 <option value="B">B</option>
                                 <option value="C">C</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="problema_hepatico">¿Tiene algún problema hepático?</label>
                              <select name="problema_hepatico" id="problema_hepatico" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="problema_hepatico_cual">¿Cuál?</label>
                              <input type="text" name="problema_hepatico_cual" id="problema_hepatico_cual"
                                 class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-12">
                              <label for="convulsiones">¿Tuvo convulsiones?</label>
                              <select name="convulsiones" id="convulsiones" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="epileptico">¿Es epiléptico?</label>
                              <select name="epileptico" id="epileptico" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="epileptico_medicacion">Medicación que toma</label>
                              <input type="text" name="epileptico_medicacion" id="epileptico_medicacion"
                                 class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="sifilis_gonorrea">¿Ha tenido Sífilis o Gonorrea?</label>
                              <select name="sifilis_gonorrea" id="sifilis_gonorrea" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="infecto_contagiosa">¿Otra enfermedad infecto-contagiosa?</label>
                              <select name="infecto_contagiosa" id="infecto_contagiosa" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="transfusiones">¿Tuvo transfusiones?</label>
                              <select name="transfusiones" id="transfusiones" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="operado">¿Fue operado alguna vez?</label>
                              <select name="operado" id="operado" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="operacion">¿De qué?</label>
                              <input type="text" name="operacion" id="operacion" class="form-control">
                           </div>
                           <div class="col-sm-6">
                              <label for="cuando_operacion">¿Cuándo?</label>
                              <input type="month" name="cuando_operacion" id="cuando_operacion" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="problema_respiratorio">¿Tiene algún problema respiratorio?</label>
                              <select name="problema_respiratorio" id="problema_respiratorio" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="respiratorio_cual">¿Cuál?</label>
                              <input type="text" name="respiratorio_cual" id="respiratorio_cual" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-12">
                              <label for="fuma">¿Fuma?</label>
                              <select name="fuma" id="fuma" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="embarazo">¿Está embarazada?</label>
                              <select name="embarazo" id="embarazo" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="meses_embarazo">¿De cuántos meses?</label>
                              <select name="meses_embarazo" id="meses_embarazo" class="form-control">
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
                              <label for="recomendacion_medica">¿Hay alguna otra recomendación de su médico
                                 que quiera dejar constancia?</label>
                              <select name="recomendacion_medica" id="recomendacion_medica" class="form-control">
                                 <option value="1">Si</option>
                                 <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-sm-6">
                              <label for="recomendacion_medica_cual">¿Cuál?</label>
                              <input type="text" name="recomendacion_medica_cual" id="recomendacion_medica_cual"
                                 class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-12">
                              <label for="tratamiento_extra">¿Realiza algún tipo de tratamiento homeopático, Acupuntura,
                                 otros?</label>
                              <input type="text" name="tratamiento_extra" id="tratamiento_extra" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row mb-3">
                           <div class="col-sm-6">
                              <label for="medico_clinico">Médico clínico</label>
                              <input type="text" name="medico_clinico" id="medico_clinico" class="form-control">
                           </div>
                           <div class="col-sm-6">
                              <label for="clinica">Clínica/Hospital en caso de hacer falta derivación</label>
                              <input type="text" name="clinica" id="clinica" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-12 row justify-content-center">
                           <div class="col-sm-12">
                              <input type="submit" value="Guardar" class="btn btn-success col-sm-12">
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </main>
      </div>
   </div>
   <script src="./assets/js/app.js"></script>
</body>

</html>