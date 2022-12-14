<?php
include "../include/conexion.php";
include "../include/busquedas.php";

$descrip     = $_POST['descripcion'];
$nro_modulo       = $_POST['nro_modulo'];
$id_programa_estudio     = $_POST['id_programa_estudio'];


$b_descrip  = buscarProgramaEstudio($conexion, $descrip );
$c_r_b_descrip  = mysqli_num_rows($b_descrip );
if ($c_r_b_programa_estudios == 0) {
	$insertar = "INSERT INTO programa_estudios (descripcion, nro_modulo, id_programa_estudio) VALUES ('$descrip','$nro_modulo','$id_programa_estudio')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	


	if ($ejecutar_insetar) {
		echo "<script>
                alert('Registro Exitoso programa de estudios');
                window.location= '../modulo_profesional.php'
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