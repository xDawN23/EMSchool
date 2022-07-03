<?php 
    require_once 'conexion.php';
    session_start();

    if(isset($_POST)){
        $codigo = $_POST['codigo']; 
        $codigoMaestro = $_POST['codigoMaestro'];
        $nombreMateria = $_POST['materia'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];
        $aula = $_POST['aula'];
        $grupo = $_POST['grupo'];

        $consulta1 = mysqli_query($conexion, "SELECT * FROM materia WHERE id_materia = $codigo");
        $resultado1 = mysqli_fetch_assoc($consulta1);
        $codigoTemporal1 = $resultado1['id_materia'];
        echo $codigoTemporal1; echo "<br>";

        $consulta2 = mysqli_query($conexion, "SELECT * FROM maestro WHERE id_docente = $codigoMaestro");
        $resultado2 = mysqli_fetch_assoc($consulta2);
        $codigoTemporal2 = $resultado2['id_docente'];

        $errores = 0;

        if(!in_array($codigoTemporal1, $resultado1)){
                $codigo_correcto = true;
                echo "El codigo es válido";
        }else{
            $errores += 1;
            $codigo_correcto = false;
            $_SESSION['mensaje'] = "<script>alert('Error en el código de la clase.');</script>"; header('Location: serviciosAdmin.php');
        }
        
        if($codigoMaestro == $resultado2['id_docente']){
                $codigoMaestro_correcto = true;
                echo "El codigo del maestro es válido";
        }else{
            $errores += 1;
            $codigoMaestro_correcto = false;
            $_SESSION['mensaje'] = "<script>alert('Código para maestro incorrecto.');</script>"; //header('Location: serviciosAdmin.php');
        }

        if(!preg_match("/[0-9]/", $nombreMateria) && !empty($nombreMateria)){
            $nombreMateria_correcto = true;
            echo "El nombre de la materia es válido";
        }else{
            $errores += 1;
            $nombreMateria_correcto = false;
            $_SESSION['mensaje'] = "<script>alert('Carácter inválido para el nombre, revíselo.');</script>"; header('Location: serviciosAdmin.php');
        }

        if($errores == 0){
            $sql = "INSERT INTO materia (id_materia, id_docente, nombre_materia, hora_inicio, hora_fin, aula, grupo) VALUES ('$codigo', '$codigoMaestro', '$nombreMateria', '$horaInicio', '$horaFin', '$aula', '$grupo');";
            $guardar = mysqli_query($conexion, $sql);
            //$maestro = "UPDATE maestro SET id_materia = $codigo WHERE id_docente = $codigoMaestro;";
            //$guardar2 = mysqli_query($conexion, $maestro);
            if ($guardar) {
                $_SESSION['mensaje'] = "<script>alert('Materia registrada exitosamente.');</script>"; header('Location: serviciosAdmin.php');
            } else {
                $_SESSION['mensaje'] = "<script>alert('Ocurrió un error, intente de nuevo.');</script>"; header('Location: serviciosAdmin.php');
            }
        }

    }

    header('Location: serviciosAdmin.php');

?>