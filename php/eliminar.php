<?php
    
    require_once 'conexion.php';
    session_start();

    $codigo = $_POST['cod'];

    mysqli_query($conexion, "DELETE FROM persona where codigo = '$codigo'")
        or die("Error al borrar");

    mysqli_close($conexion);

    $_SESSION['mensaje'] = "<script>alert('El usuario fue eliminado con éxito.');</script>";

    header('Location: registroAdmin.php');
?>