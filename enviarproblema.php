 <!doctype html>
  <?php include "php/config.inc" ?>
 <?php
 session_start();
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

<body style='Background-color:#ffffff>
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
			<header><h3>Generar petición</h3></header>
			<div class='module_content'>
				<article class='stats_graph'>
					
				</article>
               	<form action='rproceso.php' method='POST''>
                    <table>";
		                    	

		           
		                       	$are=$_POST['area'];
		                       	$_SESSION['areao']=$are;

                                $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
                                $tildes =$conexion->query("SET NAMES 'utf8'");
                                $peticion = "SELECT * FROM oficina WHERE idareaso='$are'";
							    $resultado = mysqli_query($conexion, $peticion);
		                         echo "<tr><td><h2>Oficina  de:</h2></td>";   	
								 echo "<td><select class='tamano' name='oficina'>";	  
								 while($fila = mysqli_fetch_array($resultado)) {
				                        echo "<option value='".$fila['Idoficiana']."'>".$fila['Nombreoficina']."</option>";
										} 
			               	    	  echo "</select></td></tr>";

								$peticion = "SELECT * FROM problema order by idproblema";
										$resultado = mysqli_query($conexion, $peticion);
			                    	 echo "<tr><td><h2>Problema</h2></td>";	
									 echo "<td><select class='tamano' name='problema'>";
				                     while($fila = mysqli_fetch_array($resultado)) {
				                        echo "<option  value='".$fila['idproblema']."'>".$fila['nom_problema']."</option>";
										} 
			               	    	  echo "</select></td></tr>";

		               	      echo "<tr>

									<td>
										<h2>Nombre y Apellidos</h2>
									</td>
									<td>
										<input class='tamano' name='nombres' type='text'></td>
									</td>
							</tr>
		               	    <tr>
									<td>
										<h2>Reporte del problema</h2>
									</td>
									<td>
										<textarea name='descripcion' style='margin: 0px; width: 378px; height: 100px;''> </textarea>
									</td>
							</tr>
                            <tr>
								 <td>
		               	    	 	<h2>Enviar problema</h2>
		               	    	 </td>
                            		<td><input type='submit' onclick='return preguntar()'></td>

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