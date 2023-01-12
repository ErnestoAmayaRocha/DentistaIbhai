<?php 
include './db/session-validate.php';
include '../db/config.php';
$id_user = $_GET['id'];
      $stmt = $db->prepare("SELECT * FROM historiaclinica WHERE afil=:id");
      $stmt->execute(['id' => $id_user]); 
      $historial = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

   input[type=number]::-webkit-inner-spin-button,
   input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
   }

   input[type=number] {
      -moz-appearance: textfield;
   }
   </style>
</head>

<body class='p-5'>

   <div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="lugar">Lugar:</label>
            <input disabled value="<?php echo $historial['lugar']?>" type="text" name="lugar" id="lugar"
               class="form-control">
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="fecha">Fecha:</label>
            <input disabled value="<?php echo $historial['fecha']?>" class='form-control' type="date" name="fecha"
               id="fecha">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="odontologo">Odontologo:</label>
            <input disabled value="<?php echo $historial['odontologo']?>" type="text" name="odontologo" id="odontologo"
               class="form-control">
         </div>
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="matricula">N° de Matrícula:</label>
            <input disabled value="<?php echo $historial['matricula']?>" type="text" name="matricula" id="matricula"
               class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="paciente">Paciente:</label>
            <input disabled value="<?php echo $historial['paciente']?>" type="text" name="paciente" id="paciente"
               class="form-control">
         </div>
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="afil">N° Afil:</label>
            <input disabled value="<?php echo $historial['afil']?>" type="text" name="afil" id="afil"
               class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="o_social">O. Social:</label>
            <input disabled value="<?php echo $historial['o_social']?>" type="text" name="o_social" id="o_social"
               class="form-control">
         </div>
         <div class="col-sm-2">
            <label class="form-label fw-bold" for="f_nac">F. Nac:</label>
            <input disabled value="<?php echo $historial['f_nac']?>" type="text" name="f_nac" id="f_nac"
               class="form-control">
         </div>
         <div class="col-sm-2">
            <label class="form-label fw-bold" for="telefono">Telefono:</label>
            <input disabled value="<?php echo $historial['telefono']?>" type="number" name="telefono" id="telefono"
               class="form-control" maxlength='10'>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-2">
            <label class="form-label fw-bold" for="edad">Edad:</label>
            <input disabled value="<?php echo $historial['edad']?>" type="number" name="edad" id="edad"
               class='form-control'>
         </div>
         <div class="col-sm-2">
            <label class="form-label fw-bold" for="estado_civil">Estado civil:</label>
            <input disabled value="<?php echo $historial['estado_civil']?>" type="text" name="estado_civil"
               id="estado_civil" class="form-control">
         </div>
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="nacionalidad">Nacionalidad:</label>
            <input disabled value="<?php echo $historial['nacionalidad']?>" type="text" name="nacionalidad"
               id="nacionalidad" class="form-control">
         </div>
         <div class="col-sm-2">
            <label class="form-label fw-bold" for="n_doc">N° Doc:</label>
            <input disabled value="<?php echo $historial['n_doc']?>" type="text" name="n_doc" id="n_doc"
               class="form-control">
         </div>
         <div class="col-sm-2">
            <label class="form-label fw-bold" for="celular">Celular:</label>
            <input disabled value="<?php echo $historial['celular']?>" type="number" name="celular" id="celular"
               class="form-control" maxlength='10'>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="calle">Calle:</label>
            <input disabled value="<?php echo $historial['calle']?>" type="text" name="calle" id="calle"
               class="form-control">
         </div>
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="numero">Número:</label>
            <input disabled value="<?php echo $historial['numero']?>" type="number" name="numero" id="numero"
               class="form-control">
         </div>
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="colonia">Colonia:</label>
            <input disabled value="<?php echo $historial['colonia']?>" type="text" name="colonia" id="colonia"
               class="form-control">
         </div>
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="localidad">Localidad:</label>
            <input disabled value="<?php echo $historial['localidad']?>" type="text" name="localidad" id="localidad"
               class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="profecion">Profesión/Actividad:</label>
            <input disabled value="<?php echo $historial['profecion']?>" type="text" name="profecion" id="profecion"
               class="form-control">
         </div>
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="titular">Titular:</label>
            <input disabled value="<?php echo $historial['titular']?>" type="text" name="titular" id="titular"
               class="form-control">
         </div>
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="lugar_trabajo">Lugar de trabajo:</label>
            <input disabled value="<?php echo $historial['lugar_trabajo']?>" type="text" name="lugar_trabajo"
               id="lugar_trabajo" class="form-control">
         </div>
         <div class="col-sm-3">
            <label class="form-label fw-bold" for="jerarquia">Jerarquia</label>
            <input disabled value="<?php echo $historial['jerarquia']?>" type="text" name="jerarquia" id="jerarquia"
               class="form-control">
         </div>
      </div>
      <hr>
      <h4>Este cuestionario tiene el tenor de una “Declaración Jurada”</h4>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="padre_vida">¿Padre con vida?</label>
            <select disabled value="<?php echo $historial['padre_vida']?>" class='form-control' name="padre_vida"
               id="padre_vida">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="enfermedad_padre">Enfermedad que padece o
               padeció</label>
            <input disabled value="<?php echo $historial['enfermedad_padre']?>" type="text" name="enfermedad_padre"
               id="enfermedad_padre" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="madre_vida">¿Madre con vida?</label>
            <select disabled value="<?php echo $historial['madre_vida']?>" class='form-control' name="madre_vida"
               id="madre_vida">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="enfermedad_madre">Enfermedad que padece o
               padeció</label>
            <input disabled value="<?php echo $historial['enfermedad_madre']?>" type="text" name="enfermedad_madre"
               id="enfermedad_madre" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="hermanos">¿Hermanos?</label>
            <select disabled value="<?php echo $historial['hermanos']?>" name="hermanos" id="hermanos"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="hermanos_sanos">¿Sanos?</label>
            <input disabled value="<?php echo $historial['hermanos_sanos']?>" type="text" name="hermanos_sanos"
               id="hermanos_sanos" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="enfermedad">¿Sufre de alguna enfermedad?</label>
            <select disabled value="<?php echo $historial['enfermedad']?>" name="enfermedad" id="enfermedad"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="enfermedad_cual">¿De que?</label>
            <input disabled value="<?php echo $historial['enfermedad_cual']?>" type="text" name="enfermedad_cual"
               id="enfermedad_cual" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-4">
            <label class="form-label fw-bold" for="tratamiento_medico">¿Hace algún tratamiento
               médico?</label>
            <select disabled value="<?php echo $historial['tratamiento_medico']?>" name="tratamiento_medico"
               id="tratamiento_medico" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-8">
            <label class="form-label fw-bold" for="tratamiento_cual">¿Cual?</label>
            <input disabled value="<?php echo $historial['tratamiento_cual']?>" type="text" name="tratamiento_cual"
               id="tratamiento_cual" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-12">
            <label class="form-label fw-bold" for="medicamentos_habituales">¿Qué medicamento(s)
               consume
               habitualmente?</label>
            <input type='text' disabled value="<?php echo $historial['medicamentos_habituales']?>"
               name="medicamentos_habituales" id="medicamentos_habituales" cols="30" rows="5"
               class="form-control"></input>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-12">
            <label class="form-label fw-bold" for="medicamentos_anos">¿Qué medicamento(s) consume
               habitualmente?</label>
            <input type='text' disabled value="<?php echo $historial['medicamentos_anos']?>" name="medicamentos_anos"
               id="medicamentos_anos" cols="30" rows="5" class="form-control"></input>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="deporte">¿Realiza algún deporte?</label>
            <select disabled value="<?php echo $historial['deporte']?>" name="deporte" id="deporte"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="molestia_deporte">¿Nota algún malestar al
               realizarlo?</label>
            <select disabled value="<?php echo $historial['molestia_deporte']?>" name="molestia_deporte"
               id="molestia_deporte" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="alergico">¿Es alérgico a alguna droga?</label>
            <select disabled value="<?php echo $historial['alergico']?>" class='form-control' name="alergico"
               id="alergico">
               <option value="anestesia">A la anestesia</option>
               <option value="penicilina">A la penicilina</option>
               <option value="otro">Otro</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="alergico_otro">Otros:</label>
            <input disabled value="<?php echo $historial['alergico_otro']?>" type="text" name="alergico_otro"
               id="alergico_otro" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="cicatriza">¿Cuando le sacan una muela o se lastima,
               cicatriza
               bien?</label>
            <select disabled value="<?php echo $historial['cicatriza']?>" name="cicatriza" id="cicatriza"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="sangra">¿Sangra mucho?</label>
            <input disabled value="<?php echo $historial['sangra']?>" type="text" name="sangra" id="sangra"
               class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="problema_colageno">¿Tiene problema de colágeno
               (hiperlaxitud)?</label>
            <select disabled value="<?php echo $historial['problema_colageno']?>" class='form-control'
               name="problema_colageno" id="problema_colageno">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="fiebre_reumatica">¿Antecedentes de fiebre
               reumática?</label>
            <select disabled value="<?php echo $historial['fiebre_reumatica']?>" class='form-control'
               name="fiebre_reumatica" id="fiebre_reumatica">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-12">
            <label class="form-label fw-bold" for="alguna_medicacion">¿Se protege con alguna
               medicación?</label>
            <input disabled value="<?php echo $historial['alguna_medicacion']?>" type="text" name="alguna_medicacion"
               id="alguna_medicacion" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="diabetico">¿Es diabético?</label>
            <select disabled value="<?php echo $historial['diabetico']?>" name="diabetico" id="diabetico"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="diabetes_con">¿Con qué?</label>
            <input disabled value="<?php echo $historial['diabetes_con']?>" type="text" name="diabetes_con"
               id="diabetes_con" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="problema_cardiaco">¿Tiene algún problema
               cardíaco?</label>
            <select disabled value="<?php echo $historial['problema_cardiaco']?>" name="problema_cardiaco"
               id="problema_cardiaco" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="cardiaco_cual">¿Cuál?</label>
            <input disabled value="<?php echo $historial['cardiaco_cual']?>" type="text" name="cardiaco_cual"
               id="cardiaco_cual" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="toma_aspirina">¿Toma seguido aspirina y/o
               anticoagulante?</label>
            <select disabled value="<?php echo $historial['toma_aspirina']?>" name="toma_aspirina" id="toma_aspirina"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="frecuencia_aspirina">¿Con qué frecuencia?</label>
            <input disabled value="<?php echo $historial['frecuencia_aspirina']?>" type="text"
               name="frecuencia_aspirina" id="frecuencia_aspirina" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-12">
            <label class="form-label fw-bold" for="presion_alta">¿Tiene presión alta?</label>
            <select disabled value="<?php echo $historial['presion_alta']?>" name="presion_alta" id="presion_alta"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="chagas">¿Chagas?</label>
            <select disabled value="<?php echo $historial['chagas']?>" name="chagas" id="chagas" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="tratamiento_chagas">¿Está en tratamiento?</label>
            <input disabled value="<?php echo $historial['tratamiento_chagas']?>" type="text" name="tratamiento_chagas"
               id="tratamiento_chagas" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="problemas_renales">¿Tiene problemas
               renales?</label>
            <select disabled value="<?php echo $historial['problemas_renales']?>" name="problemas_renales"
               id="problemas_renales" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="ulcera_gastrica">¿Ulcera Gástrica?</label>
            <select disabled value="<?php echo $historial['ulcera_gastrica']?>" name="ulcera_gastrica"
               id="ulcera_gastrica" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="hepatitis">¿Tuvo hepatitis?</label>
            <select disabled value="<?php echo $historial['hepatitis']?>" class="form-control" name="hepatitis"
               id="hepatitis">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="tipo_hepatitis">¿De qué tipo?</label>
            <select disabled value="<?php echo $historial['tipo_hepatitis']?>" name="tipo_hepatitis" id="tipo_hepatitis"
               class="form-control">
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
            <select disabled value="<?php echo $historial['problema_hepatico']?>" name="problema_hepatico"
               id="problema_hepatico" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="problema_hepatico_cual">¿Cuál?</label>
            <input disabled value="<?php echo $historial['problema_hepatico_cual']?>" type="text"
               name="problema_hepatico_cual" id="problema_hepatico_cual" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-12">
            <label class="form-label fw-bold" for="convulsiones">¿Tuvo convulsiones?</label>
            <select disabled value="<?php echo $historial['convulsiones']?>" name="convulsiones" id="convulsiones"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="epileptico">¿Es epiléptico?</label>
            <select disabled value="<?php echo $historial['epileptico']?>" name="epileptico" id="epileptico"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="epileptico_medicacion">Medicación que toma</label>
            <input disabled value="<?php echo $historial['epileptico_medicacion']?>" type="text"
               name="epileptico_medicacion" id="epileptico_medicacion" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="sifilis_gonorrea">¿Ha tenido Sífilis o
               Gonorrea?</label>
            <select disabled value="<?php echo $historial['sifilis_gonorrea']?>" name="sifilis_gonorrea"
               id="sifilis_gonorrea" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="infecto_contagiosa">¿Otra enfermedad
               infecto-contagiosa?</label>
            <select disabled value="<?php echo $historial['infecto_contagiosa']?>" name="infecto_contagiosa"
               id="infecto_contagiosa" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="transfusiones">¿Tuvo transfusiones?</label>
            <select disabled value="<?php echo $historial['transfusiones']?>" name="transfusiones" id="transfusiones"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="operado">¿Fue operado alguna vez?</label>
            <select disabled value="<?php echo $historial['operado']?>" name="operado" id="operado"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="operacion">¿De qué?</label>
            <input disabled value="<?php echo $historial['operacion']?>" type="text" name="operacion" id="operacion"
               class="form-control">
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="cuando_operacion">¿Cuándo?</label>
            <input disabled value="<?php echo $historial['cuando_operacion']?>" type="month" name="cuando_operacion"
               id="cuando_operacion" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="problema_respiratorio">¿Tiene algún problema
               respiratorio?</label>
            <select disabled value="<?php echo $historial['problema_respiratorio']?>" name="problema_respiratorio"
               id="problema_respiratorio" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="respiratorio_cual">¿Cuál?</label>
            <input disabled value="<?php echo $historial['respiratorio_cual']?>" type="text" name="respiratorio_cual"
               id="respiratorio_cual" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-12">
            <label class="form-label fw-bold" for="fuma">¿Fuma?</label>
            <select disabled value="<?php echo $historial['fuma']?>" name="fuma" id="fuma" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="embarazo">¿Está embarazada?</label>
            <select disabled value="<?php echo $historial['embarazo']?>" name="embarazo" id="embarazo"
               class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="meses_embarazo">¿De cuántos meses?</label>
            <select disabled value="<?php echo $historial['meses_embarazo']?>" name="meses_embarazo" id="meses_embarazo"
               class="form-control">
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
            <select disabled value="<?php echo $historial['recomendacion_medica']?>" name="recomendacion_medica"
               id="recomendacion_medica" class="form-control">
               <option value="1">Si</option>
               <option value="0">No</option>
            </select>
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="recomendacion_medica_cual">¿Cuál?</label>
            <input disabled value="<?php echo $historial['recomendacion_medica_cual']?>" type="text"
               name="recomendacion_medica_cual" id="recomendacion_medica_cual" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-12">
            <label class="form-label fw-bold" for="tratamiento_extra">¿Realiza algún tipo de
               tratamiento homeopático, Acupuntura,
               otros?</label>
            <input disabled value="<?php echo $historial['tratamiento_extra']?>" type="text" name="tratamiento_extra"
               id="tratamiento_extra" class="form-control">
         </div>
      </div>
      <div class="col-sm-12 row mb-3">
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="medico_clinico">Médico clínico</label>
            <input disabled value="<?php echo $historial['medico_clinico']?>" type="text" name="medico_clinico"
               id="medico_clinico" class="form-control">
         </div>
         <div class="col-sm-6">
            <label class="form-label fw-bold" for="clinica">Clínica/Hospital en caso de hacer falta
               derivación</label>
            <input disabled value="<?php echo $historial['clinica']?>" type="text" name="clinica" id="clinica"
               class="form-control">
         </div>
      </div>
   </div>
</body>

</html>