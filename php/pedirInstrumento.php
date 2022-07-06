<?php
    require_once 'conexion.php';
    session_start();

    $codigo = $_POST['codigo_alumno'];
    echo $codigo; echo "<br>";
    $codigo_instrumento = $_POST['codigo_instrumento'];
    echo $codigo_instrumento; echo "<br>";
    $nombre_instrumento = $_POST['nombre_instrumento'];
    echo $nombre_instrumento; echo "<br>";
    $tipo_instrumento = $_POST['tipo_instrumento'];
    echo $tipo_instrumento; echo "<br>";
    $descripcion = $_POST['descripcion'];
    echo $descripcion; echo "<br>";
    $estatus_instrumento = $_POST['estatus_instrumento'];
    echo $estatus_instrumento; echo "<br>";
    $aux = "activo";

    //Uptate instrumento, only if the status is "activo"
    if ($estatus_instrumento != $aux) {
        $sql = "UPDATE instrumento SET estatus_instrumento = 'pendiente', id_alumno = $codigo WHERE codigo_instrumento = $codigo_instrumento;";
        $guardar = mysqli_query($conexion, $sql);
        if ($guardar) {
            $_SESSION['mensaje'] = "<script>alert('Se ha pedido el instrumento. No olvide descargar el formato de préstamo.');</script>"; header("Location: servicios.php");
        } else {
            $_SESSION['mensaje'] = "<script>alert('Ocurrió un error, intente de nuevo.');</script>"; header('Location: servicios.php');
        }
    } else {
        $_SESSION['mensaje'] = "<script>alert('No se puede actualizar el instrumento, porque el estatus es \"inactivo\".');</script>"; header('Location: servicios.php');
    }
    
    header('Location: servicios.php');





?>