<?php
	session_start();
	require_once('cp/conexion.php');

 $cc = $_GET['cc'];

 $sql = "SELECT * FROM usuario WHERE ndc = $cc ";
 $consulta = $conexion->query($sql);


if($consulta->num_rows != 1){
	header('location:index.html');
}else{
	$datos = $consulta->fetch_object();
	$encuesta = $datos->encuesta;
	$_SESSION['usuario']=$datos->ndc;

	header('location:encuestas.php?encuesta='.$encuesta);
}

?>

