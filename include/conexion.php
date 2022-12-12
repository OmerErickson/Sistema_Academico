<?php
// conexion utiliza servidor-usuario-password-base de datos
//$conexion = mysqli_connect("localhost", "root", "root", "SIS_ACAD");
$conexion = mysqli_connect("localhost", "ceicom_omer", "omertaboada2001", "ceicom_omer");
if ($conexion) {

} else {
   echo "conexion fallida";
}
?>