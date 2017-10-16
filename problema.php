<!doctype html>
  <?php include "php/config.inc" ?>
 <?php 
 echo "<html lang='en'>
<head>
	<meta charset='utf-8'/>
	<title>UNIVERSIDAD NACIONAL MICAELA BASTIDAS DE APURIMAC</title>
    <link rel='icon' type='image/png' href='images/favico.png' />	
	<link rel='stylesheet' href='css/layout.css' type='text/css' media='screen' />
	<script src='js/jquery-1.5.2.min.js' type='text/javascript'></script>
	<script src='js/hideshow.js' type='text/javascript'></script>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
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
 function preguntar(){

 	var respuesta=confirm('Esta seguro de enviar su problema ');
 	return respuesta;
 }

</script>

</head>

<body>
<div class='ventana_flotante'>
		<img src='img/loga.png'>
</div>
	<header id='header'>
		<hgroup>
			<h1 class='site_title'><a href='index.html'>INICIO</a></h1>
		</hgroup>
		<hgroup>
			<h1 class='site_title'><a href='login.php'>USUARIO</a></h1>
		</hgroup>

	</header> <!-- end of header bar -->
	
	<section id='secondary_bar'>
		
	</section>
	
	<section id='main' class='column'>
		
		<article class='module width_full'>
			<header><h3>Generar Petición </h3></header>
			<div class='module_content'>
				<article class='stats_graph'>
					
				</article>
               	<form action='enviarproblema.php' method='POST''>
                    <table>";
		                    	

		           
		                       	   
                                $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);     
                                $peticion = "SELECT * FROM area";
							    $resultado = mysqli_query($conexion, $peticion);
		                         echo "<tr><td><h2>Area al que pertece:</strong></td>";   	
								 echo "<td><select name='area'>";	  
								 while($fila = mysqli_fetch_array($resultado)) {
				                        echo "<option value='".$fila['idarea']."'>".$fila['nom_area']."</option>";
										} 
			               	    	  echo "</select></td></tr>";
		               	      echo "
                            <tr>
								 <td>
		               	    	 	
		               	    	 </td>
                            		<td><input type='submit' value='SIGUIENTE'></td>

                            </tr>
					       
                    </table>
		       </form>
                 
				<div class='clear'></div>
		 	</div>
		</article><!-- end of stats article -->		
		<div class='tab_container'>	
		</div><!-- end of .tab_container -->
		<div class='spacer'></div>
	</section>
</body>";
?>