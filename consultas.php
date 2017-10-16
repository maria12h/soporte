<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion="SELECT MAX(Num_reporte) as maximo FROM rproceso";
$resultado = mysqli_query($conexion, $peticion);
$fer = mysqli_fetch_assoc($resultado);
echo $fer['maximo'];
$conexion ->close();

?>
