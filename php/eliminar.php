<?php
    
    require_once 'conexion.php';
    session_start();

    $codigo = $_POST['cod'];

    mysqli_query($conexion, "DELETE FROM persona where codigo = '$codigo'")
        or die("Error al borrar");

    mysqli_close($conexion);
    header('Location: registroAdmin.php');
?>