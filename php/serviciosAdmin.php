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
    <link rel="stylesheet" href="../css/loader.css">
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

    <div id="contenedor_carga">
      <div id="carga">
        
      </div>
    </div>

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
            <input type="input" name="horaInicio" placeholder="Ejemplo: 16:00">
            <br>
            <label>Hora de fin de la clase</label>
            <input type="input" name="horaFin" placeholder="Ejemplo: 16:00">
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
      <h2>Modificación de materias</h2><br>
      <?php $materias = mysqli_query($conexion, "SELECT * FROM materia;");
      ?>
      <table class="container">
          <thead>
            <th>Código de la materia</th>
            <th>Código del docente encargado</th>
            <th>Nombre de la materia</th>
            <th>Hora de inicio y fin</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </thead>
          <tbody>
            <?php while($resultado = mysqli_fetch_assoc($materias)){?>
                  <tr>
                    <td><?php echo $resultado['id_materia'];?></td>
                    <td><?php echo $resultado['id_docente'];?></td>
                    <td><?php echo $resultado['nombre_materia'];?></td>
                    <td><?php echo $resultado['hora_inicio'];?> - <?php echo $resultado['hora_fin'];?></td>
                    <form action="modificarMateria.php" method="post">
                      <input type="hidden" name="id_materia" value="<?php echo $resultado['id_materia'];?>">
                      <input type="hidden" name="id_docente" value="<?php echo $resultado['id_docente'];?>">
                      <input type="hidden" name="nombre_materia" value="<?php echo $resultado['nombre_materia'];?>">
                      <input type="hidden" name="hora_inicio" value="<?php echo $resultado['hora_inicio'];?>">
                      <input type="hidden" name="hora_fin" value="<?php echo $resultado['hora_fin'];?>">
                      <input type="hidden" name="aula" value="<?php echo $resultado['aula'];?>">
                      <input type="hidden" name="grupo" value="<?php echo $resultado['grupo'];?>">
                      <td><input type="submit" value="Modificar" class="btn btn1"></td>
                    </form>
                    <form action="eliminarMateria.php" method="post">
                    <input type="hidden" name="id_materia" value="<?php echo $resultado['id_materia'];?>">
                    <input type="hidden" name="id_docente" value="<?php echo $resultado['id_docente'];?>">
                    <input type="hidden" name="nombre_materia" value="<?php echo $resultado['nombre_materia'];?>">
                    <input type="hidden" name="hora_inicio" value="<?php echo $resultado['hora_inicio'];?>">
                    <input type="hidden" name="hora_fin" value="<?php echo $resultado['hora_fin'];?>">
                    <td><input type="submit" value="Eliminar" class="btn btn1"></td>
                    </form>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
        <div class="text">
        </div>
        <?php if(isset($_SESSION['mensaje'])){
          echo "<div>".$_SESSION['mensaje']."</div>";
          unset($_SESSION['mensaje']);
        }?>
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
  
   <script>
      window.onload = function(){
        var contenedor = document.getElementById("contenedor_carga");

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
      }
    </script> 
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
</body>
</html>