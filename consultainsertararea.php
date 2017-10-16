
<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$nombre=$_POST['nombres'];
$peticion="SELECT * FROM area";
$resultado = mysqli_query($conexion, $peticion);
$tildes =$conexion->query("SET NAMES 'utf8'");
$mayor=0;
while($fila = mysqli_fetch_array($resultado)) {
	if($fila['idarea']>$mayor)
	{
    $mayor=$fila['idarea'];
	}else
	{
     $mayor=$mayor;
	}
} 
$mayor ++;
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion="INSERT INTO area VALUES ($mayor,'$nombre')";
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location = 'InsertarArea.php'</script>";
?>
