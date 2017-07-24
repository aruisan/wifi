<?php
require_once('../cp/conexion.php');

$id=$_POST['id'];

$sql = "SELECT activo FROM encuesta WHERE id_encuesta = $id";
$consulta = $conexion->query($sql);
$datos = $consulta->fetch_object();

if($datos->activo == 0){
	$activo = 1;
}elseif($datos->activo == 1){
	$activo = 0;
}

$sql2 = "UPDATE encuesta SET activo = $activo WHERE id_encuesta = $id";
$actualizar = $conexion->query($sql2);

if($actualizar){
	echo $activo;
}
?>