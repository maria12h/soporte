 <!doctype html>
 <?php include "php/config.inc" ?>
 <?php
 session_start();
 $_SESSION['idreporte']=$_GET['id'];
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
			<h1 class='site_title'><a href='paneladministrador.php'>Panel de Administrador</a></h1>
			<h2 class='section_title'>Asignar Tareas</h2><div class='btn_view_site'><a href='http://www.medialoot.com'>Vista del sitio</a><a id='cerrar' href='cerrars.php'>Cerrar Sesion</a></div>
		</hgroup>
	</header> 
	
	<section id='secondary_bar'>
		<div class='user'>
			<p>".$_SESSION['UserA']."</p>
		</div>
		<div class='breadcrumbs_container'>
			<article class='breadcrumbs'><a href='paneladministrador'>Panel de Administrador</a> <div class='breadcrumb_divider'></div> <a class='current'></a></article>
		</div>
	</section>
	
	<aside id='sidebar' class='column'>
		
	    <h3><img src='img/08.png'>Tareas</h3>
		<ul class='toggle'>
		    <li class='icn_settings'><a href='tareaportecnicos.php'>Tareas por técnicos </a></li>
			<li class='icn_settings'><a href='ListarTareas.php'>Tareas Pendientes</a></li>
			<li class='icn_settings'><a href='listarTodasTareas.php'>Tareas finalizadas</a></li>
			<li class='icn_security'><a href='vista/reportareas.php'>Reporte de tareas finalizadas</a></li>
		</ul>
		<h3><img src='img/05.png'>Operadores</h3>
		<ul class='toggle'>
			<li class='icn_add_user'><a href='insertartecnico.php'>Añadir operador</a></li>
			<li class='icn_add_user'><a href='InsertarArea.php'>Añadir Area</a></li>
			<li class='icn_settings'><a href='listarT.php'>Listar operadores</a></li>
			<li class='icn_security'><a href='vista/reporte_usuarios_pdf.php'>Reporte de operadores</a></li>
		</ul>
		<h3><img src='img/07.png'>Problemas</h3>
		<ul class='toggle'>
			<li class='icn_settings'><a href='paneladministrador.php'>Listar problemas</a></li>
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
			<header><h3>Tecnicos</h3></header>
		<table border=1 width=950px;>
			";
				$contador=0;
				$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
				$tildes =$conexion->query("SET NAMES 'utf8'");
				$repor= $_SESSION['idreporte'];

               $peticion = "SELECT * FROM tarea WHERE id_rproceso='$repor'";
               $resultado = mysqli_query($conexion, $peticion);
               while ($fila=mysqli_fetch_array($resultado)) {
					$contador=$contador+1;
					}
               if($contador>0)
               {
				echo "<script>window.location = 'paneladministrador.php'</script>";
                $_SESSION['DTarea']="La tarea a sido asignada";

               }else
               {
                
                $peticion = "SELECT * FROM tecnico WHERE tipo='T'";
				$resultado = mysqli_query($conexion, $peticion);
				echo " <tr id='encabezado'>";
				     echo "<td>IdTecnico</td>";
				     echo "<td>Nombre</td>";
				     echo "<td>Apellido</td>";
				     echo "<td>Telefono</td>";
				     echo "<td>Especialidad</td>";
				     echo "<td>operaciones</td>";
				echo " </tr>";
				while($fila = mysqli_fetch_array($resultado)) {
					echo"<tr id='tecnicoss'>";
					echo'<td>'.$fila['idtecnico']." ".'</td>'.'<td>'.$fila['nombre'].'</td>'.'<td>'.$fila['apellido']."".'<td>'.$fila['telefono']."".'</td>'.'<td>'.$fila['especialidad']."".'</td>'.'<td><a href="casignartarea.php?idT='.$fila['idtecnico'].'"><input id="botonen" type="submit" value="Asignar personal" title="Asignar personal"></a></td>';
					echo'</tr>';
				} 
               }
				mysqli_close($conexion);
				
          echo "</table> </article><!-- end of post new article --><div class='spacer'></div></section></body></html>";
			
		
?>