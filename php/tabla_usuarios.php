<?php
require_once('../cp/conexion.php');


$sql = "SELECT * FROM usuario ";
$consulta = $conexion->query($sql);

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
		<table id="tabla_usuarios" class="table table-condensed table-hover table-bordered table-responsive">
				<thead>
					<th>FECHA</th>
					<th>NOMBRE</th>
					<th>IDENTIFICACION</th>
					<th>EDAD</th>
					<th>OCUPACION</th>
					<th><i class="fa fa-venus-mars" aria-hidden="true"></i></th>
					<th>CIUDAD</th>
					<th>EMAIL</th>
				</thead>
				<tbody>
				<?php  while($datos = $consulta->fetch_object()){ ?>
					<tr>
						<td><?= $datos->ff_hh; ?></td>
						<td><?= $datos->nom_usuario; ?></td>
						<td><?= $datos->ndc; ?></td>
						<td><?= $datos->edad; ?></td>
						<td><?= $datos->ocupacion; ?></td>
						<td><?= $datos->genero; ?></td>
						<td><?= $datos->ciudad; ?></td>
						<td><?= $datos->email; ?></td>
					</tr>
				<?php } ?>
				</tbody>
		</table>
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

    </script>

