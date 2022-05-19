<?php
    require_once 'conexion.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar evento</title>
</head>
<body>
    <?php 
    $nombre_evento = $_POST['id_evento'];
    $codigo = $_POST['id_docente'];
    $descripcion_evento = $_POST['descripcion'];
    $fecha_evento = $_POST['fecha'];
    $hora_evento = $_POST['hora'];
    
    $sql = "DELETE FROM `eventos` WHERE `id_docente` = '$codigo'";

    $guardar = mysqli_query($conexion, $sql);

    $validar = "UPDATE maestro SET `evento_creado` = '0' WHERE `id_docente` = '$codigo'";

    $conf = mysqli_query($conexion, $validar);

    if($guardar && $conf){
        $_SESSION['mensaje'] = "<script>alert('Evento eliminado correctamente.');</script>"; header('Location: registroMateriasMaestro.php');
    }else{
        $_SESSION['mensaje'] = "<script>alert('Error al eliminar el evento.');</script>"; header('Location: registroMateriasMaestro.php');
    }

    header('Location: registroMateriasMaestro.php');

    ?>
</body>
</html>