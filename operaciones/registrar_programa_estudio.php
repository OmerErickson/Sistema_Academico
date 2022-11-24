<?php
include "../include/conexion.php";
include "../include/busquedas.php";

$codigo = $_POST ['codigo'];
$tipo = $_POST ['tipo'];
$nombre = $_POST ['nombre'];
$resoluion = $_POST ['resolucion'];

$b_programa_estudio = buscarProgramaEstudio ($conexion, $codigo);
$c_r_b_programa_estudio = mysqli_num_rows($b_programa_estudio);
if ($c_r_b_programa_estudio == 0) {
    $insertar = "INSERT INTO programa_estudios (codigo, tipo, nombre, resolucion) VALUES ('$codigo', '$tipo', '$nombre', '$resoluion')";
    $ejecutar_insertar = mysqli_query ($conexion, $insertar);
    
    if ($ejecutar_insertar) {
        echo "<script>
                alert('Registro Exitoso');
                window.location= '../programa_estudios.php'
          </script>";
    }else {

        echo "<script>
                alert('Erro al Registrar');
                window.history.back();
          </script>";
    }
}


?>