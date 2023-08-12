<?php
//INICIAR Y CERRAR SESIÓN DEL USUARIO 
session_start();
session_destroy();
header("location:../index.php");
?>