<?php
require_once('../cp/conexion.php');

echo $nick =$_POST['nick']; 
echo $password = $_POST['password'];


 
 $sql = "SELECT * FROM funcionarios WHERE nick='$nick' AND password='$password'";
 $consulta = $conexion->query($sql);

 if($consulta->num_rows > 0)
 {
 	$datos = $consulta->fetch_object();
 	session_start();
	 $_SESSION['rol'] = $datos->rol;

 	if($datos->rol == 'ADMINISTRADOR'){
 		header('location:../admin.php');
 	}else if($datos->rol == 'ESPECTADOR'){
 		header('location:../espectador.php');
 	}else{
 		header('location:../index.php');
 	}

 }else{
 	header('location:../index.php');
 }

?>