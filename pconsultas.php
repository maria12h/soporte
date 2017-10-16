<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$idtecn="2";
$peticion = "select* from tarea INNER JOIN tecnico on tarea.idtecnico=tecnico.idtecnico WHERE tecnico.tipo='T' AND tecnico.idtecnico='$idtecn'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
	
	echo "".$fila['idtecnico'];
} 

mysqli_close($conexion);
?>
