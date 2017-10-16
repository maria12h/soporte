<!doctype html>
 <?php include "../php/config.inc" ?>
 <?php
 session_start();
$sumaT=0;
 $idtecn=$_SESSION['idtecc'];
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$tildes =$conexion->query("SET NAMES 'utf8'");
$peticion = "select* from tarea INNER JOIN tecnico on tarea.idtecnico =tecnico.idtecnico INNER JOIN rproceso on tarea.id_rproceso=rproceso.Num_reporte INNER JOIN area on rproceso.idarea=area.idarea INNER JOIN oficina on oficina.Idoficiana=rproceso.Idoficina  WHERE tarea.idtecnico='$idtecn'and tecnico.tipo='T' ORDER BY id_tarea DESC";
                 
$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)) {
				if($fila['Estado']=="100%"){
					$sumaT++;
				}
				} 

 echo "<html lang='en'>

<head>
	<meta charset='utf-8'/>
	<title>UNIVERSIDAD NACIONAL MICAELA BASTIDAS DE APURIMAC</title>
    <link rel='icon' type='../image/png' href='../images/favico.png' />
	<link rel='stylesheet' href='../css/layout.css' type='text/css' media='screen' />
	<script src='../js/jquery-1.5.2.min.js' type='text/javascript'></script>
	<script src='../js/hideshow.js' type='text/javascript'></script>
	<script src='../js/jquery.tablesorter.min.js' type='text/javascript'></script>
	<script type='text/javascript' src='../js/jquery.equalHeight.js'></script>
	<script type='text/javascript'>
	$(document).ready(function() 
    	{ 
      	  $('.tablesorter').tablesorter(); 
   	 } 
	);
	$(document).ready(function() {
	$('.tab_content').hide(); 
	$('ul.tabs li:first').addClass('active').show();
	$('.tab_content:first').show();
	$('ul.tabs li').click(function() {

		$('ul.tabs li').removeClass('active');
		$(this).addClass('active');
		$('.tab_content').hide();

		var activeTab = $(this).find('a').attr('href'); 
		$(activeTab).fadeIn();
		return false;
	});

});
    </script>
    <script type='text/javascript'>
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>

<body>
<div class='ventana_flotante'>
		<img src='../img/loga.png'>
</div>

	<header id='header'>
		<hgroup>
			<h1 class='site_title'><a href='../tecnico/tecnico.php'>TECNICO</a></h1>
			<h2 class='section_title'>Tareas</h2><div class='btn_view_site'><a href='http://www.medialoot.com'>".$_SESSION['UseT']."</a><a id='cerrar' href='../cerrars.php'>Cerrar Sesion</a></div>
		</hgroup>
	</header> 
	
	<section id='secondary_bar'>
		<div class='user'>
			<p>".$_SESSION['UseT']." (<a href='#''>".$sumaT.":Messages </a>)</p>
		</div>
		<div class='breadcrumbs_container'>
			<article class='breadcrumbs'><a href='../tecnico/tecnico.php'>Panel del Tecnico</a> <div class='breadcrumb_divider'></div> <a class='current'></a></article>
		</div>
	</section>
	
	<aside id='sidebar' class='column'>
		
	    <h3><img src='../img/08.png'>Tareas</h3>
		<ul class='toggle'>
			<li class='icn_settings'><a href='../tecnico/tecnico.php'>Tareas Pendientes</a></li>
			<li class='icn_settings'><a href='../tecnico/tecnico.php'>Tareas Finalizadas</a></li>
		</ul>
		<footer>
			<hr />
			<p><strong>Copyright &copy; Estudiantes de Informatica</strong></p>
			<p><a href=''>Universidad Nacional Micaela Bastidas de Apurimac</a></p>
		</footer>
	</aside>
	
	<section id='main' class='column'>
		
		<div class='clear'></div>
		
		<article class='module width_full'>
			<header><h3>Tareas</h3></header>
<form action='buscartarea.php' method='POST'><input id ='buscar' name='nombresta' value='' type='text'> <input id ='btnbuscar' type='submit' value='Buscar tarea'></form >

		<table border=1 width=950px;>
			";
$peticion = "select* from tarea INNER JOIN tecnico on tarea.idtecnico =tecnico.idtecnico INNER JOIN rproceso on tarea.id_rproceso=rproceso.Num_reporte INNER JOIN area on rproceso.idarea=area.idarea INNER JOIN oficina on oficina.Idoficiana=rproceso.Idoficina  WHERE tarea.idtecnico='$idtecn'and tecnico.tipo='T' ORDER BY id_tarea DESC";
                 
				$resultado = mysqli_query($conexion, $peticion);
				echo " <tr id='encabezado'>";
				     echo "<td>Tarea Nº</td>";
				     echo "<td>Descipcion del problema</td>";
				     echo "<td>Nombre de personal</td>";
				     echo "<td>Gerencia/Dirección</td>";
				     echo "<td>Oficina</td>";
				     echo "<td>Fecha</td>";
				     echo "<td>Estado</td>";

				echo " </tr>";
				while($fila = mysqli_fetch_array($resultado)) {

if($fila['Condicion'] =='0')
{

				if($fila['Estado']=="100%")
					{
					echo"<tr id='estacien'>";
				//if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
	echo'<td>'.$fila['id_tarea']." ".'</td>'.'<td>'.$fila['Descripcion'].'</td>'.'<td>'.$fila['nombre_personal']."".'<td>'.$fila['nom_area']."".'<td>'.$fila['Nombreoficina']."".'</td>'.'<td>'.$fila['fecha']."".'</td>'.'<td>'.$fila['Estado'].'</td>"';
					echo'</tr>';
				   }
				   
				      
}
} 
				
				mysqli_close($conexion);
           echo "</table>
			
		</article><!-- end of post new article -->
		
		<div class='spacer'></div>
	</section>


</body>

</html>";
?>