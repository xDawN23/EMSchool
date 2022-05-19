<?php
    require_once 'conexion.php';
    session_start();

    $nombre_evento = $_POST['id_evento'];
    $codigo = $_POST['codigo'];
    $descripcion_evento = $_POST['descripcion'];
    $fecha_evento = $_POST['fecha'];
    $hora_evento = $_POST['hora'];

    echo $nombre_evento; echo "<br>";
    echo $descripcion_evento; echo "<br>";
    echo $fecha_evento; echo "<br>"; 
    echo $hora_evento; echo "<br>";
    echo $codigo; echo "<br>";

    $sql = "UPDATE `eventos` SET nombre_evento = '$nombre_evento', `descripcion`='$descripcion_evento',`fecha`='$fecha_evento' WHERE `id_docente`='$codigo'";

    $guardar = mysqli_query($conexion, $sql);

    if($guardar){
        $_SESSION['mensaje'] = "<script>alert('Evento actualizado correctamente.');</script>"; //header('Location: registroMateriasMaestro.php');
    }else{
        $_SESSION['mensaje'] = "<script>alert('Error al actualizar el evento.');</script>"; //header('Location: registroMateriasMaestro.php');
    }

    //header('Location: registroMateriasMaestro.php');

?>