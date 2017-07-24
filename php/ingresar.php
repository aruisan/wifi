<?php
 
 $sql = "SELECT * FROM usuarios WHERE nick=$_POST['nick'], nick=$_POST['password']";
 $consulta = $copnexion->query($sql);

 if($consulta->num_rows > 0)
 {
 	session_start();
 	$_SESSION['id']="activo";
 	header('location:../admin.php');
 }

?>