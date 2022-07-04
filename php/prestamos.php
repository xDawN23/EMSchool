<?php
    require_once 'conexion.php';
    session_start();

    //Valida que el usuario este logueado, además de que otros usuarios no puedan acceder a partes del sistema que no deberían poder acceder.

    $codigo = $_SESSION['codigo'];
    $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$codigo'"); 
    $usuario = mysqli_fetch_assoc($query);

    if($usuario['cargo'] == "maestro"){
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
    <link rel="stylesheet" href="../css/inicioAdmin.css">
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

        <div class="text">
        <h3>Préstamos</h3>
        <p>
            Instrumentos con solicitudes de préstamo.
            Verifique que el código del alumno sea el correspondiente, al igual que el del instrumento.
        </p>
    <?php 
    $busqueda = mysqli_query($conexion, "SELECT * FROM instrumento WHERE estatus_instrumento = 'pendiente'");
    $sql = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$_SESSION[codigo]'");
    $row = mysqli_fetch_array($sql);
    $aux = $row['cargo'];
    ?>
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
                    <form action="prestarInstrumento.php" method="post">
                    <!-- Es necesario colocar echo en value para enviar los valores. -->
                    <?php if($aux == "alumno") {?><input type="hidden" name = "codigo_alumno" value= "<?php echo $codigo_alumno; }?>">
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
        <br>
        <h3>Entrega de instrumentos</h3>
        <p>
            Instrumentos prestados que van a ser regresados.
            Verifique la intregridad del instrumento, así como que el código como la descripción coincidan con el instrumento recuperado.
        </p>
        <?php 
    $busqueda = mysqli_query($conexion, "SELECT * FROM instrumento WHERE estatus_instrumento = 'prestado'");
    ?>
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
                    <form action="recuperarInstrumento.php" method="post">
                    <!-- Es necesario colocar echo en value para enviar los valores. -->
                    <?php if($aux == "alumno") {?><input type="hidden" name = "codigo_alumno" value= "<?php echo $codigo_alumno; }?>">
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
    </div>

    </div>
    <!--Código para mostrar le mensaje de nuestro sistema, cualquiera que fuera.-->
    <?php if(isset($_SESSION['mensaje'])){
        echo "<div>".$_SESSION['mensaje']."</div>";
        unset($_SESSION['mensaje']);
        }?>
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
</body>
</html>