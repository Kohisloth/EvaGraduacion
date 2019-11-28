<?php

session_start();

if(isset($_SESSION["usuario"])){
	echo "bienvenidos al area de miembros del club";
	$_SESSION["usuario"]=$usuario;
}
else{
	header("Location:login.php");
}

?>
