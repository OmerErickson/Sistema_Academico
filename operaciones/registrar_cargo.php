<?php
include "../include/conexion.php";
include "../include/busquedas.php";
$cargo= $_POST['descripcion'];

$b_cargo = buscarCargo($conexion, $cargo);
$c_r_b_cargo = mysqli_num_rows($b_cargo);
if ($c_r_b_cargo == 0) {
    $insertar = "INSERT INTO cargo (descripcion) VALUES ('$cargo')";
    $ejecutar_insetar = mysqli_query($conexion, $insertar);

    $b_id_cargo = buscarCargo($conexion, $cargo);
    $res_b_cargo = mysqli_fetch_array( $b_id_cargo);

    if ($insertar) {
        
                echo "<script>
                alert('Registro de Cargo Exitoso');
                window.location= '../cargo.php'
                </script>";
    }else {
        echo "<script>
            alert('Error al Registrar Cargo');
            window.history.back();
            </script>
            ";
    }
}

?>