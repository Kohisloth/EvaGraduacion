<?php
include("conexion.php");
$mesa="";
$plantillaMesa = file_get_contents("../templates/mesa.html");
$plantillaSilla = file_get_contents("../templates/silla.html");

$statementMesas = "SELECT id,numero FROM mesas";
$resultadosSetMesas = $conexionBD->query($statementMesas);

foreach($resultadosSetMesas as $fila) {
	$silla = "";

	$idMesa = $fila["id"];

	$statementSillas = "SELECT S.id, S.posicion, R.paquete,U.nombre
	From sillas S
	LEFT JOIN reservaciones R ON R.idSilla = S.id
	LEFT JOIN usuario U ON U.id = R.idUsuarios
	WHERE S.id_mesa = $idMesa";

	$resultadosSetSillas = $conexionBD->query($statementSillas);

	foreach ($resultadosSetSillas as $fila) {
		$idSilla = $fila["id"];
		$nombre = $fila["nombre"];

		$posicion = $fila["posicion"];
		$reservada = $fila["paquete"] ? "silla-reservada":"";
		$mensaje = $nombre ?"title=\"Esta silla ya la tiene $nombre\"":"";

		$silla .=sprintf($plantillaSilla,$posicion,$reservada,$mensaje,$idSilla);
	}
	
	$mesa .=sprintf($plantillaMesa,$idMesa,$silla);

}
echo$mesa;
?>