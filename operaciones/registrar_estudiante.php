<?php

include "../include/conexion.php"; 
include "../include/busquedas.php";

$dni               = $_POST ['dni']; 
$apellidos_nombres = $_POST ['apellidos_nombres']; 
$id_genero         = $_POST ['id_genero']; 
$fecha_nac         = $_POST ['fecha_nac']; 
$direccion         = $_POST ['direccion']; 
$correo            = $_POST ['correo']; 
$telefono          = $_POST ['telefono']; 
$anio_ingreso      = $_POST ['anio_ingreso']
$id_programa_estudios   = $_POST ['id_programa_estudios']; 
$id_semestre      = $_POST ['id_semestre']; 
$seccion          = $_POST ['seccion']; 
$turno          = $_POST ['turno']; 
$id_condicion          = $_POST ['id_condicion']; 
$discapacidad          = $_POST ['discapacidad']; 


$b_estudiante = buscarEstudianteByDni ($conexion, $dni);
$c_r_b_estudiante = mysqli_num_rows($b_estudiante);

if ($c_r_b_estudiante == 0) {//validamos que no haya registros en la base de datos
  
  $insertar = "INSERT INTO estudiante (dni, apellidos_nombres, id_genero, fecha_nac, direccion, correo, telefono,  anio_ingreso, id_programa_estudios, id_semestre, seccion, turno, id_condicion, discapacidad) VALUES ('$dni','$apellidos_nombres', '$id_genero', '$fecha_nac', '$direccion', '$correo', '$telefono', '$anio_ingreso','$id_programa_estudios', '$id_semestre', '$seccion', '$turno', '$id_condicion', '$discapacidad')";
  $ejecutar_insetar = mysqli_query($conexion, $insertar);


  // registrar usuario
  $b_id_estudiante = buscarEstudianteByDni ($conexion, $dni);
  $res_b_estudiante = mysqli_fetch_array($b_id_estudiante);
  $id_estudiante = $res_b_estudiante['id'];
  $pass = "@".$dni."#2022";
  $password_fuerte = password_hash($pass, PASSWORD_DEFAULT);

  $insertar_usu = "INSERT INTO usuarios_estudiante (id_docente, usuario, password) VALUES ('$id_estudiante', '$dni', '$password_fuerte')";
  $ejec_insert_usu = mysqli_query($conexion, $insertar_usu);
  if ($ejec_insert_usu) {
    echo "<script>
                alert('Registro Exitoso');
                window.location= '../estudiante.php'
          </script>";
  }else{
    echo "<script>
      alert('Error al registrar usuario');
      window.history.back();
      </script>
      ";
  }
}else{
  echo "<script>
      alert('El docente ya existe, error al guardar');
      window.history.back();
      </script>
      ";
}


?>