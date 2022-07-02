<?php
  require_once 'conexion.php';

  if(isset($_POST)){
    /*La función TRIM sirve para eliminar los posibles espacios que pueda
    tener el campo que envía el usuario. */
    $codigo = trim($_POST['codigo']);
    $contrasena = trim($_POST['contrasena']);
    
    /*Verificamos que no exista una sesión anterior cuando se equivoque.*/
    if(isset($_SESSION['error_login'])){
      session_unset($_SESSION['error_login']);
    }

    /**
     * Encriptamos la contraseña recibida para compararla 
     */
    $salt = 'SHIFLETT';
    $password_hash = hash('sha256', $salt . hash('sha256', $contrasena. $salt));


    //Consulta para comprobar las credenciales del usuario 
    $sql = "SELECT * FROM persona WHERE codigo = '$codigo'";
    $login = mysqli_query($conexion, $sql);
    $cont = "SELECT * FROM persona WHERE contrasena = '$password_hash'";
    $contr = mysqli_query($conexion, $cont);
    
    
    if($login && $contr){
      $usuario1 = mysqli_fetch_assoc($login);
      
      //Comprobar contraseña
      // $verify = password_verify($contrasena, $usuario['contrasena']);
      // var_dump ($verify);
      if($password_hash == $usuario1['contrasena'] && $codigo == $usuario1['codigo']){
    
        if($usuario1['cargo'] == "alumno"){
          session_start();
          $_SESSION['codigo'] = $usuario1['codigo'];
          header('Location: inicioAlumno.php');
        }else if($usuario1['cargo'] == "maestro"){
          session_start();
          $_SESSION['codigo'] = $usuario1['codigo'];
          header('Location: inicioMaestro.php');
        }else if($usuario1['cargo'] == "root"){
          session_start();
          $_SESSION['codigo'] = $usuario1['codigo'];
          header('Location: inicioRoot.php');
        }else if($usuario1['cargo'] == "admin"){
          session_start();
          $_SESSION['codigo'] = $usuario1['codigo'];
          header('Location: inicioAdmin.php');
        }

      }else{
        session_start();
        $_SESSION['error_login'] = "¡Error al iniciar sesión!";
        header('Location: login.php');
        
      }
    }else{
      session_start();
      $_SESSION['error_login'] = "¡Error al iniciar sesión!";
      header('Location: login.php');
    }
    
  }/*Fin del método del inicio de sesión.*/

  //header('Location: login.php');

?>
<!-- Fin del código para la autenticación de usuarios e inicio de sesión. -->