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
    <title>Document</title>
</head>
<body>
<?php 

$id_materia = $_POST['id_materia'];
$id_docente = $_POST['id_docente'];
$nombre_materia = $_POST['nombre_materia'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$aula = $_POST['aula'];
$grupo = $_POST['grupo'];

?>
    <form action="modificacionMateria.php" method="post">
        <label>Nombre para la materia</label>
        <input type="input" name="id_materia" placeholder ="Nombre de la materia" value = "<?php echo $nombre_materia; ?>">
        <br>
        <label>Hora de inicio de la clase</label>
        <input type="input" name="hora_inicio" placeholder="Hora de inicio" value = "<?php echo $hora_inicio; ?>">
        <br>
        <label>Hora de fin de la clase</label>
        <input type="input" name="hora_fin" value = "<?php echo $hora_fin; ?>">
        <br>
        <label>Aula de la clase</label>
        <input type="input" name="aula" value = "<?php echo $aula; ?>">
        <br>
        <label>Grupo de la clase</label>
        <input type="input" name="grupo" value = "<?php echo $grupo; ?>">
        <br>
        <input type="hidden" name = "codigo" value =" <?php echo $id_materia ?>"> 
        <input type="hidden" name = "codigoMaestro" value =" <?php echo $id_docente ?>">
        <input type="submit" value="Enviar">
        <br><br><br>
    </form>
</body>
</html