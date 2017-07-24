<?php

	require_once('cp/conexion.php');

$encuesta = $_GET['encuesta'];

do {
	$encuesta++;
	$sql = "SELECT * FROM encuesta WHERE  id_encuesta = $encuesta AND activo=1";
	$consulta = $conexion->query($sql);
} while ($consulta->num_rows == 0);

$datos = $consulta->fetch_object();
?>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/mydesign/css/registrar.css">   

        <?php require_once('cuerpo/encabezado.php'); ?>
<?php

	
	if($datos == NULL){
		echo '	<center>
				<h2>No ahi encuesta por el momento</h2><br>
				<a href="index.html" class="btn btn-danger">Regresar</a>
				</center>';
	}else{ ?>

     


<center>
	<div class="row">
		<div class="col-sm-2 col-md-3 col-lg-4"></div>
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 text-justify">
			<h2>Encuesta <?= $datos->id_encuesta; ?></h2><br>
			<form  action="php/enviarEncuesta.php?consulta=<?= $datos->id_encuesta; ?>" method="POST">
				<label><h3><?= $datos->pregunta; ?></h3></label><br>
				<input type="hidden" name="consulta" value="<?= $datos->id_encuesta; ?>">
					<label class="checkbox"><input type="radio" class="text-primary" name="respuesta" value="EXCELENTE">EXCELENTE</label>
                    <label class="checkbox"><input type="radio" class="text-primary" name="respuesta" checked="checked"  value="BUENA">BUENA</label>
                    <label class="checkbox"><input type="radio" class="text-primary" name="respuesta" value="REGULAR">REGULAR</label>
                    <label class="checkbox"><input type="radio" class="text-primary" name="respuesta" value="MALA">MALA</label><br>
				<input type="submit" class="btn btn-success" value="ENVIAR">
			</form>
		</div>
	</div>
</center>



<?php } ?>
