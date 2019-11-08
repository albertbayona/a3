<?php 
$contrasenaMal=0;
if (isset($_POST) && !empty($_POST["user"]) && !empty($_POST["pass"])){
	//si nos entran user y pas hacemos la conexion
	require "./app/connect.php";

 	//$sql = $mdb->prepare("SELECT user,pass,admin FROM users WHERE user=:user AND pass=:pass");
 	$sql = $mdb->prepare("SELECT user,pass,admin FROM users WHERE user=:user");
 	$user =filter_var($_POST["user"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 	$pass =filter_var($_POST["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 	$sql -> bindParam(":user",$user);
 	//$sql -> bindParam(":pass",$pass);

 	$sql -> execute();//se ejecuta sobre el propio objeto
 	$resultado = $sql -> fetch();
 	if ($sql->rowCount() ==1 && password_verify($pass,$resultado["pass"])){
 		session_start();
		$_SESSION["user"] = $user;
 		if($resultado["admin"]==1){
 			$_SESSION["admin"] = 1;
 			header("location:./app/mainAdmin.php");

 		}else{
 			$_SESSION["admin"] = 0;
 			header("location:./app/main.php");

 		}
 	}else{
 		$contrasenaMal=1;
 	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tienda de muebles</title>
	
	<link rel="stylesheet" href="public/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/miCSS.css">

	
</head>
<body class="bg">
	<h1 class="text-center font-weight-bold font-white">Log in</h1>

	<div class="contenedor-flex form50">

		<form class="" method="POST" action="<?php htmlentities($_SERVER['PHP_SELF']);?>">
			<input type="text" name="user" placeholder="User">
			<input type="password" name="pass" placeholder="Pass">
			<input type="submit" name="submit" value="Log in" class="submit">
			<?php 
			if($contrasenaMal ==1){
				echo "<p class='alert alert-warning'>Usuario/contraseña incorrecta</p>";
			}
	 	?>
		</form>
	</div > 
	<div class="contenedor-flex">

		<a href="./app/registre.php">
			<input type="button" name="" value ="Registre">
		</a>
	</div > 

</body>
</html>