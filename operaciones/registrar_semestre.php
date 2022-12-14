<?php

include "../include/conexion.php";
include "../include/busquedas.php";

$descripcion= $_POST['descripcion'];

$b_descripcion = buscarGenero($conexion, $descripcion);
$c_r_b_descripcion = mysqli_num_rows($b_descripcion);
if ($c_r_b_semestre == 0) {
	$insertar = "INSERT INTO semestre (descripcion) VALUES ('$descripcion')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);

    $b_id_descripcion = buscarEstudianteByDni($conexion, $descripcion);
	$res_b_descripcion = mysqli_fetch_array( $b_id_descripcion);



	
	if ($insertar) {
		echo "<script>
                alert('Registro de semestre Exitoso');
                window.location= '../semestre.php'
    			</script>";
	}else{
		echo "<script>
			alert('Error al Registrar semestre');
			window.history.back();
			</script>
			";
	}

}


?>
