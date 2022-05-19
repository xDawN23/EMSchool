<?php 
require_once 'conexion.php';
session_start();
header("Content-disposition: attachment; filename=a.pdf");
header("Content-type: application/pdf");
readfile("a.pdf");
?>