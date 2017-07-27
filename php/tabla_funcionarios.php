<?php
require_once('../cp/conexion.php');

$sql = "SELECT * FROM funcionarios ";
$consulta = $conexion->query($sql);


?>


<!-- Page Heading -->
	<div class="row">
    	<div class="col-lg-12">
        	<ol class="breadcrumb">
            	<li class="active">Funcionarios</li>
        	</ol>
    	</div>
	</div>

	<div class="col-md-12">
		<button class="btn btn-primary" data-toggle="modal" data-target="#modal-crear-funcionario">Nuevo funcionario</button><br><br>
		<table  class="table table-condensed table-hover table-bordered table-responsive">
				<thead>
					<td>#</td>
					<th>NICK</th>
					<th>ROL</th>
					<th>ACTIVO</th>
					<th><i class="fa fa-pencil fa-fw"></i></th>
				</thead>
				<tbody>
				<?php  while($datos = $consulta->fetch_object()){
					if($datos->activo == 0){ $clase = "btn-warning"; $text= 'Inactivo';}else{$clase = "btn-success"; $text= 'Activo';}  ?>
					<tr>
						<td><?= $datos->id_funcionario; ?></td>
						<td><?= $datos->nick; ?></td>
						<td><?= $datos->rol; ?></td>	
						<td>
							<a id="<?= $datos->id_funcionario; ?>" class="editarActivoFuncionario btn <?= $clase; ?>"><?= $text; ?></a>
						</td>
						<td>
							<a id="<?= $datos->id_funcionario; ?>" class="editarFuncionario btn btn-default" data-toggle="modal" data-target="#modal-editar-funcionario">
								<i class="fa fa-pencil fa-fw text-success"></i>
							</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
		</table>
	</div>

<script type="text/javascript">
		$('.editarFuncionario').click(function(event){ event.preventDefault(); var id = $(this).attr('id'); editFuncionario(id); });
	 	$('.editarActivoFuncionario').click(function(event){ event.preventDefault();	editarActivoFuncionario(this.id); });
</script>