
<?php include "php/config.inc" ?>
<?php
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$nombre=$_POST['nombres'];
$apellido=$_POST['apellido'];
$dir=$_POST['dir'];
$tel=$_POST['tele'];
$coreo=$_POST['correo'];
$usuario=$_POST['usuario'];
$contra=$_POST['contrasena'];
$tipo=$_POST['tipo'];
$stado="";
$dni="";
$especi=$_POST['especi'];
$peticion="SELECT * FROM tecnico";
$resultado = mysqli_query($conexion, $peticion);
$tildes =$conexion->query("SET NAMES 'utf8'");
$mayor=0;
while($fila = mysqli_fetch_array($resultado)) {
	if($fila['idtecnico']>$mayor)
	{
    $mayor=$fila['idtecnico'];
	}else
	{
     $mayor=$mayor;
	}
} 
$mayor ++;
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion="INSERT INTO tecnico VALUES ($mayor,'$dni','$nombre','$apellido','$dir','$tel','coreo','$stado','$usuario','$contra','$tipo','$especi')";
mysqli_query($conexion,$peticion);
$conexion ->close();
echo "<script>window.location = 'insertartecnico.php'</script>";
?>

