<?php
include "../include/conexion.php";
include "../include/busquedas.php";

$id_periodo_acad= $_POST['id_periodo_acad'];

$b_id_periodo_acad = buscarPresentePeriodoAcademico($conexion, $id_periodo_acad);
$c_r_b_id_periodo_acad = mysqli_num_rows($b_id_periodo_acad);
if ($c_r_b_id_periodo_acad == 0) {
	$insertar = "INSERT INTO presente_periodo_acad (id_periodo_acad) VALUES ('$id_periodo_acad')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);

    $b_id_periodo_acad = buscarCargo($conexion, $id_periodo_acad);
	$res_b_id_periodo_acad = mysqli_fetch_array( $b_id_periodo_acad);



	
	if ($insertar ) {
		echo "<script>
                alert('Registro de Cargo Exitoso');
                window.location= '../cargo.php'
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