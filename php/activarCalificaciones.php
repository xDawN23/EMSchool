<?php require_once 'conexion.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activar</title>
</head>
<body>
<?php 
    $validar = $_POST['activar'];
    $sql = "UPDATE `calificacion` SET `mostrar_calificacion` = '$validar' WHERE `calificacion`.`mostrar_calificacion` = '0';";
    if (mysqli_query($conexion, $sql)) {
        $_SESSION['mensaje'] = "<script>alert('Las calificaciones se han activado.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    header('Location: serviciosAdmin.php');
    
    ?>
</body>
</html>