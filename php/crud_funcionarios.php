<?php
require_once('../cp/conexion.php');

if($_POST['metodo']== "editFuncionarios")
{
	editFuncionarios($conexion, $_POST['id']);
}elseif($_POST['metodo']== "storeFuncionarios")
{
	storeFuncionarios($conexion, $_POST['name'], $_POST['rol']);

}elseif($_POST['metodo']== "updateFuncionarios")
{
	updateFuncionarios($conexion, $_POST['name'], $_POST['rol'], $_POST['password'], $_POST['id']);

}elseif($_POST['metodo']== "activoFuncionarios")
{
	activoFuncionarios($conexion, $_POST['id']);
}




function editFuncionarios($conexion, $id)
{
	$sql = "SELECT * FROM funcionarios WHERE id_funcionario  = $id";
	$consulta = $conexion->query($sql);
	$data = $consulta->fetch_object();

	echo json_encode($data);
}

function storeFuncionarios($conexion, $name, $rol)
{
	$sql = "INSERT INTO funcionarios (nick, password, rol) VALUES ('$name', '123456', '$rol')";
	$insertar = $conexion->query($sql);
	if($insertar){
		echo 1;
	}else{
		echo "error";
	}
}

function updateFuncionarios($conexion, $name, $rol, $password, $id)
{
	$sql = "UPDATE `funcionarios` SET `nick`='$name',`password`='$password',`rol`='$rol' WHERE id_funcionario = $id";
	$actualizar = $conexion->query($sql);
	if($actualizar){
		echo 1;
	}else{
		echo "error";
	}

}

function activoFuncionarios($conexion, $id)
{
	$sql = "SELECT activo FROM funcionarios WHERE id_funcionario = $id";
	$consulta = $conexion->query($sql);
	$datos = $consulta->fetch_object();

	if($datos->activo == 0){
		$activo = 1;
	}elseif($datos->activo == 1){
		$activo = 0;
	}

	$sql2 = "UPDATE funcionarios SET activo = $activo WHERE id_funcionario = $id";
	$actualizar = $conexion->query($sql2);

	if($actualizar){
			echo 1;
	}else{
		echo "error";
	}
}

?>