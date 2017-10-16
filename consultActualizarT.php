<?php include "php/config.inc" ?>
<?php
session_start();
$idetecnico=$_SESSION['IdeAte'];
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$nombre=$_POST['nombres'];
$apellido=$_POST['apellido'];
$dir=$_POST['dir'];
$tel=$_POST['tele'];
$coreo=$_POST['correo'];
$especi=$_POST['especi'];
$usuario=$_POST['usuario'];
$contra=$_POST['contrasena'];
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion=("UPDATE tecnico SET nombre='$nombre', apellido='$apellido', direccion='$dir',  telefono='$tel' , correo='$coreo',login='$usuario', clave='$contra' , especialidad='$especi' WHERE idtecnico='$idetecnico'");
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location ='listarT.php'</script>";
?>
