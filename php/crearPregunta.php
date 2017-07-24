<?php
require_once('../cp/conexion.php');

$nom = $_POST['pregunta'];

$sql = "INSERT INTO encuesta (pregunta, activo) VALUES('$nom', 1)";
$insertar = $conexion->query($sql);

if($insertar){
	$resp = 1;
}else{
	$resp = 0;
}

echo $resp;

?>
