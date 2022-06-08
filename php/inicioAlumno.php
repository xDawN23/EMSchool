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
    <link rel="stylesheet" href="../css/inicioAlumno.css">
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
    <!-- APARTADO DONDE SACAMOS LOS DATOS DE LA DB, PARA MOSTRARLOS EN LA PÁGINA DE MANERA ORDENADA. -->
    <!--***************************************************************************************  -->
    <!--Primeramente, hacemos una consulta mediante PHP a la base de datos, donde vamos a obtener
        los datos mediante el código del usuario, con el cual inició sesión. 
        Para después, mostrarlos de manera ordenada dentro de una tabla. -->
    <!-- Después, consultamos las materias a las que el usuario está dado de alta, para así mostrarle
          el horario que el usuario tendría dentro de la escuela. Todo lo anterior mencionado está dentro
          de las tablas de persona, donde los datos son los asociados al momento de iniciar sesión, y con 
          estos mismos datos, vamos a consultar los datos a la tabla de materia y calificacion, las cuales
          tienen los datos de las clases y las clases que el usuario está dado de alta.-->
    <div class="home_content"> 
        <div class="text">Bienvenido, alumno 
        <?php 
        $valor = $_SESSION['codigo'];
        $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$valor'"); 
        $usuario = mysqli_fetch_assoc($query);
        echo $usuario['nombre'];
        //Ordenamos las materias de manera ascendente, para que podamos relacionarlas con las materias a las que está dado de alta.   
        $materias = mysqli_query($conexion, "SELECT * FROM `calificacion` WHERE id_alumno = '$valor' ORDER BY id_materia ASC");
        $amaterias = array();
        $i = 0;
        while($prueba = mysqli_fetch_array($materias)){$amaterias[$i] = $prueba['id_materia'];$i++;};

        $horario = mysqli_query($conexion, "SELECT * FROM materia WHERE materia.id_materia ORDER BY id_materia ASC");
        $aux = mysqli_query($conexion, "SELECT * FROM materia WHERE materia.id_materia ORDER BY id_materia ASC");
        $ahorario = array();
        $j = 0;
        while($prueba = mysqli_fetch_array($aux)){$ahorario[$j] = $prueba['id_materia'];$j++;}
        ?>
        </div>
        <h2>Datos generales del alumno</h2>
          <div id = "datos">
              <table class="container">
                <thead>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cargo</th>
                  <th>Estatus</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $usuario['codigo'];?></td>
                    <td><?php echo $usuario['nombre'];?></td>
                    <td><?php echo $usuario['apellido'];?></td>
                    <td><?php echo $usuario['cargo'];?></td>
                    <td><?php echo $usuario['estatus'];?></td>
                  </tr>
                </tbody>
              </table>
              <table class="container">
	<caption>Horario</caption> 
		<thead>
		<tr>
      <th>Código materia</th>
      <th>Clase</th>
      <th>Horario</th>
      <th>Aula</th>
      <th>Grupo</th>
		</tr>
	</thead>

		<tbody>
		<?php $i = 0;//print_r($amaterias);101 y 102 print_r($ahorario); 101, 102, 103 (todas las materias)
    if(mysqli_num_rows($materias) > 0){ while($calificacion = mysqli_fetch_array($horario)){ ?>
  <tr>
    <?php 
      $exists = $amaterias[$i]; 
    if(in_array($exists, $ahorario) && $calificacion['id_materia'] == $exists){
    ?>
    <td><?php echo $calificacion['id_materia']?></td>
    <td><?php echo $calificacion['nombre_materia']?></td>
    <td><?php echo $calificacion['hora_inicio']?> - <?php echo $calificacion['hora_fin']?></td>
    <td><?php echo $calificacion['aula']?></td>
    <td><?php echo $calificacion['grupo'];$i++;?></td>
</tr>
  <?php
      }
    }
  }
  ?>
  
	</tbody>
	</table>
          </div>
        <div class="footer">
        <p> Todos los derechos reservados © 2021</p>
      </div>
      </div>
    </div>
    <!-- Fin del contenido de la página principal. -->
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