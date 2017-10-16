<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$ideproceso=$_GET['idrepH'];
$condicion="1";
$peticion=("UPDATE rproceso SET Condicion='$condicion' WHERE Num_reporte='$ideproceso'");
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location = 'ListarTareas.php'</script>";
?>
