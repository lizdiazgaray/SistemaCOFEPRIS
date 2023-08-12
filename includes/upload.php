<?php
//FUNCIÓN PARA CARGAR O SUBUR EL ARCHIVO (REPORTE PDF O EXCEL) A LA BASE DE DATOS 
//La tabla utilizada para subir el archivo en PhpMyadmin se llama 'documento'

session_start();
// Verificar si el usuario ha iniciado sesión y tiene el rol de administrador
if (!isset($_SESSION['id']) || !isset($_SESSION['user_name']) || $_SESSION['rol'] !== 'Admin') {
// Redireccionar al usuario al inicio de sesión
header("Location: ../login.php");
exit(); // Terminar la ejecución del script para evitar que se procese más código

}

// Comprobar si se ha cargado un archivo
if (isset($_FILES['archivo'])) {
    extract($_POST);
    $nodoc = $_POST['id'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $descripcion = $_POST['descripcion'];

    // Definir la carpeta de destino
    $carpeta_destino = "files/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Validar la extensión del archivo
    if ($extension == "pdf" || $extension == "xls" || $extension == "csv" || $extension == "xlsx") {
      

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
            // Insertar la información del archivo en la base de datos
            //
            include "../php/c.php";
            mysqli_set_charset($conexion, "utf8");
            $sql = "INSERT INTO documento (id,usuario,nombre, apellido, descripcion, archivo) 
            VALUES ( '$nodoc','$usuario','$nombre', '$apellido', '$descripcion','$nombre_archivo')";
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script language='JavaScript'>
                alert('Archivo Subido');
                location.assign('../views/index.php');
                </script>";
            } else {

                echo "<script language='JavaScript'>
                alert('Error al subir el archivo');
                location.assign('../views/index.php');
                </script>";
            }
        } else {
            echo "<script language='JavaScript'>
            alert('Error al subir el archivo. ');
            location.assign('../views/index.php');
            </script>";
        }
    } else {
        echo "<script language='JavaScript'>
        alert('Solo se permiten archivos PDF Y EXCEL');
        location.assign('../views/index.php');
        </script>";
    }
}
