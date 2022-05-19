<?php
    require_once 'conexion.php';
    session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content=="IE=edge"/>
    <meta name="google" value="notranslate"/>
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/registroAdmin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="../img/icono.png">
</head>
<body>
    <!--Header-->
    <header class="header">
      
    </header> 
    <!--Fin del Header-->
    
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <i class='bx bxs-school'></i>
          <div class="logo_name">EM-School</div>
        </div>
        <i class='bx bx-menu' id="btn" ></i>
      </div>
      <ul class="nav_list">
        <li>
          <a href="inicioAdmin.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Usuario</span>
          </a>
          <span class="tooltip">Usuario</span>
        </li>
        <li>
          <a href="registroAdmin.php">
            <i class='bx bxs-folder'></i>
            <span class="links_name">Registro</span>
          </a>
          <span class="tooltip">Registro</span>
        </li>
        <li>
          <a href="recuperacion.php">
            <i class='bx bxs-data'></i>
            <span class="links_name">Servicios</span>
          </a>
          <span class="tooltip">Servicios</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Configuración</span>
          </a>
          <span class="tooltip">Configuración</span>
        </li>
      </ul>
      <div class="profile_content">
        <div class="profile">
          <div class="profile_details">
            <!--<img src="profile.jpg" alt="">-->
            <div class="name_job">
              <div class="name">Prem Shahi</div>
              <div class="job">Web Designer</div>
            </div>
          </div>
          <a href="logout.php">
          <i class='bx bx-log-out' id="log_out" ></i>
          </a>
        </div>
      </div>
    </div>
    <!--***************************************************************************************  -->
    <!-- REVISAR EN ESTE APARTADO, CÓMO BUSCAR POR EL CÓDIGO ESPECÍFICO DEL USUARIO QUE INGRESÓ. -->
    <!--***************************************************************************************  -->
    <div class="home_content"> 
        <div class="text">
            <h2>Registro de alumnos</h2>
            <form class="form1" method="POST" action="modificarUsuarios.php">
                <?php
                $codigo = $_POST['cod'];
                $query = mysqli_query($conexion, "SELECT  * FROM persona where codigo = '$codigo'");
                $usuario = mysqli_fetch_assoc($query);
                ?>
                <!--codigo, nombre, apellido,  telefono, correo, genero, contrasena, tipo_sangre, cargo, estatus-->
                <input type="text" name="codigo" placeholder="Código" value="<?php echo $usuario['codigo']?>">
                <input type="text" name="nombre" placeholder="Nombre/s" value="<?php echo $usuario['nombre']?>">
                <input type="text" name="apellido" placeholder="Apellidos" value="<?php echo $usuario['apellido']?>">
                <input type="text" name="telefono" placeholder="Teléfono" value="<?php echo $usuario['telefono']?>">
                <input type="email" name="correo" placeholder="Correo" value="<?php echo $usuario['correo']?>">
                <input type="text" name="genero" placeholder="Genero (solo la inicial)" value="<?php echo $usuario['genero']?>">
                <input type="text" name="tipo_sangre" placeholder="Tipo de sangre" value="<?php echo $usuario['tipo_sangre']?>">
                <input type="text" name="cargo" placeholder="Cargo del usuario" value="<?php echo $usuario['cargo']?>">
                <input type="text" name="estatus" placeholder="Estatus" value="<?php echo $usuario['estatus']?>">
                <input type="submit" value="Ingresar" class="submit" >
            </form>
            <?php
                // $codigo = isset($_POST['codigo']);
                // $nombre = isset($_POST['nombre']); 
                // $apellido = isset($_POST['apellido']); 
                // $telefono = isset($_POST['telefono']); 
                // $correo = isset($_POST['correo']); 
                // $genero = isset($_POST['genero']);
                // $tipo_sangre = isset($_POST['tipo_sangre']); 
                // $cargo = isset($_POST['cargo']); 
                // $estatus = isset($_POST['estatus']); 
                ?>
                
      </div>
    </div>

    </div>
  
    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");
  
    btn.onclick = function() {
      sidebar.classList.toggle("active");
      if(btn.classList.contains("bx-menu")){
        btn.classList.replace("bx-menu" , "bx-menu-alt-right");
      }else{
        btn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }
    searchBtn.onclick = function() {
      sidebar.classList.toggle("active");
    }
    </script>
</body>
</html>