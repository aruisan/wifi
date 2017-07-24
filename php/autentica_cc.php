<?php

  	require_once('../cp/conexion.php');

  	$datos = $_POST['datos'];
  	$proceso = $_POST['proceso'];

  	if($proceso == "cedula"){
  		$sql = "SELECT ndc FROM usuario WHERE ndc = $datos ";
  	}if($proceso == "email"){
  		$sql = "SELECT ndc FROM usuario WHERE email = '$datos'";
  	}
  	
  	$consulta = $conexion->query($sql);
  	$datos = $consulta->num_rows;

  	if($datos > 0 && $proceso == "cedula"){
  		echo 2;	
  	}else if($datos > 0 && $proceso == "email"){
  		$datos = $consulta->fetch_object();
  		echo $datos->ndc;
  	}else{
  		 echo 0;
  	}
  	
?>