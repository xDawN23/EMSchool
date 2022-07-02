<?php
require_once 'conexion.php';
session_start();
if(isset($_POST)){
        
    //Verificar los datos que introdujo el usuario para registrarlo.// 
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; 
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false; 
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false; 
    $correo = isset($_POST['correo']) ? $_POST['correo'] : false; 
    $genero = isset($_POST['genero']) ? $_POST['genero'] : false;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : false; 
    $tipo_sangre = isset($_POST['tipo_sangre']) ? $_POST['tipo_sangre'] : false; 
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : false; 
    $estatus = isset($_POST['estatus']) ? $_POST['estatus'] : false; 

    /**Encriptamos la contraseña */
    $salt = 'SHIFLETT';
    $password_hash = hash('sha256', $salt . hash('sha256', $contrasena . $salt));


    //Array de errores para ver en qué campos hay errores.// 
    $errores = array();

    //Validacion para el campo del codigo, p[ara solo tener numeros en el
    if(is_numeric($codigo)){
        $codigo_correcto = true;
        echo "El codigo es válido";
    }else{
        $codigo_correcto = false;
        $errores['correo'] = "El correo no es válido";
    }

    // Validación para el campo del nombre, para no tener números en el nombre.//
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_correcto = true;
        echo "El nombre es válido";
    }else{
        $nombre_correcto = false;
        $errores['nombre'] = "El nombre no es válido";
    }
    // Validación para el campo del apellido, para no tener números en el nombre.//
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_correcto = true;
        echo "El apellido es válido";
    }else{
        $apellido_correcto = false;
        $errores['apellido'] = "El apellido no es válido";
    }

    // Validación para el campo del teléfono, para no tener letras en el teléfono.//
    if(!empty($telefono) && is_numeric($telefono) && preg_match("/[0-9]/", $telefono)){
        $telefono_correcto = true;
        echo "El teléfono es válido";
    }else{
        $telefono_correcto = false;
        $errores['telefono'] = "El teléfono no es válido";
    }

    // Validación para el campo del correo, para no tener números en el nombre.//
    if(!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)){
        $correo_correcto = true;
        echo "El correo es válido";
    }else{
        $correo_correcto = false;
        $errores['correo'] = "El correo no es válido";
    }

    // Validación para el campo del genero, para no tener números en el genero y que no sea mayor a uno el carácter.//
    if(!empty($genero) && !is_numeric($genero) && !preg_match("/[0-9]/", $genero) && (strlen($genero) <= 1 && strlen($genero) > 0)){
        $genero_correcto = true;
        echo "El genero es válido";
    }else{
        $genero_correcto = false;
        $errores['genero'] = "El genero no es válido";
    }
    // Validación para que el campo de la contraseña no esté vacío.//
    if(!empty($password_hash)){
        $contrasena_correcto = true;
        echo "La contraseña es válida";
    }else{
        $contrasena_correcto = false;
        $errores['contrasena'] = "La contraseña no es válido";
    }

    // Validación para el campo del genero, para no tener números en el genero y que no sea mayor a uno el carácter.//
    if(!empty($tipo_sangre) && !is_numeric($tipo_sangre) && !preg_match("/[0-9]/", $tipo_sangre) && (strlen($tipo_sangre) <= 1 && strlen($tipo_sangre) > 0)){
        $tipo_sangre_correcto = true;
        echo "El tipo de sangre es válido";
    }else{
        $tipo_sangre_correcto = false;
        $errores['tipo_sangre'] = "El tipo de sangre no es válido";
    }

    // Validación para el campo del cargo, para no tener números en el cargo.//
    if(!empty($cargo) && !is_numeric($cargo) && !preg_match("/[0-9]/", $cargo)){
        $cargo_correcto = true;
        echo "El cargo es válido";
    }else{
        $cargo_correcto = false;
        $errores['cargo'] = "El cargo no es válido";
    }
    
    // Validación para el campo del estatus, para no tener números en el estatus.//
    if(!empty($estatus) && !is_numeric($estatus) && !preg_match("/[0-9]/", $estatus)){
        $estatus_correcto = true;
        echo "El estatus es válido";
    }else{
        $estatus_correcto = false;
        $errores['estatus'] = "El estatus no es válido";
    }
    // echo sizeof($errores);
    $guardar_usuario = false;

    if(count($errores) == 1){
        $guardar_usuario = true;
        $contrasena_segura = password_hash($contrasena, PASSWORD_BCRYPT, ['cost' => 4]);
        //<!--codigo, nombre, apellido,  telefono, correo, genero, contrasena, tipo_sangre, cargo, estatus-->
        $sql = "INSERT INTO persona (`codigo`, `nombre`, `apellido`, `telefono`, `correo`, `genero`, `contrasena`, `tipo_sangre`, `cargo`, `estatus`) VALUES ('$codigo', '$nombre', '$apellido', '$telefono', '$correo', '$genero', '$password_hash', '$tipo_sangre', '$cargo', '$estatus');";

        $guardar = mysqli_query($conexion, $sql);

        if($cargo == 'maestro'){
            $maestro = "INSERT INTO maestro (`id_docente`, `codigo`, evento_creado) VALUES ('$codigo', '$codigo', '0');";
            $resultado = mysqli_query($conexion, $maestro);
        }

        if($cargo == 'alumno'){
            $alumno = "INSERT INTO alumno (`id_alumno`, `codigo`, prestamo) VALUES ('$codigo', '$codigo', '0');";
            $resultado = mysqli_query($conexion, $alumno);
        }
        
        if($guardar){
            $_SESSION['mensaje'] = "El registro se compléto con éxito.";
        }else{
            $_SESSION['errores']['general'] = "Error al guardar los datos, verifique que sean correctos.";
        }
    }else{
        $_SESSION['errores'] = $errores;
    }

    header('Location: registroAdmin.php');

}//Fin del if para los campos
?>  