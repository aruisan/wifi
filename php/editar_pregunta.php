

<?php
require_once('../cp/conexion.php');

if($_POST['metodo'] == "editPregunta")
{
	editPregunta($conexion, $_POST['id']);

}elseif($_POST['metodo'] == "updatePregunta")
{
	updatePregunta($conexion, $_POST['pregunta'], $_POST['id']);
}




function editPregunta($conexion, $id)
{
	$sql = "SELECT * FROM encuesta WHERE id_encuesta  = $id";
	$consulta = $conexion->query($sql);
	$data = $consulta->fetch_object();

	echo json_encode($data);
}


function updatePregunta($conexion, $pregunta, $id)
{
	$sql = "UPDATE encuesta SET pregunta ='$pregunta' WHERE id_encuesta = $id";
	$actualizar = $conexion->query($sql);
	if($actualizar){
		echo 1;
	}else{
		echo "error";
	}

}

?>

