<?php
include "../include/conexion.php";
include "../include/busquedas.php";
$genero = $_POST['genero']

$b_genero = buscarGenero($conexion, $genero);
$c_r_b_genero = mysqli_num_rows($b_genero);
if ($c_r_b_programa_estudios == 0) {
    $insertar = "INSERT INTO generos (genero) VALUES ('$genero')";
    $ejecutar_insetar = mysqli_query($conexion, $insertar);

    $b_id_genero = buscarGenero($conexion, $genero);
    $res_b_genero = mysqli_fetch_array( $b_id_genero);

    if ($insertar) {
        
                echo "<script>
                alert('Registro de Genero Exitoso');
                window.location= '../generos.php'
                </script>";
    }else {
        echo "<script>
            alert('Error al Registrar genero');
            window.history.back();
            </script>
            ";
    }
}

?>