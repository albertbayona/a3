<?php 

session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pantalla user</title>

	<link rel="stylesheet" href="../public/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../public/css/miCSS.css">
 </head>
 <body>
	 	<header class="contenedor-flex">
	 		<h1>
		 	<?= "Hola ".$_SESSION["user"]?>
	 		</h1>
	 		<p>
	 			Benvingut.
	 		</p>
	 
	 	</header>
	</body>
 </html>