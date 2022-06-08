<?php
    require_once 'conexion.php';
    session_start();

    //Valida que el usuario este logueado, además de que otros usuarios no puedan acceder a partes del sistema que no deberían poder acceder.

    $codigo = $_SESSION['codigo'];
    $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$codigo'"); 
    $usuario = mysqli_fetch_assoc($query);

    if($usuario['cargo'] != "alumno"){
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
    <title>Alumno</title>
    <link rel="stylesheet" href="../css/calificaciones.css">
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
          <a href="inicioAlumno.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Usuario</span>
          </a>
          <span class="tooltip">Usuario</span>
        </li>
        <li>
          <a href="calificaciones.php">
            <i class='bx bx-book'></i>
            <span class="links_name">Calificaciones</span>
          </a>
          <span class="tooltip">Calificaciones</span>
        </li>
        <li>
          <a href="registro.php">
            <i class='bx bxs-folder'></i>
            <span class="links_name">Registro</span>
          </a>
          <span class="tooltip">Registro</span>
        </li>
        <li>
          <a href="pagos.php">
            <i class='bx bx-cart-alt' ></i>
            <span class="links_name">Pagos</span>
          </a>
          <span class="tooltip">Pagos</span>
        </li>
        <li>
          <a href="servicios.php">
            <i class='bx bxs-data'></i>
            <span class="links_name">Servicios</span>
          </a>
          <span class="tooltip">Servicios</span>
        </li>
        <li>
          <a href="configuracion.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Configuración</span>
          </a>
          <span class="tooltip">Configuración</span>
        </li>
        <?php 
          if($_SESSION['cargo'] == 'admin'){ ?> 
          <li>
            <a href="configuracion.php">
              <i class='bx bx-cog' ></i>
              <span class="links_name">Configuración</span>
            </a>
          <span class="tooltip">Configuración</span>
        </li>
          <?php } ?>
        
        ?>
      </ul>
      <div class="profile_content">
        <div class="profile">
          <div class="profile_details">
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
        <div class="text">
          <h3>Servicios</h3>
          <p>
            Para el proceso de préstamo, selecciona el instrumento que necesites pedir prestado, pídelo y se descargará el archivo que necesitas presentar para llevártelo.
            Es importante que anotes los datos del instrumento, como el código, el nombre el instrumento y que esté activo, para poder llenar la solicitud debidamente.
          </p>
          <a href="archivos/a.pdf" download = "a.pdf">Descargar formato aquí</a>
        <?php 
        $valor = $_SESSION['codigo'];
        $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$valor'"); 
        $usuario = mysqli_fetch_assoc($query);
        $busqueda = mysqli_query($conexion, "SELECT * FROM instrumento WHERE estatus_instrumento = 'activo'");
        ?>
        </div>
        <?php while($dato = mysqli_fetch_array($busqueda)){ ?>
        <table class="container">
                <thead>
                  <th>Código del instrumento</th>
                  <th>Nombre del instrumento</th>
                  <th>Tipo de instrumento</th>
                  <th>Descripción</th>
                  <th>Estatus del instrumento</th>
                  <th>Solicitar</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $dato['codigo_instrumento'];?></td>
                    <td><?php echo $dato['nombre_instrumento'];?></td>
                    <td><?php echo $dato['tipo_instrumento'];?></td>
                    <td><?php echo $dato['descripcion'];?></td>
                    <td><?php echo $dato['estatus_instrumento'];?></td>
                    <?php 
                    $codigo_alumno = $_SESSION['codigo'];
                    $codigo_instrumento = $dato['codigo_instrumento'];
                    $nombre_instrumento = $dato['nombre_instrumento'];
                    $tipo_instrumento = $dato['tipo_instrumento'];
                    $descripcion = $dato['descripcion'];
                    $estatus_instrumento = $dato['estatus_instrumento'];
                    ?>
                    <form action="pedirInstrumento.php" method="post">
                      <!-- Es necesario colocar echo en value para enviar los valores. -->
                      <input type="hidden" name = "codigo_alumno" value= "<?php echo $codigo_alumno ?>">
                      <input type="hidden" name = "codigo_instrumento" value =" <?php echo $codigo_instrumento ?>">
                      <input type="hidden" name = "nombre_instrumento" value =" <?php echo $nombre_instrumento ?>">
                      <input type="hidden" name = "tipo_instrumento" value =" <?php echo $tipo_instrumento ?>">
                      <input type="hidden" name = "descripcion" value =" <?php echo $descripcion ?>">
                      <input type="hidden" name = "estatus_instrumento" value =" <?php echo $estatus_instrumento ?>">
                      <td><button type="submit" value = "enviar">Seleccionar</button></td>
                      
                    </form>
                  </tr>
                  <?php 
                  }
                  ?>
                </tbody>
          </table>
          
      </div>
    </div>
    <?php if(isset($_SESSION['mensaje'])){
          echo "<div>".$_SESSION['mensaje']."</div>";
          unset($_SESSION['mensaje']);
        }?>
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

  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/inicioAlumno.js"></script>
</body>
</html>