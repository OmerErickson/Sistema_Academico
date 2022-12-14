<?php
include "../include/conexion.php";
include "../include/busquedas.php";

$descripcion     = $_POST['descripcion'];
$id_programa_estudio       = $_POST['id_programa_estudio'];
$id_modulo     = $_POST['id_modulo'];
$id_semestre = $_POST['id_semestre'];
$creditos = $_POST['creditos'];
$horas = $_POST['horas'];
$tipo = $_POST['tipo'];
$orden = $_POST['orden'];

$b_unidad_didactica = buscarUnidadDidactica($conexion, $descripcion);
$c_r_b_unidad_didactica = mysqli_num_rows($b_unidad_didactica);
if ($c_r_b_unidad_didactica == 0) {

	$insertar = "INSERT INTO programa_estudios (descripcion, id_programa_estudio, id_modulo, id_semestre, creditos, horas, tipo, orden) VALUES ('$descripcion','$id_programa_estudio','$id_modulo', '$id_semestre', '$creditos', '$horas', '$tipo', '$orden')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	
	if ($ejecutar_insetar) {
		echo "<script>
                alert('Registro Exitoso programa de estudios');
                window.location= '../unidad_didacticas.php'
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