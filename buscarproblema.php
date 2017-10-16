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
			<h2 class='section_title'></td>Listar Problemas</h2><div class='btn_view_site'><a href='http://www.medialoot.com'>".$_SESSION['UserA']."</a><a id='cerrar' href='cerrars.php'>Cerrar Sesion</a></div>
		</hgroup>
	</header> 
	
	<section id='secondary_bar'>
		<div class='user'>
			<p>".$_SESSION['UserA']." (<a>Mensajes Nuevos</a>)</p>
		</div>
		<div class='breadcrumbs_container'>
			<article class='breadcrumbs'><a href='paneladministrador.php'>Panel de Adminitrador</a> <div class='breadcrumb_divider'></div> <a class='current'></a></article>
		</div>
	</section>
	
	<aside id='sidebar' class='column'>
		<form class='quick_search'>
			<input type='text' value='Quick Search' onfocus='if(!this._haschanged){this.value=''};this._haschanged=true;''>
		</form>
		<hr/>
		<h3><img src='img/04.png'>Estadistica </h3>
		<ul class='toggle'>
			<li class='icn_jump_back'><a href='estadistica/index.php'>Estadistica del personal</a></li>
		</ul>
	    <h3><img src='img/08.png'>Tareas</h3>
		<ul class='toggle'>
		    <li class='icn_settings'><a href='tareaportecnicos.php'>Tareas por técnicos </a></li>
			<li class='icn_settings'><a href='ListarTareas.php'>Tareas pendientes</a></li>
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
		<article class='module width_full'>
			<header><h3>Stats</h3></header>
			<div class='module_content'>
				<article class='stats_graph'>
					<img src='http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30' width='520' height='140' alt='' />
				</article>
				
				<article class='stats_overview'>
					<div class='overview_today'>
						<p class='overview_day'>Nuevos Problemas</p>
						<p class='overview_count'>".$Nprocesos."</p>
						<p class='overview_type'>Hits</p>
					</div>
					<div class='overview_previous'>
						<p class='overview_day'>Problemas pendientes</p>
						<p class='overview_count'>".$Nprocesos."</p>
						<p class='overview_type'>Hits</p>
					</div>
				</article>
				<div class='clear'></div>
			</div>
		</article>
		
		<div class='clear'></div>
		
		<article class='module width_full'>

			<header><center><h3>Lista de problemas encontrados</h3></center></header>
		<table  border=1 width=950px;>
			";
                $buscar=$_POST['nombresb'];
				$peticion ="SELECT * FROM rproceso  INNER JOIN area on rproceso.idarea=area.idarea where nombre_personal like '%$buscar%' ";
				$resultado = mysqli_query($conexion, $peticion);
				
				echo " <tr id='encabezado'>";
				     echo "<td>Nº reporte</td>";
				     echo "<td>Nombre del personal</td>";
				     echo "<td>Incidencia</td>";
				     echo "<td>Area</td>";
				     echo "<td>Fecha</td>";
				     echo "<td>operaciones</td>";
				echo " </tr>";
				while($fila = mysqli_fetch_array($resultado)) {
				if($fila['Condicion'] =='1'){
						if($fila['Estado']=="0%")
						{
	                    echo"<tr id='PnuevoI'>";
					//if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
						echo'<td>'.$fila['Num_reporte']." ".'</td>'.'<td>'.$fila['nombre_personal'].'</td>'.'<td>'.$fila['Descripcion']."".'<td>'.$fila['nom_area'].'<td>'.$fila['fecha']."".'</td>'.'<td>Asignar personal<a href="Asignartareas.php?id='.$fila['Num_reporte'].'"><input type="image" src="images/icn_add_user.png" title="Asignar personal"></a></td>';
						echo'</tr>';
						}else
						{
						echo"<tr id='colortecnico'>";
					//if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
						echo'<td>'.$fila['Num_reporte']." ".'</td>'.'<td>'.$fila['nombre_personal'].'</td>'.'<td>'.$fila['Descripcion']."".'<td>'.$fila['nom_area'].'<td>'.$fila['fecha']."".'</td>'.'<td>Asignar personal<a href="Asignartareas.php?id='.$fila['Num_reporte'].'"><input type="image" src="images/icn_add_user.png" title="Asignar personal"></a></td>';
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