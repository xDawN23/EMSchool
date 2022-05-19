<?php 
    require_once 'conexion.php';
    session_start();

    if(isset($_POST)){
        $codigoInstrumento = $_POST['codigoInstrumento'];
        $tipoInstrumento = $_POST['tipoInstrumento'];
        $nombreInstrumento = $_POST['instrumento'];
        $descrpcion = $_POST['descripcion'];
        echo $codigoInstrumento; echo "<br>";
        echo $tipoInstrumento; echo "<br>";
        echo $nombreInstrumento; echo "<br>";
        echo $descrpcion; echo "<br>";

        $existe = mysqli_query($conexion, "SELECT * FROM instrumento WHERE codigo_instrumento = $codigoInstrumento");
        $resultado = mysqli_fetch_assoc($existe);

        if($codigoInstrumento == $resultado['codigo_instrumento']){
            $_SESSION['mensaje'] = "<script>alert('El código para el instrumento está en uso, introduzca otro.');</script>";
            header("Location: serviciosAdmin.php");
        }else{
            $query = "INSERT INTO instrumento (codigo_instrumento, nombre_instrumento, tipo_instrumento, descripcion, estatus_instrumento) VALUES ('$codigoInstrumento', '$nombreInstrumento', '$tipoInstrumento', '$descrpcion', 'activo')";
            $result = mysqli_query($conexion, $query);
            if($result){
                $_SESSION['mensaje'] = "<script>alert('Instrumento registrado con éxito.');</script>";
                header("Location: serviciosAdmin.php");
            }else{
                $_SESSION['mensaje'] = "<script>alert('Error al registrar el instrumento.');</script>";
                header("Location: serviciosAdmin.php");
            }
        }

    }

    header("Location: serviciosAdmin.php");

?>