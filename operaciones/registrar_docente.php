<?php

include "../include/conexion.php"; 
include "../include/busquedas.php";

$dni               = $_POST ['dni']; 
$apellidos_nombres = $_POST ['apellidos_nombres']; 
$fecha_nac         = $_POST ['fecha_nac']; 
$direccion         = $_POST ['direccion']; 
$correo            = $_POST ['correo']; 
$telefono          = $_POST ['telefono']; 
$id_genero         = $_POST ['id_genero']; 
$nivel_educacion   = $_POST ['nivel_educacion']; 
$cond_laboral      = $_POST ['cond_laboral']; 
$id_cargo          = $_POST ['id_cargo']; 


$b_docente = buscarDocenteByDni($conexion, $dni);
$c_r_b_docente = mysqli_num_rows($b_docente);
$consulta = "INSERT INTO docente (dni, apellidos_nombres, fecha_nac, direccion, correo, telefono, id_genero, nivel_educacion, cond_laboral, id_cargo) VALUES ('$dni', '$apellidos_nombres', '$fecha_nac', '$direccion', '$correo','$telefono','$id_genero','$nivel_educacion','$cond_laboral','$id_cargo')"; //insertar valores 

$ejec_consulta =mysqli_query($conexion, $consulta); //ejecutar la consulta

if ($ejec_consulta) {  //validar la consulta 
    echo "<script>
      alert('resgistro satisfactorio');
      window.location = '../index2.php';
    </script>";
} else{
    echo "<script>
    alert('error de registro');
    window.history. back();
  </script>";
}
?>