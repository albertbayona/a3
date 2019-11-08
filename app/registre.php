<?php 

if (isset($_POST) && !empty($_POST["user"]) && !empty($_POST["pass"]) && !empty($_POST["passConf"])){
	//si nos entran user y pas hacemos la conexion
	//añadimos la confirmacion de contraseña
	if($_POST["pass"]==$_POST["passConf"]){
		require "connect.php";
		$user = filter_var($_POST["user"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 		$pass = filter_var($_POST["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 		$pass = password_hash($pass, PASSWORD_BCRYPT);
	 	$sql = $mdb->prepare("INSERT INTO users (user,pass,admin) VALUES ('".$user."','".$pass."',0)");
	 	//$sql -> bindParam(":user",$user);
	 	print_r($sql);
	 	//$sql -> execute();//se ejecuta sobre el propio objeto
	 	try{
		//entra

			$sql -> execute();

		}catch (Exception $e) {
		    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}

	 	if ($sql->rowCount() ==1){
	 		header("location:../index.php");
	 	}
 	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title >Registre</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../public/css/miCSS.css">
	
</head>
<body class="bg">
	<h1 class="text-center font-weight-bold font-white">Registre</h1>
	<div class="contenedor-flex form50">
		<form method="POST" action="<?php htmlentities($_SERVER['PHP_SELF']);?>">
			<input type="text" name="user" placeholder="User">
			<input type="password" name="pass" placeholder="Pass">
			<input type="password" name="passConf" placeholder="PassConf">
			<input type="submit" name="submit" value="Sign in" class="submit">
		</form>
	</div>
</body>
</html>