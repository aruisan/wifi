<?php
session_start();
require_once('../cp/conexion.php');

$tdc = $_POST['tdc'];
$ndc = $_POST['ndc'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$ocupacion = $_POST['ocupacion'];
$genero = $_POST['genero'];
$ciudad = $_POST['ciudad'];
$dispositivo = $_POST['dispositivo'];
$email = $_POST['email'];
$fecha = date('Y-m-d h:m:s');

$sql = "INSERT INTO usuario(nom_usuario, edad, ocupacion, genero, ciudad, dispositivo, tdc, ndc, ff_hh, email) VALUES ('$nombre','$edad','$ocupacion', '$genero', '$ciudad', '$dispositivo', '$tdc', '$ndc', '$fecha', '$email')";
$ingresar = $conexion->query($sql);

if($ingresar){

	$encuesta = 0;
	$_SESSION['usuario']=$ndc;

	header('location:../encuestas.php?encuesta='.$encuesta);
}else{
	echo 'error de ingreso: '.$conexion->error;
}

?>