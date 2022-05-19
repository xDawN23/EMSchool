<?php
    session_start();

    if(isset($_SESSION['codigo'])){
        session_destroy();
    }
    header("Location: login.php");
?>