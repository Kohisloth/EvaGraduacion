<?php
    session_start();
    $idUsuario=$_SESSION["datosUsuario"]["id"];
    include("conexion.php");
    $idSilla=$_POST["silla"];

    $sql = "SELECT * FROM usuarios_paquetes";
    $paquete=$conexionBD->query($sql);
    if(mysqli_num_rows($paquete)>0){
        $fila = $paquete->fetch_array(MYSQLI_ASSOC);

        $_SESSION['Usuario']=$fila['idUsuarios'];
        $_SESSION['Paquete']=$fila['paquete'];
        $_SESSION['Lugares']=$fila['lugares'];
    }
    else {
        echo "No hay resultados";
    }
    $paquete1=$_SESSION['Paquete'];


    $statementr="INSERT INTO reservaciones (idSilla,idUsuarios,paquete) VALUES ('$idSilla','$idUsuario','$paquete1')";  
    
    $resultado= $conexionBD->query($statementr);
    if($resultado){
        echo "Registro exitoso";
    }
    else{
        echo "Error en el registro :(";
    }
?>