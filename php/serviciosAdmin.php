<?php
    require_once 'conexion.php';
    session_start();

    //Valida que el usuario este logueado, además de que otros usuarios no puedan acceder a partes del sistema que no deberían poder acceder.

    $codigo = $_SESSION['codigo'];
    $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$codigo'"); 
    $usuario = mysqli_fetch_assoc($query);

    if($usuario['cargo'] != "admin"){
      session_destroy();
      header("Location: login.php");
    }

?>
<!DOCTYPE html><html class="menu">
<html ng-app="EM-SCHOOL">

  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content=="IE=edge"/>
    <meta name="google" value="notranslate"/>
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/calificaciones.css">
    <link rel="stylesheet" href="../css/FormAdmin.css">
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
          <a href="serviciosAdmin.php">
            <i class='bx bxs-data'></i>
            <span class="links_name">Servicios</span>
          </a>
          <span class="tooltip">Servicios</span>
        </li>
        <li>
          <a href="configuracionAdmin.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Configuración</span>
          </a>
          <span class="tooltip">Configuración</span>
        </li>
        <li>
          <a href="prestamos.php">
            <i class='bx bx-music'></i>
            <span class="links_name">Préstamos</span>
          </a>
          <span class="tooltip">Préstamos</span>
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

    <div class="home_content"> 

      
    
      <div class="padre">
        <div class="cal hijo">
          <h2>Activar o desactivar las calificaciones</h2><br>
          <form action="activarCalificaciones.php" method = "POST" class="inline">
            <input type="hidden" name="activar" value = "1">
            <input type="submit" value="Activar" class="btn btn1"> 
          </form>
          <form action="desactivarCalificaciones.php" method = "POST" class="inline">
            <input type="hidden" name="desactivar" value = "0">
            <input type="submit" value="Desactivar" class="btn btn1"> 
          </form>
        </div>

        <div class="mat hijo">
          <form action="crearMateria.php" method="POST">
            <h2>Registrar nueva materia</h2>
            <br>
            <label>Código de la materia</label>
            <input type="input" maxlength="10" name="codigo">
            <br>
            <label>Código del maestro encargado de la materia</label>
            <input type="input" name="codigoMaestro" maxlength="10">
            <br>
            <label>Nombre de la materia</label>
            <input type="input" name="materia">
            <br>
            <label>Hora inicial de la clase</label>
            <input type="time" name="horainicio">
            <br>
            <label>Hora de fin de la clase</label>
            <input type="time" name="horafin">
            <br>
            <label>Aula</label>
            <input type="input" name="aula" maxlength="20">
            <br>
            <label>Grupo</label>
            <input type="input" name="grupo" maxlength="20">
            <br>
            <input type="submit" value="Guardar" class="btn btn1"> 
          </form>
        </div>

        <div class=" ins hijo">
          <form action="crearInstrumento.php" method="POST">
            <h2>Registrar nuevo instrumento</h2>
            <br>
            <label>Código del instrumento</label>
            <input type="number" name="codigoInstrumento" maxlength="10">
            <br>
            <label>Tipo de instrumento</label>
            <select name="tipoInstrumento">
            <option value="Cuerda">Guitarra</option>
            <option value="Cuerda">Violín</option>
            <option value="Cuerda">Piano</option>
            <option value="Viento">Saxofón</option>
            <option value="Viento">Flauta</option>
            <option value="Persucion">Tambor</option>
            <option value="Persucion">Bombo</option>
            <option value="Electrico">Guitarra eléctrica</option>
            <option value="Electrico">Bajo eléctrico</option>
            </select>
            <br>
            <label>Nombre del instrumento</label>
            <input type="text" name="instrumento" maxlength="20">
            <br>
            <label>Descripción del instrumento</label>
            <input type="text" name="descripcion" maxlength="100"><br>
            <input type="submit" value="Guardar" class="btn btn1">
          </form>
        </div>
      </div>
  

        <div class="text">
        <?php 
        $valor = $_SESSION['codigo'];
        $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$valor'"); 
        $usuario = mysqli_fetch_assoc($query);
        ?>
        
        </div>
        <?php if(isset($_SESSION['mensaje'])){
          echo "<div>".$_SESSION['mensaje']."</div>";
          unset($_SESSION['mensaje']);
        }?>
        <div class="footer">
        <p> Todos los derechos reservados © 2021</p>
        </div>
    </div>

    </div> <!--Fin del home content (pagina principal)-->
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
  
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/inicioAlumno.js"></script>
</body>
</html>