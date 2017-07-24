<?php
session_start();
	require_once('../cp/conexion.php');

$encuesta= $_POST['consulta'];
$resp = $_POST['respuesta'];
$usuario = $_SESSION['usuario'];
if($usuario == NULL){
	header('location:../');
}

$sql =  "SELECT id_usuario FROM usuario WHERE ndc = $usuario";
$consulta =  $conexion->query($sql);
$datos = $consulta->fetch_object();
$id_usuario = $datos->id_usuario;

$sql2 = "INSERT INTO conteo (id_usuario, id_encuesta,  respuesta) VALUES($id_usuario, $encuesta, '$resp')";
$insertar = $conexion->query($sql2);

if($insertar)
{
	$sql3 = "UPDATE usuario SET encuesta = $encuesta WHERE id_usuario = $id_usuario";
	$actualizar =  $conexion->query($sql3);

	if($actualizar)
	{
		require_once('api_pines.php');
	}else{echo "error al actualizar";}
}else{echo "error al crear";}


?>

