<?php
require_once('../cp/conexion.php');

if($_POST['metodo'] == 'generoGraficos'){
	generoGraficos($conexion);	
}elseif($_POST['metodo'] == 'ocupacionGraficos'){
	ocupacionGraficos($conexion);

}elseif($_POST['metodo'] == 'dispositivoGraficos'){
	dispositivoGraficos($conexion);

}elseif($_POST['metodo'] == 'ciudadGraficos'){
	ciudadGraficos($conexion);

}elseif($_POST['metodo'] == 'preguntaGraficos'){
	preguntaGraficos($conexion, $_POST['id']);

}elseif($_POST['metodo'] == 'fechaGraficos'){
	fechaGraficos($conexion, $_POST['ff_inicio'], $_POST['ff_final']);
}





function generoGraficos($conexion)
{
	$sql = "SELECT genero , count(*) AS invitado FROM usuario GROUP BY genero";
	$consulta = $conexion->query($sql);

	while($datos = $consulta->fetch_object()){
		$data[] = $datos;
	}

	echo json_encode($data);
}


function ocupacionGraficos($conexion)
{
	$sql = "SELECT ocupacion , count(*) AS invitado FROM usuario GROUP BY ocupacion";
	$consulta = $conexion->query($sql); 

	while($datos = $consulta->fetch_object()){
		$data[] = $datos;
	}

	echo json_encode($data);
}

function dispositivoGraficos($conexion)
{
	$sql = "SELECT dispositivo , count(*) AS invitado FROM usuario GROUP BY dispositivo";
	$consulta = $conexion->query($sql); 

	while($datos = $consulta->fetch_object()){
		$data[] = $datos;
	}

	echo json_encode($data);
}

function ciudadGraficos($conexion)
{
	$sql = "SELECT ciudad , count(*) AS conteo FROM usuario GROUP BY ciudad ORDER BY ciudad";
	$consulta = $conexion->query($sql); 

	while($datos = $consulta->fetch_object()){
		$data[] = $datos;
	}

	echo json_encode($data);
}

function preguntaGraficos($conexion, $id)
{
	$sql = "SELECT respuesta , count(*) AS conteo FROM conteo WHERE id_encuesta = $id GROUP BY respuesta ";
	$consulta = $conexion->query($sql); 

	while($datos = $consulta->fetch_object()){
		$data[] = $datos;
	}

	echo json_encode($data);
}

function fechaGraficos($conexion, $ff_inicio, $ff_final)
{
	$inicio =  $ff_inicio.' 00:00:00';
	$final = 	$ff_final.' 23:59:59';
	$sql = "SELECT DATE_FORMAT(ff_hh, '%Y-%m-%d') AS fecha, COUNT(DATE_FORMAT(ff_hh, '%Y-%m-%d')) AS conteo FROM usuario
			WHERE ff_hh between '$inicio' and '$final'
			GROUP BY fecha";
	$consulta = $conexion->query($sql);

	while($datos = $consulta->fetch_object()){
		$data[] = $datos;
	}

	echo json_encode($data);
}

?>