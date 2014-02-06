<div class="row content">	
	<div class="col-md-12">
		<h1>Carga de Contenido</h1>
		<div style="width:900px;">
			<table id="notes" style="width:690px;">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Cargar</th>
					</tr>
				</thead>
				<tbody>
					<?foreach ($notes as $note):?>
						<tr>
							<td>
								<?echo $note['Note']['name']?>
							</td>
							<td>
								<?echo $note['Note']['description']?>
							</td>
							<td>
								<a href="">Cargar</a>
							</td>
						</tr>
					<?endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row content">
	<div class="col-md-12">
		<div>
			<h3>Acciones:</h3>
			<ul>
				<li>
					<?php 
						echo $this->Html->link(
					    'Contenido',
					    array(
					    		'controller'=>'contents',
					        'action' => 'browse',
					    ));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>

<script>
 	$(document).ready(function(){

	 $('#content').dataTable({
	 		'oLanguage': {
				'sLengthMenu': 'Mostrando _MENU_ registros por página',
				'sZeroRecords': 'No hay información',
				'sInfo': 'Mostrando _START_ - _END_ de _TOTAL_ registros',
				'sInfoEmpty': 'Mostrando 0 de 0 de 0 registros',
				'sInfoFiltered': '(filtrado de _MAX_ registros)',
				'sSearch': 'Búsqueda',
				'oPaginate': {
           'sNext': 'Siguiente',
           'sPrevious': 'Anterior'
         }
			}
	 	});
	});
</script>
