<?php
include('../../db/config.php');

if ($_POST) {

   echo $lugar = isset($_POST['lugar']) ? $_POST['lugar'] : " ";
   echo $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : " ";
   echo $odontologo = isset($_POST['odontologo']) ? $_POST['odontologo'] : " ";
   echo $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : " ";
   echo $paciente = isset($_POST['paciente']) ? $_POST['paciente'] : " ";
   echo $afil = isset($_POST['afil']) ? $_POST['afil'] : " ";
   echo $o_social = isset($_POST['o_social']) ? $_POST['o_social'] : " ";
   echo $f_nac = isset($_POST['f_nac']) ? $_POST['f_nac'] : " ";
   echo $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : " ";
   echo $edad = isset($_POST['edad']) ? $_POST['edad'] : " ";
   echo $estado_civil = isset($_POST['estado_civil']) ? $_POST['estado_civil'] : " ";
   echo $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : " ";
   echo $n_doc = isset($_POST['n_doc']) ? $_POST['n_doc'] : " ";
   echo $celular = isset($_POST['celular']) ? $_POST['celular'] : " ";
   echo $calle = isset($_POST['calle']) ? $_POST['calle'] : " ";
   echo $numero = isset($_POST['numero']) ? $_POST['numero'] : " ";
   echo $colonia = isset($_POST['colonia']) ? $_POST['colonia'] : " ";
   echo $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : " ";
   echo $profecion = isset($_POST['profecion']) ? $_POST['profecion'] : " ";
   echo $titular = isset($_POST['titular']) ? $_POST['titular'] : " ";
   echo $lugar_trabajo = isset($_POST['lugar_trabajo']) ? $_POST['lugar_trabajo'] : " ";
   echo $jerarquia = isset($_POST['jerarquia']) ? $_POST['jerarquia'] : " ";
   echo $padre_vida = isset($_POST['padre_vida']) ? $_POST['padre_vida'] : 0;
   echo $enfermedad_padre = isset($_POST['enfermedad_padre']) ? $_POST['enfermedad_padre'] : " ";
   echo $madre_vida = isset($_POST['madre_vida']) ? $_POST['madre_vida'] : 0;
   echo $enfermedad_madre = isset($_POST['enfermedad_madre']) ? $_POST['enfermedad_madre'] : " ";
   echo $hermanos = isset($_POST['hermanos']) ? $_POST['hermanos'] : 0;
   echo $hermanos_sanos = isset($_POST['hermanos_sanos']) ? $_POST['hermanos_sanos'] : " ";
   echo $enfermedad = isset($_POST['enfermedad']) ? $_POST['enfermedad'] : 0;
   echo $enfermedad_cual = isset($_POST['enfermedad_cual']) ? $_POST['enfermedad_cual'] : " ";
   echo $tratamiento_medico = isset($_POST['tratamiento_medico']) ? $_POST['tratamiento_medico'] : 0;
   echo $tratamiento_cual = isset($_POST['tratamiento_cual']) ? $_POST['tratamiento_cual'] : " ";
   echo $medicamentos_habituales = isset($_POST['medicamentos_habituales']) ? $_POST['medicamentos_habituales'] : " ";
   echo $medicamentos_anos = isset($_POST['medicamentos_anos']) ? $_POST['medicamentos_anos'] : " ";
   echo $deporte = isset($_POST['deporte']) ? $_POST['deporte'] : 0;
   echo $molestia_deporte = isset($_POST['molestia_deporte']) ? $_POST['molestia_deporte'] : 0;
   echo $alergico = isset($_POST['alergico']) ? $_POST['alergico'] : " ";
   echo $alergico_otro = isset($_POST['alergico_otro']) ? $_POST['alergico_otro'] : " ";
   echo $cicatriza = isset($_POST['cicatriza']) ? $_POST['cicatriza'] : 0;
   echo $sangra = isset($_POST['sangra']) ? $_POST['sangra'] : " ";
   echo $problema_colageno = isset($_POST['problema_colageno']) ? $_POST['problema_colageno'] : 0;
   echo $fiebre_reumatica = isset($_POST['fiebre_reumatica']) ? $_POST['fiebre_reumatica'] : 0;
   echo $alguna_medicacion = isset($_POST['alguna_medicacion']) ? $_POST['alguna_medicacion'] : 0;
   echo $diabetico = isset($_POST['diabetico']) ? $_POST['diabetico'] : 0;
   echo $diabetes_con = isset($_POST['diabetes_con']) ? $_POST['diabetes_con'] : " ";
   echo $problema_cardiaco = isset($_POST['problema_cardiaco']) ? $_POST['problema_cardiaco'] : 0;
   echo $cardiaco_cual = isset($_POST['cardiaco_cual']) ? $_POST['cardiaco_cual'] : " ";
   echo $toma_aspirina = isset($_POST['toma_aspirina']) ? $_POST['toma_aspirina'] : 0;
   echo $frecuencia_aspirina = isset($_POST['frecuencia_aspirina']) ? $_POST['frecuencia_aspirina'] : " ";
   echo $presion_alta = isset($_POST['presion_alta']) ? $_POST['presion_alta'] : 0;
   echo $chagas = isset($_POST['chagas']) ? $_POST['chagas'] : 0;
   echo $tratamiento_chagas = isset($_POST['tratamiento_chagas']) ? $_POST['tratamiento_chagas'] : " ";
   echo $problemas_renales = isset($_POST['problemas_renales']) ? $_POST['problemas_renales'] : 0;
   echo $ulcera_gastrica = isset($_POST['ulcera_gastrica']) ? $_POST['ulcera_gastrica'] : 0;
   echo $hepatitis = isset($_POST['hepatitis']) ? $_POST['hepatitis'] : 0;
   echo $tipo_hepatitis = isset($_POST['tipo_hepatitis']) ? $_POST['tipo_hepatitis'] : " ";
   echo $problema_hepatico = isset($_POST['problema_hepatico']) ? $_POST['problema_hepatico'] : 0;
   echo $problema_hepatico_cual = isset($_POST['problema_hepatico_cual']) ? $_POST['problema_hepatico_cual'] : " ";
   echo $convulsiones = isset($_POST['convulsiones']) ? $_POST['convulsiones'] : 0;
   echo $epileptico = isset($_POST['epileptico']) ? $_POST['epileptico'] : 0;
   echo $epileptico_medicacion = isset($_POST['epileptico_medicacion']) ? $_POST['epileptico_medicacion'] : " ";
   echo $sifilis_gonorrea = isset($_POST['sifilis_gonorrea']) ? $_POST['sifilis_gonorrea'] : 0;
   echo $infecto_contagiosa = isset($_POST['infecto_contagiosa']) ? $_POST['infecto_contagiosa'] : 0;
   echo $transfusiones = isset($_POST['transfusiones']) ? $_POST['transfusiones'] : 0;
   echo $operado = isset($_POST['operado']) ? $_POST['operado'] : 0;
   echo $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : " ";
   echo $cuando_operacion = isset($_POST['cuando_operacion']) ? $_POST['cuando_operacion'] : " ";
   echo $problema_respiratorio = isset($_POST['problema_respiratorio']) ? $_POST['problema_respiratorio'] : 0;
   echo $respiratorio_cual = isset($_POST['respiratorio_cual']) ? $_POST['respiratorio_cual'] : " ";
   echo $fuma = isset($_POST['fuma']) ? $_POST['fuma'] : 0;
   echo $embarazo = isset($_POST['embarazo']) ? $_POST['embarazo'] : 0;
   echo $meses_embarazo = isset($_POST['meses_embarazo']) ? $_POST['meses_embarazo'] : " ";
   echo $recomendacion_medica = isset($_POST['recomendacion_medica']) ? $_POST['recomendacion_medica'] : 0;
   echo $recomendacion_medica_cual = isset($_POST['recomendacion_medica_cual']) ? $_POST['recomendacion_medica_cual'] : " ";
   echo $tratamiento_extra = isset($_POST['tratamiento_extra']) ? $_POST['tratamiento_extra'] : " ";
   echo $medico_clinico = isset($_POST['medico_clinico']) ? $_POST['medico_clinico'] : " ";
   echo $clinica = isset($_POST['clinica']) ? $_POST['clinica'] : " ";

   try { 
      $historial = $db->prepare("INSERT INTO historiaClinica (lugar ,fecha ,odontologo ,matricula ,paciente ,afil ,o_social ,f_nac ,telefono ,edad ,estado_civil ,nacionalidad ,n_doc ,celular ,calle ,numero ,colonia ,localidad ,profecion ,titular ,lugar_trabajo ,jerarquia ,padre_vida ,enfermedad_padre ,madre_vida ,enfermedad_madre ,hermanos ,hermanos_sanos ,enfermedad ,enfermedad_cual ,tratamiento_medico ,tratamiento_cual ,medicamentos_habituales ,medicamentos_anos ,deporte ,molestia_deporte ,alergico ,alergico_otro ,cicatriza ,sangra ,problema_colageno ,fiebre_reumatica ,alguna_medicacion ,diabetico ,diabetes_con ,problema_cardiaco ,cardiaco_cual ,toma_aspirina ,frecuencia_aspirina ,presion_alta ,chagas ,tratamiento_chagas ,problemas_renales ,ulcera_gastrica ,hepatitis ,tipo_hepatitis ,problema_hepatico ,problema_hepatico_cual ,convulsiones ,epileptico ,epileptico_medicacion ,sifilis_gonorrea ,infecto_contagiosa ,transfusiones ,operado ,operacion ,cuando_operacion ,problema_respiratorio ,respiratorio_cual ,fuma ,embarazo ,meses_embarazo ,recomendacion_medica ,recomendacion_medica_cual ,tratamiento_extra ,medico_clinico ,clinica) VALUES (:lugar, :fecha, :odontologo, :matricula, :paciente, :afil, :o_social, :f_nac, :telefono, :edad, :estado_civil, :nacionalidad, :n_doc, :celular, :calle, :numero, :colonia, :localidad, :profecion, :titular, :lugar_trabajo, :jerarquia, :padre_vida, :enfermedad_padre, :madre_vida, :enfermedad_madre, :hermanos, :hermanos_sanos, :enfermedad, :enfermedad_cual, :tratamiento_medico, :tratamiento_cual, :medicamentos_habituales, :medicamentos_anos, :deporte, :molestia_deporte, :alergico, :alergico_otro, :cicatriza, :sangra, :problema_colageno, :fiebre_reumatica, :alguna_medicacion, :diabetico, :diabetes_con, :problema_cardiaco, :cardiaco_cual, :toma_aspirina, :frecuencia_aspirina, :presion_alta, :chagas, :tratamiento_chagas, :problemas_renales, :ulcera_gastrica, :hepatitis, :tipo_hepatitis, :problema_hepatico, :problema_hepatico_cual, :convulsiones, :epileptico, :epileptico_medicacion, :sifilis_gonorrea, :infecto_contagiosa, :transfusiones, :operado, :operacion, :cuando_operacion, :problema_respiratorio, :respiratorio_cual, :fuma, :embarazo, :meses_embarazo, :recomendacion_medica, :recomendacion_medica_cual, :tratamiento_extra, :medico_clinico, :clinica) ");
      $historial->bindParam(':lugar', $lugar);
      $historial->bindParam(':fecha', $fecha);
      $historial->bindParam(':odontologo', $odontologo);
      $historial->bindParam(':matricula', $matricula);
      $historial->bindParam(':paciente', $paciente);
      $historial->bindParam(':afil', $afil);
      $historial->bindParam(':o_social', $o_social);
      $historial->bindParam(':f_nac', $f_nac);
      $historial->bindParam(':telefono', $telefono);
      $historial->bindParam(':edad', $edad);
      $historial->bindParam(':estado_civil', $estado_civil);
      $historial->bindParam(':nacionalidad', $nacionalidad);
      $historial->bindParam(':n_doc', $n_doc);
      $historial->bindParam(':celular', $celular);
      $historial->bindParam(':calle', $calle);
      $historial->bindParam(':numero', $numero);
      $historial->bindParam(':colonia', $colonia);
      $historial->bindParam(':localidad', $localidad);
      $historial->bindParam(':profecion', $profecion);
      $historial->bindParam(':titular', $titular);
      $historial->bindParam(':lugar_trabajo', $lugar_trabajo);
      $historial->bindParam(':jerarquia', $jerarquia);
      $historial->bindParam(':padre_vida', $padre_vida);
      $historial->bindParam(':enfermedad_padre', $enfermedad_padre);
      $historial->bindParam(':madre_vida', $madre_vida);
      $historial->bindParam(':enfermedad_madre', $enfermedad_madre);
      $historial->bindParam(':hermanos', $hermanos);
      $historial->bindParam(':hermanos_sanos', $hermanos_sanos);
      $historial->bindParam(':enfermedad', $enfermedad);
      $historial->bindParam(':enfermedad_cual', $enfermedad_cual);
      $historial->bindParam(':tratamiento_medico', $tratamiento_medico);
      $historial->bindParam(':tratamiento_cual', $tratamiento_cual);
      $historial->bindParam(':medicamentos_habituales', $medicamentos_habituales);
      $historial->bindParam(':medicamentos_anos', $medicamentos_anos);
      $historial->bindParam(':deporte', $deporte);
      $historial->bindParam(':molestia_deporte', $molestia_deporte);
      $historial->bindParam(':alergico', $alergico);
      $historial->bindParam(':alergico_otro', $alergico_otro);
      $historial->bindParam(':cicatriza', $cicatriza);
      $historial->bindParam(':sangra', $sangra);
      $historial->bindParam(':problema_colageno', $problema_colageno);
      $historial->bindParam(':fiebre_reumatica', $fiebre_reumatica);
      $historial->bindParam(':alguna_medicacion', $alguna_medicacion);
      $historial->bindParam(':diabetico', $diabetico);
      $historial->bindParam(':diabetes_con', $diabetes_con);
      $historial->bindParam(':problema_cardiaco', $problema_cardiaco);
      $historial->bindParam(':cardiaco_cual', $cardiaco_cual);
      $historial->bindParam(':toma_aspirina', $toma_aspirina);
      $historial->bindParam(':frecuencia_aspirina', $frecuencia_aspirina);
      $historial->bindParam(':presion_alta', $presion_alta);
      $historial->bindParam(':chagas', $chagas);
      $historial->bindParam(':tratamiento_chagas', $tratamiento_chagas);
      $historial->bindParam(':problemas_renales', $problemas_renales);
      $historial->bindParam(':ulcera_gastrica', $ulcera_gastrica);
      $historial->bindParam(':hepatitis', $hepatitis);
      $historial->bindParam(':tipo_hepatitis', $tipo_hepatitis);
      $historial->bindParam(':problema_hepatico', $problema_hepatico);
      $historial->bindParam(':problema_hepatico_cual', $problema_hepatico_cual);
      $historial->bindParam(':convulsiones', $convulsiones);
      $historial->bindParam(':epileptico', $epileptico);
      $historial->bindParam(':epileptico_medicacion', $epileptico_medicacion);
      $historial->bindParam(':sifilis_gonorrea', $sifilis_gonorrea);
      $historial->bindParam(':infecto_contagiosa', $infecto_contagiosa);
      $historial->bindParam(':transfusiones', $transfusiones);
      $historial->bindParam(':operado', $operado);
      $historial->bindParam(':operacion', $operacion);
      $historial->bindParam(':cuando_operacion', $cuando_operacion);
      $historial->bindParam(':problema_respiratorio', $problema_respiratorio);
      $historial->bindParam(':respiratorio_cual', $respiratorio_cual);
      $historial->bindParam(':fuma', $fuma);
      $historial->bindParam(':embarazo', $embarazo);
      $historial->bindParam(':meses_embarazo', $meses_embarazo);
      $historial->bindParam(':recomendacion_medica', $recomendacion_medica);
      $historial->bindParam(':recomendacion_medica_cual', $recomendacion_medica_cual);
      $historial->bindParam(':tratamiento_extra', $tratamiento_extra);
      $historial->bindParam(':medico_clinico', $medico_clinico);
      $historial->bindParam(':clinica', $clinica);
      $historial->execute();
      ?>
<script>
window.location.href = "../index.php?status=success";
</script>
<?php
   } catch (\Throwable $th) {
      throw $th;
   }

} else {
   ?>
<script>
window.location.href = "../index.php"
</script>
<?php
}