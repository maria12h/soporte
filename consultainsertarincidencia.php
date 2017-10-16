
<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$nombre=$_POST['nombres'];
$peticion="SELECT * FROM problema";
$resultado = mysqli_query($conexion, $peticion);
$tildes =$conexion->query("SET NAMES 'utf8'");
$mayor=0;
while($fila = mysqli_fetch_array($resultado)) {
	if($fila['idproblema']>$mayor)
	{
    $mayor=$fila['idproblema'];
	}else
	{
     $mayor=$mayor;
	}
} 
$mayor ++;
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion="INSERT INTO problema VALUES ($mayor,'$nombre')";

$CONDICION=mysqli_query($conexion,$peticion);
if($CONDICION==TRUE){

	echo "<script>window.location = 'registrarincidenciaregistrado.php'</script>";
}

$conexion ->close();
echo "<script>window.location = 'Insertarincidencia.php'</script>";
?>
