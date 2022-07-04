<?php
    require_once 'conexion.php';
    session_start();

    $nombre_evento = $_POST['nombre_evento'];
    $descripcion_evento = $_POST['descripcion'];
    $codigo = $_SESSION['codigo'];
    $fecha_evento = $_POST['fecha_evento'];
    $hora_evento = $_POST['hora_evento'];

    echo $hora_evento;

    $consulta = mysqli_query($conexion, "SELECT evento_creado FROM maestro WHERE codigo = '$codigo'");

    $arreglo = mysqli_fetch_assoc($consulta);

    if($arreglo['evento_creado'] == 1){

        $_SESSION['mensaje'] = "<script>alert('Usted ya ha registrado un evento.');</script>"; header('Location: registroMateriasMaestro.php');

    }else{
        $errores = 0;

        if(!preg_match("/[0-9]/", $nombre_evento) && !empty($nombre_evento)){
            $nombre_correcto = true;
            echo "El nombre del evento es válido"; echo "<br>";
        }else{
            $errores += 1;
            $nombre_correcto = false;
            $_SESSION['mensaje'] = "<script>alert('Carácter inválido para el nombre, revíselo.');</script>"; header('Location: registroMateriasMaestro.php');
        }

        if(!empty($descripcion_evento)){
            $descripcion_correcto = true;
            echo "La descripción del evento es válido"; echo "<br>";
        }else{
            $errores += 1;
            $descripcion_correcto = false;
            $_SESSION['mensaje'] = "<script>alert('Carácter inválido para la descripción, revíselo.');</script>"; header('Location: registroMateriasMaestro.php');
        }

        if(!empty($fecha_evento)){
            $fecha_correcto = true;
            echo "La fecha del evento es válido"; echo "<br>";
        }else{
            $errores += 1;
            $fecha_correcto = false;    
    }

        if(!empty($hora_evento)){
            $hora_correcto = true;
            echo "La hora del evento es válido"; echo "<br>";
        }else{
            $errores += 1;
            $hora_correcto = false;
        }

        if($errores == 0){

            $sql = "INSERT INTO `eventos`(`nombre_evento`, `descripcion`, `id_docente`, fecha, hora) VALUES ('$nombre_evento','$descripcion_evento','$codigo', '$fecha_evento', '$hora_evento')";

            $consulta = mysqli_query($conexion, $sql);

            var_dump($consulta);

            $registro_evento = "UPDATE maestro SET evento_creado = 1 WHERE codigo = '$codigo'";

            $exito = mysqli_query($conexion, $registro_evento);
            
            if($consulta && $exito){

                $_SESSION['mensaje'] = "<script>alert('Evento registrado con éxito.');</script>"; header('Location: registroMateriasMaestro.php');
            }else{
                $_SESSION['mensaje'] = "<script>alert('Error al registrar el evento.');</script>"; header('Location: registroMateriasMaestro.php');
            }
        }

}//Fin del if

?>