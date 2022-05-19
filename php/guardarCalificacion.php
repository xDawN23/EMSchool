<?php 
    require_once 'conexion.php';
    session_start();

    $codigo = $_POST['codigo_alumno'];
    echo $codigo; echo "<br>";
    $calificacion = $_POST['calificacion'];
    echo $calificacion; echo "<br>";
    $ncalificacion = $_POST['calificacion_vieja'];
    echo $ncalificacion; echo "<br>";
    $materia = $_POST['codigo_materia'];
    echo $materia; echo "<br>";
    $id_calificacion = $_POST['id_calificacion'];
    $sql = "UPDATE calificacion SET calificacion = '$calificacion' WHERE calificacion.id_calificacion = '$id_calificacion';";
    $guardar = mysqli_query($conexion, $sql);
    if ($guardar) {
        $_SESSION['mensaje'] = "<script>alert('Actualización exitosa.');</script>"; header('Location: calificacionesMaestro.php');
} else {
    $_SESSION['mensaje'] = "<script>alert('Ocurrió un error, intente de nuevo.');</script>"; header('Location: calificacionesMaestro.php');
}
    header('Location: calificacionesMaestro.php');
?>
