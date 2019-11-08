<?php 
require 'config.php';
#utilizar pdo para la conexion a al a base de datos

try{

	$mdb = new PDO('mysql:host=localhost; dbname='.$config["dsn"], $config["user"], $config["pass"]);

}catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>