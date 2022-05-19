<?php 
    require_once 'conexion.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="../css/calificaciones.css">
    <link rel="stylesheet" href="../css/FormAdmin.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
</head>
<body>
<?php

$nombre_evento = $_POST['id_evento'];
$codigo = $_POST['id_docente'];
$descripcion_evento = $_POST['descripcion'];
$fecha_evento = $_POST['fecha'];
$hora_evento = $_POST['hora'];

echo $nombre_evento; echo "<br>";
echo $descripcion_evento; echo "<br>";
echo $fecha_evento; echo "<br>";
echo $hora_evento; echo "<br>";
echo $codigo; echo "<br>";

?>
<form action="configurarEvento.php" method="post">
        <label>Nombre para el evento</label>
        <input type="input" name="id_evento" placeholder ="Nombre del evento" value = "<?php echo $nombre_evento; ?>">
        <br>
        <label>Descripción breve del evento</label>
        <input type="input" name="descripcion" placeholder="Descripción del evento" value = "<?php echo $descripcion_evento; ?>">
        <br>
        <label>Fecha del evento</label>
        <input type="date" name="fecha" value = "<?php echo $fecha_evento; ?>">
        <br>
        <label>Hora del evento</label>
        <input type="time" name="hora" value = "<?php echo $hora_evento; ?>">
        <br>
        <input type="submit" value="Enviar">
        <br><br><br>
        <input type="hidden" name = "codigo" value =" <?php echo $codigo ?>"> 
        </form>


</body>
</html>