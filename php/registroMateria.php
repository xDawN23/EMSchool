<?php 
// Obtenemos tanto el código del usuario mediante el método SESSION, así como el código de la materia que al que el usuario
// desea registrarse, para así comprobar si está dado de alta a la clase; en caso de que esté dado de alta, se le hará saber 
// al usuario que no se puede registrar porque ya está dentro, por otra parte, si no está registrado, el sistema lo dará de alta. 
require_once 'conexion.php';
session_start();
    if(isset($_POST)){
        $codigo_alumno = $_SESSION['codigo'];
        $codigo_materia = $_POST['codigo'];
        $consulta = mysqli_query($conexion, "SELECT * FROM `calificacion` WHERE `id_alumno` LIKE '$codigo_alumno' AND `id_materia` LIKE '$codigo_materia'");
        $rconsulta = mysqli_fetch_assoc($consulta);
        $materia = mysqli_query($conexion, "SELECT * FROM `materia` WHERE `id_materia` LIKE '$codigo_materia'");
        $rmateria = mysqli_fetch_assoc($materia);
        $existe = in_array($codigo_materia, $materia);
        if(mysqli_num_rows($consulta) > 0){
                echo "<script>alert('Ya has registrado esta materia');</script>";
                $_SESSION['mensaje'] = "<script>alert('Ya has registrado esta materia');</script>";
                header("Location: registro.php");
            //Validación que hace inscribir al usuario solo en materias que estén dadas de alta.
            }else if(in_array($codigo_materia, $rmateria)){
                $codigo_alumno = $_SESSION['codigo'];
                $codigo_materia = $_POST['codigo'];
                echo $codigo_alumno, $codigo_materia;
                $grupo = $rmateria['grupo'];
                $salon = $rmateria['aula'];
                echo $grupo, $salon;
                $mostrar_calificacion = 0;
                $calificacion = 0;
                $sql = "INSERT INTO calificacion (calificacion, grupo, salon, id_alumno, id_materia, mostrar_calificacion) VALUES ('$calificacion', '$grupo', '$salon', '$codigo_alumno', '$codigo_materia', '$mostrar_calificacion');";
                $guardar = mysqli_query($conexion, $sql);
                if($guardar){echo "<script>alert('Registro exitoso');</script>";
                    $_SESSION['mensaje'] = "<script>alert('Registro exitoso');</script>"; header("Location: registro.php");
                }else{$_SESSION['mensaje'] = "<script>alert('No se ha podido registrar la materia');</script>"; header("Location: registro.php");}
            }else{
                $_SESSION['mensaje'] = "<script>alert('Ocurrió un error, intente de nuevo.');</script>";
            }
        }
    header("Location: registro.php");
?>
