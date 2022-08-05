<?php 
require_once 'conexion.php';
session_start();

$id_materia = $_POST['codigo'];
$id_docente = $_POST['codigoMaestro'];
$nombre_materia = $_POST['id_materia'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$aula = $_POST['aula'];
$grupo = $_POST['grupo'];

echo $id_materia; echo "<br>";
echo $id_docente; echo "<br>";
echo $nombre_materia; echo "<br>";
echo $hora_inicio; echo "<br>";
echo $hora_fin; echo "<br>";
echo $aula; echo "<br>";
echo $grupo; echo "<br>";


$sql = "UPDATE `materia` SET `nombre_materia`= '$nombre_materia',`hora_inicio`= '$hora_inicio',`hora_fin`= '$hora_fin',`aula`= '$aula',`grupo`= '$grupo' WHERE id_materia = $id_materia";

$modificar = mysqli_query($conexion, $sql);

if($modificar){
    $_SESSION['mensaje'] = "<script>alert('Materia actualizada correctamente.');</script>"; header('Location: serviciosAdmin.php');
}else{
    $_SESSION['mensaje'] = "<script>alert('Error al actualizar la materia.');</script>"; header('Location: serviciosAdmin.php');
}

?>