<?php 
require_once 'conexion.php';
session_start();

$id_materia = $_POST['id_materia'];
$nombre_materia = $_POST['nombre_materia'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$aula = $_POST['aula'];
$grupo = $_POST['grupo'];

$sql = "DELETE FROM `materia` WHERE `id_materia` = '$id_materia'";

$eliminar = mysqli_query($conexion, $sql);

if($eliminar){
    $_SESSION['mensaje'] = "<script>alert('Materia eliminada correctamente.');</script>"; header('Location: serviciosAdmin.php');
}else{
    $_SESSION['mensaje'] = "<script>alert('Error al eliminar la materia.');</script>"; header('Location: serviciosAdmin.php');
}

?>