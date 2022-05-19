<?php

$servername = "localhost";
$database = "emschool";
$username = "root";
$password = "andrelopez";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
// Check connection

if(mysqli_connect_error()){
    echo "La conexion a la base de datos MySQL ha fallado: ".mysqli_connect_error();
}else{
    //La conexión se realizó con éxito.
}

mysqli_query($conexion, "SET NAMES 'utf8'");

// $usuario = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = $_SESSION['codigo']");
// while($datos = mysqli_fetch_assoc($usuario)){
//     $arr[] = $datos;
//   }
// echo json_encode($arr);

// mysqli_close($conexion);
/*
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

*/
//Código para realizar consultas a la base de datos.//

// $query = mysqli_query($conexion, "SELECT * FROM persona");

// while($persona = mysqli_fetch_assoc($query)){
//     echo "<h2>".$persona['Nombre'].'</h2>';
//     echo $persona['apellido'].'<br/>';
// }


?>