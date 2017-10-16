<!doctype html>
 <?php include "../php/config.inc" ?>
 <?php
 session_start();
$sumaT=0;
 $idtecn=$_SESSION['idtecc'];
$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
$peticion = "select* from tarea INNER JOIN tecnico on tarea.idtecnico =tecnico.idtecnico INNER JOIN rproceso on tarea.id_rproceso=rproceso.Num_reporte INNER JOIN area on rproceso.idarea=area.idarea WHERE tarea.idtecnico='$idtecn'and tecnico.tipo='T' ORDER BY id_tarea ASC";
$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)) {
					$sumaT++;
				} 

 echo "<html lang='en'>

<head>
	<meta charset='utf-8'/>
	<title>Dashboard I Admin Panel</title>	
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
			<h2 class='section_title'>Tareas</h2><div class='btn_view_site'><a href='http://www.medialoot.com'>".$_SESSION['UseT']."</a></div>
		</hgroup>
	</header> 
	
	<section id='secondary_bar'>
		<div class='user'>
			<p>".$_SESSION['UseT']." (<a href='#''>".$sumaT.":Messages Nuevos</a>)</p>
		</div>
		<div class='breadcrumbs_container'>
			<article class='breadcrumbs'><a href='../login.php'>Panel del Tecnico</a> <div class='breadcrumb_divider'></div> <a class='current'></a></article>
		</div>
	</section>
	
	<aside id='sidebar' class='column'>
		<form class='quick_search'>
			<input type='text' value='Quick Search' onfocus='if(!this._haschanged){this.value=''};this._haschanged=true;''>
		</form>
		<hr/>
	    <h3><img src='../img/08.png'>Tareas</h3>
		<ul class='toggle'>
			<li class='icn_settings'><a href='../tecnico/tecnico.php'>Tareas</a></li>
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
						<p class='overview_day'>Nuevos Ticket</p>
						<p class='overview_count'>".$sumaT."</p>
						<p class='overview_type'>Hits</p>
					</div>
					<div class='overview_previous'>
						<p class='overview_day'>Ticket pendientes</p>
						<p class='overview_count'>".$sumaT."</p>
						<p class='overview_type'>Hits</p>
					</div>
				</article>
				<div class='clear'></div>
			</div>
		</article>
		
		<div class='clear'></div>
		
		<article class='module width_full'>
			<center><header><h3>Listar de Tareas Encontradas</h3></header><center>
		<table border=1 width=950px;>
			";
			$buscar=$_POST['nombresta'];
$peticion = "select* from tarea INNER JOIN tecnico on tarea.idtecnico =tecnico.idtecnico INNER JOIN rproceso on tarea.id_rproceso=rproceso.Num_reporte INNER JOIN area on rproceso.idarea=area.idarea WHERE tarea.idtecnico='$idtecn'and tecnico.tipo='T'  and nombre_personal like '%$buscar%'";
                 
				$resultado = mysqli_query($conexion, $peticion);
				echo " <tr id='encabezado'>";
				     echo "<td>Tarea Nº</td>";
				     echo "<td>Descipcion del problema</td>";
				     echo "<td>Nombre de personal</td>";
				     echo "<td>Area</td>";
				     echo "<td>Fecha</td>";
				     echo "<td>Estado</td>";
				     echo "<td>Operaciones</td>";

				echo " </tr>";
				while($fila = mysqli_fetch_array($resultado)) {

if($fila['Condicion'] =='1'){

				if($fila['Estado']=="100%")
					{
					echo"<tr id='estacien'>";
				//if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
			echo'<td>'.$fila['id_tarea']." ".'</td>'.'<td>'.$fila['Descripcion'].'</td>'.'<td>'.$fila['nombre_personal']."".'<td>'.$fila['nom_area']."".'</td>'.'<td>'.$fila['fecha']."".'</td>'.'<td>'.$fila['Estado'].'<td><a href="../tecnico/actualizar.php?idre='.$fila['Num_reporte'].' "><input type="submit" value ="Actualizar tarea" title="Modificar"> </a></td>"';
					echo'</tr>';
				   }
				   if($fila['Estado']=="50%" || $fila['Estado']=="70%" || $fila['Estado']=="80%" || $fila['Estado']=="90%")
					{
					echo"<tr id='etamenoscien'>";
				//if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
			echo'<td>'.$fila['id_tarea']." ".'</td>'.'<td>'.$fila['Descripcion'].'</td>'.'<td>'.$fila['nombre_personal']."".'<td>'.$fila['nom_area']."".'</td>'.'<td>'.$fila['fecha']."".'</td>'.'<td>'.$fila['Estado'].'<td><a href="../tecnico/actualizar.php?idre='.$fila['Num_reporte'].' "><input type="submit" value ="Actualizar tarea" title="Modificar"> </a></td>"';
					echo'</tr>';
				   }
				      if($fila['Estado']=="0%" || $fila['Estado']=="10%" || $fila['Estado']=="20%" || $fila['Estado']=="30%" || $fila['Estado']=="40%")
					{
					echo "<tr id='etamenorcincuenta'>";
				//if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
			echo'<td>'.$fila['id_tarea']." ".'</td>'.'<td>'.$fila['Descripcion'].'</td>'.'<td>'.$fila['nombre_personal']."".'<td>'.$fila['nom_area']."".'</td>'.'<td>'.$fila['fecha']."".'</td>'.'<td>'.$fila['Estado'].'<td><a href="../tecnico/actualizar.php?idre='.$fila['Num_reporte'].' "><input type="submit" value ="Actualizar tarea" title="Modificar"> </a></td>"';
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