<!doctype html>
 <?php include "../php/config.inc" ?>
 <?php
 session_start();
 echo "<html lang='en'>

<head>
	<meta charset='utf-8'/>
	<title>UNIVERSIDAD NACIONAL MICAELA BASTIDAS DE APURIMAC</title>
    <link rel='icon' type='image/png' href='images/favico.png' />
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
			<h2 class='section_title'>Listar Tikets</h2><div class='btn_view_site'><a href='http://www.medialoot.com'>".$_SESSION['UseT']."</a><a id='cerrar' href='../cerrars.php'>Cerrar Sesion</a></div>
		</hgroup>
	</header> 
	
	<section id='secondary_bar'>
		<div class='user'>
			<p>".$_SESSION['UseT']." (<a href='#''>3 Messages</a>)</p>
		</div>
		<div class='breadcrumbs_container'>
			<article class='breadcrumbs'><a href='../login.php'>Panel de Adminitrador</a> <div class='breadcrumb_divider'></div> <a class='current'></a></article>
		</div>
	</section>
	
	<aside id='sidebar' class='column'>
		<form class='quick_search'>
			<input type='text' value='Quick Search' onfocus='if(!this._haschanged){this.value=''};this._haschanged=true;''>
		</form>
		<hr/>
	    <h3>Tareas</h3>
		<ul class='toggle'>
			<li class='icn_edit_article'><a href='ListarTareas.php'>Listar Tareas</a></li>
			<li class='icn_edit_article'><a href='#''>Buscar tareas</a></li>
		</ul>
		<h3>Tikes</h3>
		<ul class='toggle'>
			<li class='icn_settings'><a href='../tecnico/tecnico.php'>Listar</a></li>
			<li class='icn_security'><a href='#''>buscar</a></li>
			<li class='icn_jump_back'><a href='#'>Actualizar</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; Practicantes de Informatica</strong></p>
			<p><a href='http://www.medialoot.com'>Gobierno regional de apurimac</a></p>
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
						<p class='overview_day'>Nuevos Ticket</p>
						<p class='overview_count'>1,876</p>
						<p class='overview_type'>Hits</p>
					</div>
					<div class='overview_previous'>
						<p class='overview_day'>Ticket pendientes</p>
						<p class='overview_count'>1,646</p>
						<p class='overview_type'>Hits</p>
					</div>
				</article>
				<div class='clear'></div>
			</div>
		</article>
		
		<div class='clear'></div>
		
		<article class='module width_full'>
			<header><h3>Ticket</h3></header>
		<table border=1 width=950px;>
			";

			$idtecn=$_SESSION['idtecc'];
			$procesor=$_GET['idTD'];
			echo "string".$procesor;
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	$peticion = "select* from rproceso INNER JOIN area on rproceso.idarea=area.idarea WHERE rproceso.Num_reporte='$procesor' ";

				$resultado = mysqli_query($conexion, $peticion);
				echo " <tr>";
				     echo "<td>Nombre del peersonal</td>";
				     echo "<td>Area</td>";
				     echo "<td>Descripcion</td>";
				     echo "<td>Fecha</td>";
				     echo "<td>Numero de reporte</td>";
				     echo "<td>operaciones</td>";
				echo " </tr>";
				while($fila = mysqli_fetch_array($resultado)) {
					echo'<tr>';
				//if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
					echo'<td>'.$fila['nombre_personal']." ".'</td>'.'<td>'.$fila['nom_area'].'</td>'.'<td>'.$fila['Descripcion']."".'<td>'.$fila['fecha']."".'</td>'.'<td>'.$fila['Num_reporte']."".'</td>'.'<td></td>';
					echo'</tr>';
				} 
				mysqli_close($conexion);
           echo "</table>
			
		</article><!-- end of post new article -->
		
		<div class='spacer'></div>
	</section>


</body>

</html>";
?>