<?php 
    require_once 'conexion.php';
    session_start();
    
    $codigo_evento = $_POST['codigo'];
    $id_usuario = $_SESSION['codigo'];
    $id_maestro = $_POST['codigo_maestro'];

    echo $codigo_evento; echo "\n";
    echo $id_usuario; echo "\n";
    echo $id_maestro; echo "\n";

    $consulta = mysqli_query($conexion, "SELECT * FROM `lista_evento` WHERE `id_alumno` LIKE '$id_usuario' AND `id_evento` LIKE '$codigo_evento'");

    if(mysqli_num_rows($consulta) > 0){
        $_SESSION['mensaje'] = "<script>alert('Ya has registrado este evento');</script>";
        header("Location: registro.php");
    }else{
        $sql = "INSERT INTO lista_evento (id_alumno, id_evento, id_docente) VALUES ('$id_usuario', '$codigo_evento', '$id_maestro');";
        $guardar = mysqli_query($conexion, $sql);
        if($guardar){
            $_SESSION['mensaje'] = "<script>alert('Registro exitoso');</script>";
            header("Location: registro.php");
        }else{
            $_SESSION['mensaje'] = "<script>alert('No se ha podido registrar el evento.');</script>";
            //header("Location: registro.php");
        }
    }

    //header("Location: registro.php");
    
?>