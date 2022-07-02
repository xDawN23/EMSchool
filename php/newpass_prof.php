<?php 
    require_once 'conexion.php';
    session_start();

    $vieja = $_POST['old_pass'];
    $nueva = $_POST['new_pass'];
    $codigo = $_SESSION['codigo'];


    $salt = 'SHIFLETT';
    $password_hash_vieja = hash('sha256', $salt . hash('sha256', $vieja . $salt));

    $salt = 'SHIFLETT';
    $password_hash = hash('sha256', $salt . hash('sha256', $nueva . $salt));


    $validar = "SELECT * FROM persona WHERE codigo = '$codigo' && contrasena = '$password_hash_vieja'";
    $validando = $conexion->query($validar);

    if($password_hash_vieja == $password_hash){
        echo "<script language='javascript'>alert('La contraseña nueva es igual a la anterior'); window.location='configuracionMaestro.php' </script>";
    }

    if($validando->num_rows > 0){
        mysqli_query($conexion, "UPDATE persona SET contrasena = '$password_hash' WHERE codigo = '$codigo'");
        echo "<script language='javascript'>alert('La contraseña se a cambiado correctamente'); window.location='configuracionMaestro.php' </script>";
    }else{
        echo "<script language='javascript'>alert('La contraseña es incorrecta'); window.location='configuracionMaestro.php' </script>";
    }

  
    mysqli_close($conexion);   
?>