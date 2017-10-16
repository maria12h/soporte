<?php include "config.inc" ?>
<?php
session_start();
$contador=0;
$tipo="";
$admi="";
$idtec="";
 
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
mysqli_set_charset($conexion,"utf8");
$peticion = "SELECT * FROM tecnico WHERE login ='".$_POST['usuario']."' AND clave ='".$_POST['contrasena'] ."' ";
$resultado = mysqli_query($conexion, $peticion);
while ($fila=mysqli_fetch_array($resultado)) {
	$contador=$contador+1;
	$tipo=$fila['tipo'];
    $admi=$fila['nombre'];
    $idtec=$fila['idtecnico'];
}
if($contador>0)
{
	
			if($tipo=='T')
			{	 
			 $_SESSION['UseT']=$admi;
			 $_SESSION['idtecc']=$idtec;
			echo "<script>window.location = '../tecnico/tecnico.php'</script>";
			}
			if($tipo=='AD')
			{
		     $_SESSION['UserA']=$admi;
			echo "<script>window.location = '../paneladministrador.php'</script>";
			}
	
}else
{
	echo "<script>document.location.href='../login.php';</script>";
}



?>

