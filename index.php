<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php

        echo('HOLA')
        ?>
        <title>UNIVERSIDAD NACIONAL MICAELA BASTIDAS</title>
        <link rel="icon" type="image/png" href="images/favico.png" />
        <meta name="description" content="">


        <link rel="stylesheet" href="css/bg_principal.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Kite+One' rel='stylesheet' type='text/css'>

		<script src="js/jquery.js"></script>
		<script src="js/jquery.backstretch.js"></script>

		<script>

		$(document).ready(function(){
			
			$.backstretch(["./img/fondo2.jpg"]);
			//$("#fondoFull").backstretch("./img/02.jpg");

		
		});	
		  	

		</script>
		

     </head>

<body style='Background-color:#483D8B;'>

<div class="ventana_flotante">
<!--<img src="img/loga.png"> <!--imagen del logo de la UNAMBA-->
</div>
<div id="fondoFull1">

			<h1 id="mesatitulo"><p>SOPORTE DE INCIDENCIAS</p></h1>
	
</div>
<div id="fondoFull">
			<a href="problema.php"><img id="user"src="img/02.jpg"></a>INCIDENCIA
		    <a href="login.php"><img id="admin" src="img/01.png"></a>USUARIO
	
</div>



</body></html>