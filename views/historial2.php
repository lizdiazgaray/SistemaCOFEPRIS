<!DOCTYPE html>
<html lang="en">
    <!--HISTORIAL EN PANTALLA ROL DE USUARIO-->

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../assets/IMSS.png" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de reportes</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</head>

<body>
<nav class="navbar bg-body-tertiary, navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://puntomedio.mx/wp-content/uploads/2019/12/IMSS-logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
      Instituto Mexicano del Seguro Social
    </a>

    <a href="../php/cerrar.php" class="btn btn-success">Cerrar sesión</a>
    
  </div>
</nav>

    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;"> HISTORIAL ARCHIVOS GUARDADOS | COFEPRIS 2023</h2>
            <br>
    </div>
    </div>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <a href="../cliente.php">
            <img src="../IMG/casa1.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
            Regresar al menú de inicio
            </a>   

    </nav>

    <br></br>
       
            <br>
            <br>

            <div class="container">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No_Reporte</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Descripcion</th>
                            <th>Archivo</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../php/c.php");
                        session_start();
                        // Verificar si el usuario ha iniciado sesión y tiene el rol de administrador
                        if (!isset($_SESSION['id']) || !isset($_SESSION['user_name']) || $_SESSION['rol'] !== 'Usuario') {
                        // Redireccionar al usuario al inicio de sesión
                        header("Location: ../login.php");
                        exit(); // Terminar la ejecución del script para evitar que se procese más código
                        
                        }
                        $result = mysqli_query($conexion, "SELECT * FROM documento");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['usuario']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['apellido']; ?></td>
                                <td><?php echo $fila['descripcion']; ?></td>
                                <td><?php echo $fila['archivo']; ?></td>
                                <td>
                                    <a href="../includes/download.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-download"></i></a>
                                   
                                </td>
                             
                            <?php endwhile; ?>
                            </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
        var table = $('#myTable').DataTable({
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});
        </script>
        <br></br>
        <br></br>
</body>
<style>
    
    a {
        text-decoration: none;
    }

    .s {
        padding-top: 50px;
        text-align: center;
    }
</style>




</html>