<?php
setcookie("Cookies_aceptadas", true, time()+3600*24*12,"/",localhost,0); 
header("location:../index.php");
?>