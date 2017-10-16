<?php include "../php/config.inc" ?>
<?php
session_start();
$idereporte=$_SESSION['reporte'];
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$nivelE=$_POST['estado'];
$Detallep=$_POST['descripcion'];
$peticion=("UPDATE rproceso SET Estado ='$nivelE',Detalle='$Detallep' WHERE Num_reporte='$idereporte'");
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location = '../tecnico/tecnico.php'</script>";
?>
