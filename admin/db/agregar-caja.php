<?php
include('../../db/config.php');

if ($_POST) {

   echo $odontologo = isset($_POST['odontologo']) ? $_POST['odontologo'] : " ";
   echo $pacienteV = isset($_POST['paciente']) ? $_POST['paciente'] : " ";
   echo $concepto = isset($_POST['concepto']) ? $_POST['concepto'] : " ";
   echo $monto = isset($_POST['monto']) ? $_POST['monto'] : " ";
   echo $tipo_pago = isset($_POST['tipo_pago']) ? $_POST['tipo_pago'] : " ";
   echo $comprobante = isset($_POST['comprobante']) ? $_POST['comprobante'] : " ";
   echo $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : " ";

   try{
   $paciente = $db->prepare("INSERT INTO caja (odontologo, paciente, concepto, monto, tipo_pago, comprobante, comentario) VALUES (:odontologo, :paciente, :concepto, :monto, :tipo_pago, :comprobante, :comentario) ");
   $paciente->bindParam(':odontologo', $odontologo);
   $paciente->bindParam(':paciente', $pacienteV);
   $paciente->bindParam(':concepto', $concepto);
   $paciente->bindParam(':monto', $monto);
   $paciente->bindParam(':tipo_pago', $tipo_pago);
   $paciente->bindParam(':comprobante', $comprobante);
   $paciente->bindParam(':comentario', $comentario);
   $paciente->execute();
   ?>
<script>
window.location.href = "../caja.php";
</script>
<?php
} catch (\Throwable $th) {
      throw $th;
   }

} else {
   ?>
<script>
window.location.href = "../calendario.php"
</script>
<?php
}