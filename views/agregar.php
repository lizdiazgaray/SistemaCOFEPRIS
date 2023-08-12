<?php 


  // Verificar si el usuario ha iniciado sesión y tiene el rol de administrador
if (!isset($_SESSION['id']) || !isset($_SESSION['user_name']) || $_SESSION['rol'] !== 'Admin') {
// Redireccionar al usuario al inicio de sesión
header("Location: ../login.php");
exit(); // Terminar la ejecución del script para evitar que se procese más código

}

?>


<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">   
<div class="modal-dialog" role="document">
        <!--VENTANA EMERGENTE /MODAL PARA AGREGAR ARCHIVO O REPORTE YA GENERADO-->
        <div class="modal-content">
            
            <div class="modal-header bg-success text-white">
                <h3 class="modal-title" id="exampleModalLabel">Seleccionar archivo</h3>
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../includes/upload.php" method="POST" enctype="multipart/form-data">
                

                <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id" class="form-label">No_reporte</label>
                                <input type="text" id="id" name="id" class="form-control" required>

                            </div>
                        </div>
                

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" id="usuario" name="usuario" class="form-control" required>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>

                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>

                    </div>



                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Archivo (EXCEL & PDF)</label>
                        <input type="file" name="archivo" id="archivo" class="form-control" required>

                    </div>

                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>