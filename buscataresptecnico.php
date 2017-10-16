<!doctype html>
 <?php include "php/config.inc" ?>
 <?php
 session_start();
 $Nprocesos=0;
 	$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
 	$tildes =$conexion->query("SET NAMES 'utf8'");
				$peticion ="SELECT * FROM rproceso  INNER JOIN area on rproceso.idarea=area.idarea ORDER BY Num_reporte ASC";
				$resultado = mysqli_query($conexion, $peticion);
				while($fila = mysqli_fetch_array($resultado)) {
					 $Nprocesos ++;
				} 


$nombre=$_POST['nombrest'];
$apellido=$_POST['apellidot'];
 echo "<html lang='en'>
<head>
	<meta charset='utf-8'/>
	<title>UNIVERSIDAD NACIONAL MICAELA BASTIDAS DE APURIMAC</title>
    <link rel='icon' type='image/png' href='images/favico.png' />
	<link rel='stylesheet' href='css/layout.css' type='text/css' media='screen' />
	<script src='js/jquery-1.5.2.min.js' type='text/javascript'></script>
	<script src='js/hideshow.js' type='text/javascript'></script>
	<script src='js/jquery.tablesorter.min.js' type='text/javascript'></script>
	<script type='text/javascript' src='js/jquery.equalHeight.js'></script>
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
		<img src='img/loga.png'>
</div>
	<header id='header'>
		<hgroup>
			<h1 class='site_title'><a href='paneladministrador.php'>Panel de Administrador </a></h1>
			<h2 class='section_title'></td>Tareas</h2><div class='btn_view_site'><a href='http://www.medialoot.com'>".$_SESSION['UserA']."</a><a id='cerrar' href='cerrars.php'>Cerrar Sesion</a></div>
		</hgroup>
	</header> 
	
	<section id='secondary_bar'>
		<div class='user'>
			<p>".$_SESSION['UserA']." </p>
		</div>
		<div class='breadcrumbs_container'>
			<article class='breadcrumbs'><a href='paneladministrador.php'>Panel de Administrador</a> <div class='breadcrumb_divider'></div> <a class='current'></a></article>
		</div>
	</section>
	
	<aside id='sidebar' class='column'>
		
	   <h3><img src='img/08.png'>Tareas</h3>
		<ul class='toggle'>
		    <li class='icn_settings'><a href='tareaportecnicos.php'>Tareas por técnicos </a></li>
			<li class='icn_settings'><a href='ListarTareas.php'>Tareas pendientes</a></li>
			<li class='icn_settings'><a href='listarTodasTareas.php'>Tareas finalizadas</a></li>
			<li class='icn_security'><a href='vista/reportareas.php'>Reporte de tareas finalizadas</a></li>
		</ul>
		<h3><img src='img/05.png'>Usuarios</h3>
		<ul class='toggle'>
			<li class='icn_add_user'><a href='insertartecnico.php'>Añadir operador</a></li>
			<li class='icn_add_user'><a href='InsertarArea.php'>Añadir Area</a></li>
			<li class='icn_settings'><a href='listarT.php'>Listar operadores</a></li>
			<li class='icn_settings'><a href='listarA.php'>Listar area</a></li>
			<li class='icn_settings'><a href='Insertarincidencia.php'>Añadir Incidencia</a></li>
			<li class='icn_security'><a href='vista/reporte_usuarios_pdf.php'>Reporte de operadores</a></li>
		</ul>
		<h3><img src='img/07.png'>Problemas</h3>
		<ul class='toggle'>
		<li class='icn_settings'><a href='listarproblema.php'>Listar problemas</a></li>
			<li class='icn_security'><a href='vista/reporteproblema.php'>Reporte de problemas</a></li>
			<li class='icn_security'><a href='vista/reportareas.php'>Reporte de tareas</a></li>
			<li class='icn_security'><a href='vista/reporte_usuarios_pdf.php'>Reporte de usuarios</a></li>
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

			<header><center><h3>TAREAS ENCONTRADAS</h3></center></header>
		<table  border=1 width=950px;>
			";
                $buscar="";
				$peticion = "select* from tarea INNER JOIN tecnico on tarea.idtecnico =tecnico.idtecnico INNER JOIN rproceso on tarea.id_rproceso=rproceso.Num_reporte INNER JOIN area on rproceso.idarea=area.idarea  WHERE tecnico.nombre='$nombre'and tecnico.apellido='$apellido' ORDER BY id_tarea ASC";


							$resultado = mysqli_query($conexion, $peticion);
				echo " <tr id='encabezado'>";
				     echo "<td>Tarea Nº</td>";
				     echo "<td>Descipcion del problema</td>";
				     echo "<td>Nombre de personal</td>";
				     echo "<td>Gerencia/Dirección</td>";
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
	echo'<td>'.$fila['id_tarea']." ".'</td>'.'<td>'.$fila['Descripcion'].'</td>'.'<td>'.$fila['nombre_personal']."".'<td>'.$fila['nom_area']."".'<td>'.$fila['fecha']."".'</td>'.'<td>'.$fila['Estado'].'</td>"';
					echo'</tr>';
				   }
				   
				      
}
} 
			
          echo "</table>
			
		</article><!-- end of post new article -->
		
		<div class='spacer'></div>
	</section>


</body>

</html>";
?>