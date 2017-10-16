<!doctype html>
 <?php include "../php/config.inc" ?>
 <?php
 session_start();
 $_SESSION['reporte']=$_GET['idre']; 
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
			<h2 class='section_title'>Tareas</h2><div class='btn_view_site'><a href='http://www.medialoot.com'>".$_SESSION['UseT']."</a><a id='cerrar' href='../cerrars.php'>Cerrar Sesion</a></div>
		</hgroup>
	</header> 
	
	<section id='secondary_bar'>
		<div class='user'>
			<p>".$_SESSION['UseT']." (<a href='#''>3 Messages</a>)</p>
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
	    <h3>Tareas</h3>
		<ul class='toggle'>
			<li class='icn_settings'><a href='../tecnico/tecnico.php'>Tareas</a></li>
		</ul>
		<footer>
			<hr />
			<p><strong>Copyright &copy; Estudiantes de Informatica</strong></p>
			<p><a href='http://www.medialoot.com'>Universidad Nacional Micaela Bastidas de Apurimac</a></p>
		</footer>
	</aside>
	
	<section id='main' class='column'>
		
		
		
		<div class='clear'></div>
		
		<article class='module width_full'>
			<header><h3>Actualizar Tareas</h3></header>
		<table border=1 width=950px;>
			";
  					echo "<form action='../tecnico/consultaActu.php' method='POST'>
                   		<table>";
		                    	
		                                               
		               	      echo "<tr>
			                    	  <td> Estado del problema</td>	
									  <td><select name='estado'> 
				                      <option value='0%'>0%</option>
				                      <option value='10%'>10%</option>
				                      <option value='20%'>20%</option>
				                      <option value='30%'>30%</option>
				                      <option value='40%'>40%</option>
				                      <option value='50%'>50%</option>
				                      <option value='60%'>60%</option>
				                      <option value='70%'>70%</option>
				                      <option value='80%'>80%</option>
				                      <option value='90%'>90%</option>
				                      <option value='100%'>100%</option>
			               	    	  </select></td>
		               	    		
		                     </tr>
		                    <tr>
							</tr>
		               	    <tr>
									<td>
										Descripcio
									</td>
									<td>
										<textarea name='descripcion' style='margin: 0px; width: 378px; height: 100px;''> </textarea>
									</td>
							</tr>
                            <tr>
								 <td>
		               	    	 	Actualizar
		               	    	 </td>
                            		<td><input type='submit' value ='Actualizar'></td>

                            </tr>
					       
                    </table>";
           echo "</table>
			
		</article><!-- end of post new article -->
		
		<div class='spacer'></div>
	</section>


</body>

</html>";
?>