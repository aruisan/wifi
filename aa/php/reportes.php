<?php
require_once('../cp/conexion.php');

$num_empleados = num_empleados($conexion);

////////////////////////////////


function num_empleados($conexion)
{
	$sql = "SELECT * FROM usuario WHERE ocupacion = 'empleado'"
	$consulta = $conexion->query($sql);
	$resp = $consulta->num_rows();
	echo $resp;	
}
?>


<h1>hola com tas</h1>