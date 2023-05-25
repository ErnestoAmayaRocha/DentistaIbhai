<?php
include("cn.php");

$nombre=$_POST["nombre"];
$edad=$_POST["edad"];
$direccion=$_POST["direccion"];
$correo=$_POST["correo"];
$telefono=$_POST["telefono"];
$odontologo=$_POST["odontologo"];

$insertar ="INSERT INTO pacientes (id, nombre, direccion, edad, correo, telefono, fk_doctor) VALUES (NULL, '$nombre', '$edad', '$direccion', '$correo', '$telefono', $odontologo)";
$resultado = mysqli_query($conexion,$insertar);
if($resultado){
 header("Location: pacientes.php?status=success");
}else{
     header("Location: pacientes.php?status=error");

}