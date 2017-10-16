  <!DOCTYPE html>
 <html>
 

  <?php include "php/config.inc" ?>
 <?php
 echo "<html lang='en'>
 <meta charset='utf-8'/>
 <head>
 <title>UNIVERSIDAD NACIONAL MICAELA BASTIDAS DE APURIMAC</title>
 <meta name='viewport' content='width=device-width, initial-escale=1.0'>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
		<link rel='stylesheet' type='text/css' href='login.css'>

  <link rel='icon' type='image/png' href='images/favico.png' />
 <link rel='stylesheet' href='css/user.css' type='text/css' media='screen' />
 <link rel='stylesheet' href='css/layout.css' type='text/css' media='screen' />
</meta>
 </head>

<body style='Background-color:#006400;'>
	<div class='ventana_flotante'>
			<img src='img/loga.png'>
	</div>
		<header id='header'>
			<hgroup>
				<h1 class='site_title'><a href='index.html'>INICIO</a></h1>
			</hgroup>
			<hgroup>
			<h1 class='site_title'><a href='problema.php'>INCIDENCIAS</a></h1>
		</hgroup>
		</header> 
	
	<div class='jumbotron boxlogin' style='Background-color:#4169E1;'>
	<center><div id='lo'>LOGIN</div></center>
		<form action='php/logcliente.php' method='POST'>
			<input type='text' name='usuario' placeholder='usuario' class='form-control'></br>
			<input type='password' name='contrasena' placeholder='contraseña' class='form-control'></br>
			<input id ='boton' type='submit' value='Ingresar' class='btn btn-success'>
		</form>
	</div>
</body>";
?>

 </html>