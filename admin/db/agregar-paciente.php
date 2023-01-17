<?php
include('../../db/config.php');

if ($_POST) {

   echo $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : " ";
   echo $edad = isset($_POST['edad']) ? $_POST['edad'] : " ";
   echo $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : " ";
   echo $correo = isset($_POST['correo']) ? $_POST['correo'] : " ";
   echo $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : " ";
   echo $odontologo = isset($_POST['odontologo']) ? $_POST['odontologo'] : " ";

   try{
   $paciente = $db->prepare("INSERT INTO pacientes (nombre, edad, direccion, correo, telefono, odontologo) VALUES (:nombre, :edad, :direccion, :correo, :telefono, :odontologo) ");
   $paciente->bindParam(':nombre', $nombre);
   $paciente->bindParam(':edad', $edad);
   $paciente->bindParam(':direccion', $direccion);
   $paciente->bindParam(':correo', $correo);
   $paciente->bindParam(':telefono', $telefono);
   $paciente->bindParam(':odontologo', $odontologo);
   $paciente->execute();
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