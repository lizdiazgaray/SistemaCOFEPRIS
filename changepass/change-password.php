<?php 
session_start();

if (isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambiar contraseña</title>
    <link rel="icon" type="image/x-icon" href="../assets/IMSS.png" />
	<link rel="stylesheet" type="text/css" href="../style2.css">
</head>
<body>
     

    <form action="change-p.php" method="post">
    <h2>
    <img src="https://puntomedio.mx/wp-content/uploads/2019/12/IMSS-logo.png" width="120" height="120" >
    Cambiar contraseña</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Contraseña actual</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Ingresa tu contraseña actual">
     	       <br>

     	<label>Nueva contraseña</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="Ingresa tu nueva contraseña">
     	       <br>

     	<label>Confirmar contraseña</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirmar contraseña">
     	       <br>

     	<button type="submit">CAMBIAR</button>
          <a href="../index.php" class="ca">INICIAR SESIÓN</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: ../index.php");
     exit();
}
 ?>