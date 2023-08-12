
<?php
//CONEXIÓN A LA BASE DE DATOS EN PHPMYADMIN

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "proyectimss";

$conexion = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conexion) {
	echo "Connection failed!";
} 
if (!mysqli_set_charset($conexion, "utf8mb4")) {
    printf("Error loading character set utf8mb4: %s\n", mysqli_error($conexion));
    exit();
}//esta sentencia IF sirve para mostrar correctamente las palabras que llevan acentos al mostrar contenido


