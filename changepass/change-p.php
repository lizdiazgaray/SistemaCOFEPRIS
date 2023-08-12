<?php 
session_start();

if (isset($_SESSION['user_name'])) {

    require ('../php/c.php');

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: change-password.php?error=Se requiere la contraseña actual");
	  exit();
    }else if(empty($np)){
      header("Location: change-password.php?error=Se requiere la contraseña nueva");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password.php?error=La confirmación de contraseña no coincide");
	  exit();
    }else {
    	
    	$op = ($op);
    	$np = ($np);
        
        $id = $_SESSION['user_name'];

        $sql = "SELECT password
                FROM users2 WHERE 
                user_name='$id' AND password='$op'";
        $result = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users2
        	          SET password='$np'
        	          WHERE user_name='$id'";
        	mysqli_query($conexion, $sql_2);
        	header("Location: change-password.php?success=Contraseña cambiada con éxito");
	        exit();

        }else {
        	header("Location: change-password.php?error=Contraseña incorrecta");
	        exit();
        }

    }

    
}else{
	header("Location: change-password.php");
	exit();
}

}else{
     header("Location: ../index.php");
     exit();
}