<?php include "php/config.inc" ?>
<?php
session_start();
$idearea=$_SESSION['IdeAte'];
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$nombre=$_POST['nombres'];
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion=("UPDATE problema SET nom_problema='$nombre' WHERE idproblema='$idearea'");
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location ='listarproblema.php'</script>";
?>
