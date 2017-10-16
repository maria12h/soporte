<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
session_start();
$idproceos=$_SESSION['idreporte'];
$idtecnico=$_GET['idT'];
$mayor=0;
$peticion="SELECT * FROM tarea";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
	if($fila['id_tarea']>$mayor)
	{
    $mayor=$fila['id_tarea'];
	}else
	{
     $mayor=$mayor;
	}
} 
$mayor ++;
$time = time();
$fechas="".date("d-m-Y ");
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion="INSERT INTO tarea VALUES ($mayor,'$fechas','$idproceos','$idtecnico')";
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location = 'paneladministrador.php'</script>";

?>


