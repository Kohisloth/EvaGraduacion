<?php

include("conexion.php");
$nombre=$_POST["nombre"];
$password=hash("whirlpool", $_POST["password"]);
$email=$_POST["email"];

$statement="INSERT INTO usuario(nombre,password,email) VALUES('$nombre','$password','$email')";
$resultado=$conexionBD->query($statement);

if($resultado){
	echo "registro exitoso";

}
else{
	echo "error al registrar";
}

?>
