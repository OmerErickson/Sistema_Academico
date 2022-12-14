<?php
include "../include/conexion.php";
include "../include/busquedas.php";

$cargo= $_POST['descripcion'];

$b_descripcion = buscarCargo($conexion, $cargo);
$c_r_b_descripcion = mysqli_num_rows($b_descripcion);
if ($c_r_b_cargo == 0) {
	$insertar = "INSERT INTO cargo (descripcion) VALUES ('$cargo')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);

    $b_id_descripcion = buscarCargo($conexion, $cargo);
	$res_b_descripcion = mysqli_fetch_array( $b_id_descripcion);



	
	if ($insertar ) {
		echo "<script>
                alert('Registro de Cargo Exitoso');
                window.location= '../cargos.php'
    			</script>";
	}else{
		echo "<script>
			alert('Error al Registrar Cargo');
			window.history.back();
			</script>
			";
	}

}


?>