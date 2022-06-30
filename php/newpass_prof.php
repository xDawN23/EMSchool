<?php 
    require_once 'conexion.php';
    session_start();

    $vieja = $_POST['old_pass'];
    $nueva = $_POST['new_pass'];
    $codigo = $_SESSION['codigo'];


    $validar = "SELECT * FROM persona WHERE codigo = '$codigo' && contrasena = '$vieja'";
    $validando = $conexion->query($validar);

    if($vieja == $nueva){
        echo "<script language='javascript'>alert('La contraseña nueva es igual a la anterior'); window.location='configuracionMaestro.php' </script>";
    }

    if($validando->num_rows > 0){
        mysqli_query($conexion, "UPDATE persona SET contrasena = '$nueva' WHERE codigo = '$codigo'");
        echo "<script language='javascript'>alert('La contraseña se a cambiado correctamente'); window.location='configuracionMaestro.php' </script>";
    }else{
        echo "<script language='javascript'>alert('La contraseña es incorrecta'); window.location='configuracionMaestro.php' </script>";
    }
    

  
    mysqli_close($conexion);   
?>