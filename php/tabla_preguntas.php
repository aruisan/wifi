<?php
require_once('../cp/conexion.php');

$sql = "SELECT * FROM encuesta ";
$consulta = $conexion->query($sql);

function respuesta($conexion, $id, $tipo)
{
	$sql = "SELECT count(*) AS conteo FROM conteo WHERE id_encuesta =$id AND respuesta = '$tipo'";
	$consulta = $conexion->query($sql);
	$datos = $consulta->fetch_object();
	return  $datos->conteo;
}

?>



<!-- Page Heading -->
	<div class="row">
    	<div class="col-lg-12">
        	<ol class="breadcrumb">
            	<li class="active">Visitantes</li>
        	</ol>
    	</div>
	</div>

	<div class="col-md-12">
		<button class="btn btn-primary" data-toggle="modal" data-target="#modal-crear-pregunta">Nueva pregunta</button><br><br>
		<table id="tabla_usuarios" class="table table-condensed table-hover table-bordered table-responsive">
				<thead>
					<td>#</td>
					<th>PREGUNTAS</th>
					<th>EXCELENTE</th>
					<th>BUENO</th>
					<th>REGULAR</th>
					<th>MALO</th>
					<th>ACTIVO</th>
					<th><i class="fa fa-line-chart fa-fw"></i></th>
				</thead>
				<tbody>
				<?php  while($datos = $consulta->fetch_object()){ 
					if($datos->activo == 0){ $clase = "btn-warning"; $text= 'Inactivo';}else{$clase = "btn-success"; $text= 'Activo';} 
						$id= $datos->id_encuesta;

						$e = respuesta($conexion, $id, 'EXCELENTE');
						$b = respuesta($conexion, $id, 'BUENA');
						$r = respuesta($conexion, $id, 'REGULAR');
						$m = respuesta($conexion, $id, 'MALA');

					?>
					<tr>
						<td><?= $datos->id_encuesta; ?></td>
						<td><?= $datos->pregunta; ?></td>
						<td><?= $e; ?></td>	
						<td><?= $b; ?></td>	
						<td><?= $r; ?></td>	
						<td><?= $m; ?></td>	
						<td>
							<a id="<?= $datos->id_encuesta; ?>" class="editarPregunta btn <?= $clase; ?>"><?= $text; ?></a>
						</td>
						<td>
							<a id="<?= $datos->id_encuesta; ?>" class="preguntaGraficos btn btn-danger" data-toggle="modal" data-target="#modal-demandado">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
		</table>
	</div>



	




	<!-- Modal -->
<div class="modal fade" id="modal-demandado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center tittle"></h4>
      </div>
      <div class="modal-body">
	  	<div id="cuerpo_graficos">
	    	<div class="grafica2 ">
	        	<div id="chart2"></div>
	         </div>
	    </div>
      <div class="modal-footer">
      	<button id="bar" type="button" class="bar btn btn-success">
            <span class="fa fa-bar-chart"></span>
            Gráfica de barras
        </button>
        <button id="pie" class="pie btn btn-success">
            <span class="fa fa-pie-chart"></span>
            Gráfica circular o de tarta
        </button>
        <button id="donut" class="donut btn btn-success">
            <span class="fa fa-circle-o-notch"></span>
            Gráfica de rosca
        </button>	
      </div>
    </div>
  </div>
</div>


	 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        tablas();
    });

    function tablas()
    {
    	$('#tabla_usuarios').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
            dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},					
					},
        });
    }
    $('#storePregunta').click(function(event){ event.preventDefault();	storePregunta(this.id); });
    $('.editarPregunta').click(function(event){ event.preventDefault();	editarPregunta(this.id); });
    $('.preguntaGraficos').click(function(event){ event.preventDefault();	traerDatosPreguntas(this.id); });
    $('#bar, #pie, #donut').click(function(){ transformChart(this.id); });
    </script>

