 
<?php include "php/config.inc" ?>
<?php
session_start();
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$problema=$_POST['problema'];
$area=$_SESSION['areao'];
$descrip=$_POST['descripcion'];
$personal=$_POST['nombres'];
$idoficina=$_POST['oficina'];
$detalle="";
$time = time();
$fechas="".date("d-m-Y ");
$peticion="SELECT * FROM rproceso";
$resultado = mysqli_query($conexion, $peticion);
$mayor=0;
while($fila = mysqli_fetch_array($resultado)) {
	if($fila['Num_reporte']>$mayor)
	{
    $mayor=$fila['Num_reporte'];
	}else
	{
     $mayor=$mayor;
	}
} 
$mayor ++;
$porcentaje="0%";
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion="INSERT INTO rproceso VALUES ($mayor,'$problema','$area','$descrip','$personal','$fechas','$porcentaje','$detalle',1,'$idoficina')";
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location = 'problema.php'</script>";
?>


