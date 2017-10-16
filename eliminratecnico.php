<?php include "php/config.inc" ?>
<?php

$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$id=$_GET['idreTe'];
$peticion=("DELETE FROM tecnico WHERE idtecnico='$id'");
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location ='listarT.php'</script>";
?>
