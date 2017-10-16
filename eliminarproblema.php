<?php include "php/config.inc" ?>
<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$id=$_GET['idreTe'];
$peticion=("DELETE FROM problema WHERE idproblema='$id'");
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location ='listarproblema.php'</script>";
?>