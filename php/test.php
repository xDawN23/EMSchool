<?php 

use PHPUnit\Framework\TestCase;

@doesNotPerformAssertions;

class test extends PHPUnit\Framework\TestCase{

    public function testRegistroEvento()
    {
        //$this->expectNotToPerformAssertions();
        $servername = "localhost";
        $database = "emschool";
        $username = "root";
        $password = "andrelopez";
        // Create connection
        $conexion = mysqli_connect($servername, $username, $password, $database);
        
    $nombre_evento = "evento chido";
    $codigo = "1011";
    $descripcion_evento = "evento chido";
    $fecha_evento = "2020-01-01";
    $hora_evento = "12:00:00";
    
    $sql = "DELETE FROM `eventos` WHERE `id_docente` = '$codigo'";

    $guardar = mysqli_query($conexion, $sql);

    $eliminar = "DELETE FROM `lista_evento` WHERE `id_docente` = $codigo";

    $eliminacion = mysqli_query($conexion, $eliminar);

    $validar = "UPDATE maestro SET `evento_creado` = '0' WHERE `id_docente` = '$codigo'";

    $conf = mysqli_query($conexion, $validar);

    if($guardar && $conf && $eliminacion){
        $this->assertTrue(true);
    }else{
        $this->assertTrue(false);
    }

    //header('Location: registroMateriasMaestro.php');

        }
}
?>