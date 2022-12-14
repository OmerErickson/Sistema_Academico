<?php
include "../include/conexion.php";
include "../include/busquedas.php";

$codigo     = $_POST['codigo'];
$tipo       = $_POST['tipo'];
$nombre     = $_POST['nombre'];
$resolucion = $_POST['resolucion'];

$b_programa_estudios = buscarProgramaEstudio($conexion, $codigo);
$c_r_b_programa_estudios = mysqli_num_rows($b_programa_estudios);
if ($c_r_b_programa_estudios == 0) {
	$insertar = "INSERT INTO programa_estudios (codigo, tipo, nombre, resolucion) VALUES ('$codigo','$tipo','$nombre', '$resolucion')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	
	$b_programa_estudios = buscarProgramaEstudio($conexion, $programa_estudios);
	$res_b_programa_estudios = mysqli_fetch_array( $b_programa_estudios);


	if ($ejecutar_insetar) {
		echo "<script>
                alert('Registro Exitoso programa de estudios');
                window.location= '../programa_estudios.php'
    			</script>";
	}else{
		echo "<script>
			alert('Error al programa de estudios');
			window.history.back();
			</script>
			";
	}
}


?>